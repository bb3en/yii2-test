<?php

namespace app\modules\api\v1;

use yii;
/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        yii::$app->user->enableSession = false;
        // custom initialization code goes here
        $response = require __DIR__ . '/../../componets/response.php';
        yii::configure(\Yii::$app, [
            'components' => [
                'response' => $response,
                // 'cache' => [
                //     'class' => 'yii\redis\Cache',
                //     'redis' => [
                //         'hostname' => 'redis.cache',
                //         'port' => 6379,
                //         'database' => 0,
                //     ],
                // ],
                'cache' => [
                    'class' => 'yii\caching\MemCache',
                    'servers' => [
                        [
                            'host' => 'memcached.cache',
                            'port' => 11211,
                            'weight' => 60,
                        ]
                    ],
                    'useMemcached' => true,
                ],
                'redis' => [
                    'class' => 'yii\redis\Connection',
                    'hostname' => 'redis.cache',
                    'port' => 6379,
                    'database' => 0,
                ],
            ]
        ]);
    }
}
