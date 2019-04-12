<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$rotues = require __DIR__ . '/routes.php';
$response = require __DIR__ . '/response.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'homeUrl'=>'index',
    // 'catchAll' => [
    //     'site/notice'
    // ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
   'modules' => [
       'v1' => [
            'class' => 'app\modules\api\v1\Module',
        ]
    ], 
    
    'components' => [
        'errorHandler' => [
            //    'class' => 'yii\web\ErrorHandler',
                'errorAction' => 'site/error',
            ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => $db,
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User',
        ],
        // 'response' => [
        //     // 'formatters' => [
        //     //     'restful' => 'app\components\RestfulApiFormatter',
        //     // ],
        //     'on beforeSend' => function ($event) {
        //         $response = $event->sender;
        //         if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
        //             $response->data = [
        //                 'success' =>true, // $response->isSuccessful,
        //                 'data' => $response->data,
        //             ];
        //             $response->statusCode = 200;
        //         }
        //     },
        // ],
        //'response' => $response, 
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'WrRTsGC1F4x3nz-kEwN2Q-Xkr3VD2-J8',
            'parsers' => ['application/json' => 'yii\web\JsonParser'],
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'trace', 'error', 'warning'],
                    'categories' => ['test'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/mytest/test.log',
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => $rotues,
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','192.168.1.31','192.168.1.*','192.168.16.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','172.31.0.1','192.168.16.1'],
    ];
}

return $config;
