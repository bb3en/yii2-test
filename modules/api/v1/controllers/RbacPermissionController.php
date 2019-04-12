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
use yii\db\Exception as DbException;
use app\modules\api\v1\models\RbacPermission;


class RbacPermissionController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\RbacPermission';

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

        unset($actions['create'], $actions['update'], $actions['delete'], $actions['view']);

        return $actions;
    }

    public function actionCreate()
    {

        $permission = new RbacPermission();
        $permission->name = (string)ArrayHelper::getValue($_POST, 'name', 'none');
        $permission->description = (string)ArrayHelper::getValue($_POST, 'description', 'none');
        $permission->type = 2;
        // $permission->created_at = time();
        // $permission->updated_at = time();
        $result = $permission->save();

        return $result;
    }

    public function actionUpdate($name)
    {

        $_POST = Yii::$app->getRequest()->getBodyParams();
        $permission = RbacPermission::findByName($name);
        $permission->name = (string)ArrayHelper::getValue($_POST, 'newName', 'none');
        $permission->description = (string)ArrayHelper::getValue($_POST, 'description', 'none');
        // $permission->updated_at = time();
        $result = $permission->save();

        return $result;
    }

    public function actionDelete($name)
    {

        $permission = RbacPermission::findByName($name);
        $permission->delete();
        $result = $permission;

        return $result;
    }

    public function actionView($name)
    {

        $permission = RbacPermission::findByName($name);

        $result = $permission;

        return $result;
    }
}
