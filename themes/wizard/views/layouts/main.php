<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->


            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by <a href='http://ituri.net'>iTuri.net</a>.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->

        </div><!-- page -->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
    </body>
</html>
