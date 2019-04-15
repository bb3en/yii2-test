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
use app\modules\api\v1\models\Posts;


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

    public function actions()
    {

        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $cache = \Yii::$app->cache;

        if ($cache->get('posts')) {
            return $cache->get('posts');
        } else {
            $posts = Posts::find()->all();
            $cache->add('posts', $posts, 30);
            return $posts;
        }
    }
}
