<?php

namespace app\modules\api\v1\controllers;

use yii;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;

use yii\web\Response;
use app\modules\api\v1\models\RbacItem;


class RbacItemController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\RbacItem';

    /* 分頁
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];*/
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // $behaviors['authenticator'] = [
        //     'class' => CompositeAuth::className(),
        //     'authMethods' => [
        //         HttpBasicAuth::className(),
        //         QueryParamAuth::className(),
        //         HttpBearerAuth::className(),
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
        $key = 'rbac-item';
        //--------------
        //from memcached
        //--------------
        // $cache = \Yii::$app->cache;
        // if ($cache->get($key)) {
        //     return $cache->get($key);
        // } else {
        //     $items = RbacItem::find()->all();
        //     $cache->add($key, $items, 30);
        //     return $items;
        // }

        // --------------
        // from redis
        // --------------
        $redis = Yii::$app->redis;
        $data = $redis->get($key);

        if (empty($data)) {
            $data = RbacItem::find()->all();
            $value = serialize($data);
            $redis->set($key, $value);
            $redis->expire($key, 30);
            return $data;
        } else {
            return unserialize($data);
        }
    }
}
