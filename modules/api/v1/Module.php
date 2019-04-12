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
            ]
        ]);
    }
}
