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
use yii\db\Exception as DbException;
use app\modules\api\v1\models\RbacRole;
use yii\web\Response;

class RbacRoleController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\RbacRole';

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

	    unset($actions['create'],$actions['update'],$actions['delete'],$actions['view']);
	    
	    return $actions;

    }

    public function actionCreate()
    {   
        try{
            $role = new RbacRole();
            $role->name = (string)ArrayHelper::getValue($_POST, 'name', 'none');
            $role->description = (string)ArrayHelper::getValue($_POST, 'description', 'none');
            $role->type = 1;
            // $role->created_at = time();
            // $role->updated_at = time();
            $result = $role->save();

       } catch (DbException $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => ''
            ];
        } catch (Exception $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }

    public function actionUpdate($name)
    {   
        try {
            $_POST = Yii::$app->getRequest()->getBodyParams();
            $role = RbacRole::findByName($name);
            $role->name = (string)ArrayHelper::getValue($_POST,'newName', 'none');
            $role->description = (string)ArrayHelper::getValue($_POST,'description', 'none');
            // $role->updated_at = time();
            $result = $role->save();

       } catch (DbException $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => ''
            ];
        } catch (Exception $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }

    public function actionDelete($name)
    {   
        try {
            $role = RbacRole::findByName($name);
  
            $role->delete();
            $result = $role;

       } catch (DbException $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => ''
            ];
        } catch (Exception $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }

    public function actionView($name)
    {   
        try {
            $role = RbacRole::findByName($name);

            $result = $role;

       } catch (DbException $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => ''
            ];
        } catch (Exception $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }
}
