<?php

/**
 * SetupConfig class.
 * SetupConfig is the data structure for keeping
 * It used to get configuration for database
 */
class SetupConfig extends CFormModel {

    public $sitename;
    public $dbname;
    public $dbuser;
    public $dbpassword;
    public $dbhost;
    public $error;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('dbname, dbuser, dbhost', 'required'),
            array('sitename, dbpassword', 'safe'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'sitename' => 'Site Name',
            'dbname' => 'Database Name',
            'dbuser' => 'User Name',
            'dbpassword' => 'Password',
            'dbhost' => 'Database Host'
        );
    }

    /**
     * check if database connection works
     * if yes then return true otherwise false
     * 
     * @return boolean
     */
    public function isValidDbConn() {
        if (@mysql_connect($this->dbhost, $this->dbuser, $this->dbpassword)) {
            return true;
        }
        $this->error = "<b>Connection Error: " . mysql_error() . "</b>";

        return false;
    }

    /**
     * if database name is valid then return true other false
     * 
     * @return boolean
     */
    public function isValidDb() {
        if (@mysql_select_db($this->dbname))
            return true;

        $this->error = "<b>Database Error: " . mysql_error() . "</b>";

        return false;
    }

    /**
     * check if database import file exists and readable
     * 
     * @return boolean
     */
    public function isDbImportFileExist() {
        $file_path = Yii::app()->basePath . '/data/db_template.sql';

        if (file_exists($file_path) && is_readable($file_path)) {
            return true;
        }

        return false;
    }

    /**
     * import database sql file to the database
     * 
     * @return boolean
     */
    public function importSqlFileToDb() {
        set_time_limit(0);

        $file_path = Yii::app()->basePath . '/data/db_template.sql';

        $file = fopen($file_path, 'r');
        $query = array();
        $delimiter = ';';
        
        while (feof($file) === false) {
            $query[] = fgets($file);

            if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1) {
                $query = trim(implode('', $query));

                if (mysql_query($query) === false) {
                    $this->error = "<b>Error: " . mysql_error() . "</b>";
                    return false;
                }

                while (ob_get_level() > 0) {
                    ob_end_flush();
                }

                flush();
            }

            if (is_string($query) === true) {
                $query = array();
            }
        }

        fclose($file);

        return true;
    }

    /**
     * check if config file exists or not
     * 
     * @return boolean
     */
    public function isConfigFileExist() {
        $file_path = Yii::app()->basePath . '/data/main_config.tpl';

        if (file_exists($file_path)) {
            return true;
        }

        return false;
    }

    public function updateConfigFile() {
        $file_path = Yii::app()->basePath . '/data/main_config.tpl';

        $data = file_get_contents($file_path); //read the file

        $data = str_replace('[Site Name]', $this->sitename, str_replace('[Db Name]', $this->dbname, str_replace('[Db User]', $this->dbuser, str_replace('[Db Password]', $this->dbpassword, $data))));

        $config_file_path = Yii::app()->basePath . '/../../protected/config/main.php';

        // Write the contents back to the file
        if (@file_put_contents($config_file_path, $data)) {
            return true;
        }

        return false;
    }

}
