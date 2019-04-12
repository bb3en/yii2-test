<?php

namespace app\modules\api\v1\controllers;

use Exception;
use yii;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\db\BaseActiveRecord;
use yii\web\Response;
use app\components\MyCompositeAuth;

class PostsController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\Posts';
    // public $serializer = [
    //     'class' => 'app\components\MySerializer',
    //     'collectionEnvelope' => 'data',
    // ];
    public function behaviors()
    {
        // throw new Exception('123123', 401);
        $behaviors = parent::behaviors();
        // $behaviors['authenticator'] = [
        //     'class' => MyCompositeAuth::className(),
        //     'authMethods' => [
        //         //     HttpBasicAuth::className(),
        //         QueryParamAuth::className(),
        //         //     HttpBearerAuth::className(),
        //     ],
        // ];

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        return $behaviors;
    }
}
