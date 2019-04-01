<?php

namespace app\modules\api\v1\controllers;

use yii\rest\ActiveController;

class PostsController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\Posts';

    /* 分頁
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];*/
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // token 验证  请按需开启
        // $behaviors['authenticator'] = [
        //     'class' => CompositeAuth::className(),
        //     'authMethods' => [
        //         QueryParamAuth::className(),
        //     ],
        // ];
        
        return $behaviors;
    }

}