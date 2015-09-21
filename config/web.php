<?php
require(__DIR__ . '/../config/aliases.php');

//require(__DIR__ . '/../config/container.php');

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'FlameDevelopment',
    'name'	=> 'FlameDevelopment - Fiery Web Application Development',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'  =>  'gb',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'f7Lh2AHl-cGe-8IH8PnPqu0stDpbNO7-',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
				'assetManager' => [
				    'class' => 'yii\web\AssetManager',
				    'forceCopy' => YII_DEBUG,          
				],
				'urlManager' => [
            'showScriptName' => false,
						'enablePrettyUrl' => true,
						'rules' => [
								'<action:contact|login|logout>' => 'site/<action>',
                '<controller:test>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
						],
						// ...
				],
        'i18n'=>array(
              'translations' => array(
                  '*'=>array(
                      'class' => 'yii\i18n\PhpMessageSource',
                      'basePath' => "@app/messages",
                      'sourceLanguage' => 'en_GB',
                      'fileMap' => array(
                          'app'=>'app.php'
                      )
                  )
              )
          ),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.7.*'] // adjust this to your needs
    ];
}

return $config;
