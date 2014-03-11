YiiDBInstaller
==============

Easy database installer using wizard for yii configuration.

This is an independent small yii application, which helps you to import sql file and configure you 'main.php' file under 'protected/config' directory.



**Requirements**

Tested with Yii 1.1.12 and 1.1.14

**Installation**

* Extract the file under root folder of your application.
* Place your sql file under 'install/protected/data' by the name 'db_template.sql'
* In index.php file, add the following lines at the start:


```
if (file_exists('install') && is_dir('install')) {
    header('Location: install');
    exit();
}
```


**Usage**

 * Goto your main site url, it should redirect you to 'install' folder
 * Follow the setps and fill out the required field informoation
 * Click Submit and you are all ready to go.

