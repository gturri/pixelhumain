<?php
require_once(dirname(__FILE__) . '/dbconfig.php');
require_once(dirname(__FILE__) . '/paramsconfig.php');
require_once(dirname(__FILE__) . '/moduleconfig.php');

// uncomment the following to define a path alias
Yii::setPathOfAlias('Json',dirname(__FILE__) . '/../extensions/Json');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Communecter',
	'theme'=>'ph-dori',
	'sourceLanguage'=>'00',
	'language'=>'en',

	//SPECIFIC MODULE confis
	'defaultController' => 'communecter/network/simplydirectory',
	'homeUrl' => "/",//"/ph?tpl=index",

	// preloading 'log' component
	'preload'=>array('log'),
	'modulePath' => realpath(__DIR__ . $modulesDir),
	'aliases' => array(
    	'vendor' => realpath(__DIR__ . '/../../vendor/'),
    	'mongoYii' => realpath(__DIR__ . '/../../vendor/sammaye/mongoyii-php7'),
    	'recaptcha' => realpath(__DIR__ . '/../../vendor/google/recaptcha/src/ReCaptcha'),
    	'bootstrap' => realpath(__DIR__ . '/../../vendor/2amigos/yiistrap'),
		'yiiwheels' => realpath(__DIR__ . '/../../vendor/2amigos/yiiwheels'), 
        'mandrill' => realpath(__DIR__ . '/../../vendor/mandrill/mandrill/src'), 
        'citizenToolKit' => realpath(__DIR__ . $modulesDir.'/citizenToolKit'), 
    ),
    'controllerMap'=>array(
         //'YiiFeedWidget' => 'ext.yii-feed-widget.YiiFeedWidgetController'
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',

        'citizenToolKit.models.*',
        'citizenToolKit.components.*',
        'citizenToolKit.messages.*',

		'bootstrap.helpers.TbHtml',
    	'ext.mail.YiiMailMessage',
        'ext.mail.YiiMail',
    	'ext.mobile.Mobile_Detect',
    	'ext.Json.Validator',
        'ext.helpers.*',
        'ext.CornerDev',
        'ext.ClientScript',
        'ext.resizer.*',

        //'ext.easyrdf.lib.*'
	),
	'modules'=>array_merge($activeModules,array(

		// uncomment the following to enable the Gii tool
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
        	'generatorPaths' => array('bootstrap.gii'),
		),*/
		/*'importcsv'=>array(
            'path'=>'upload/importCsv/', // path to folder for saving csv file and file with import params
        ),*/
		'opauth' => array(
            'opauthParams' => array(
                'security_salt' => '322e94bf816b18a9d85b0d70274af5614efd3748a10170c9be6c2b3c16bb1500',
                'Strategy' => array(
                    'Facebook' => array(
            			//https://developers.facebook.com/x/apps/534906546570011/settings/basic/
            			'app_id' => '534906546570011',
            			'app_secret' => '2b4d7a98eeac103e3ca6ec9387e58bdc'
            		),
            		'Twitter' => array(
            			//https://dev.twitter.com/apps/5741723/show
            			'key' => 'bI9MbnygLBkgI0zlNKuuw',
            			'secret' => 'wgKuhTmq9LjtEpfYz0wwhiSLvzfrDtX81ENZDze9uo'
            		),
            		'Google' => array(
            			//https://cloud.google.com/console/project/1035825037059/apiui/credential
            			'client_id' => '1035825037059-tcrscaie3brdsu5cl8gekna0opeqkgn4.apps.googleusercontent.com',
            			'client_secret' => 'yNeJg-EFe5lF-eiPGm8UbqSD'
            		),
            		'LinkedIn' => array(
            			//https://www.linkedin.com/secure/developer
            			'api_key' => '77o6zfdg1ulh2a',
            			'secret_key' => 'xrWLQrYq9D54FDha'
            		),
            		'OpenID' => array(),
                ),
            ),
        ),
	)),

	// application components
	'components'=>array(
        /*'themeManager' => array(
            'basePath' => realpath(__DIR__ . $modulesDir)."/granddir/themes"
        ),*/
		'communecter' => array(
            'class'=>'CPhpMessageSource',
            'basePath'=>realpath(__DIR__ .$modulesDir.'communecter/messages')
        ),
		'session' => array(
            'timeout' => 86400,
        ),
        //'session' => [
            //'class' => 'yii\web\DbSession',
            // 'db' => 'mydb',
            // 'sessionTable' => 'my_session',
        //]
        /*'request'=>array(
            'enableCsrfValidation'=>true,
        ),*/
        'user'=>array(
            'allowAutoLogin'    => true,
            'autoRenewCookie'   => true,
            'authTimeout'       => 31557600,
            //'loginUrl'          => array('/granddir/person/login'),
        ),
        'clientScript' => array(
      		'class' => 'ClientScript'
  		),
        
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				/*'<action>'=>'site/<action>',*/
               '' => @$params['defaultController'],
               '<controller:\w+>/<id:\d+>' => '<controller>/view',
               '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
               '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		/*'db' => array(
			'connectionString' => $mysqldbconfig['db.connectionString'],
			'username' => $mysqldbconfig['db.username'],
			'password' => $mysqldbconfig['db.password'],
			//'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
			//'enableParamLogging' => YII_DEBUG,
			'charset' => 'utf8'
		),*/
        'mongodb' => $dbconfig,
        //'mongodb' => $dbconfigtest,
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'mail' => $mailConfig, 
		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',   
        ),
        'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'HTML2PDF' => array(
                    'librarySourcePath' => 'ext.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                    /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format'      => 'A4', // format A4, A5, ...
                        'language'    => 'en', // language: fr, en, it ...
                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )*/
                )
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>$params

	//'jsonParams' => getParams("notragora")
);
