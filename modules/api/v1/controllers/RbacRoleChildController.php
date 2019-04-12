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
use app\modules\api\v1\models\RbacRoleChild;

class RbacRoleChildController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\RbacRoleChild';

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

	    unset($actions['create'],$actions['delete'],$actions['view']);
	    
	    return $actions;

    }

    public function actionCreate()
    {   
        try {

            $roleChild = new RbacRoleChild();
            $parent = (string)ArrayHelper::getValue($_POST, 'parent', 'none');
            $child = (string)ArrayHelper::getValue($_POST, 'child', 'none');
            if(!RbacRoleChild::isExistRoleChild($parent, $child)) {
                $roleChild->parent = $parent;
                $roleChild->child = $child;
                $result = $roleChild->save();
            } else {
                return null;
            }
 
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

    public function actionDelete($parent)
    {   
        try{
            $_POST = Yii::$app->getRequest()->getBodyParams();
            
            //$parent = (string)ArrayHelper::getValue($_POST, 'parent', 'none');
            $child = (string)ArrayHelper::getValue($_POST, 'child', 'none');

            if(RbacRoleChild::isExistRoleChild($parent, $child)) {
                $roleChild = RbacRoleChild::findByBoth($parent, $child);
                $result = $roleChild->delete();
            } else {
                return null;
            }

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

    public function actionView($parent)
    {   
        try {
            $roleChild = RbacRoleChild::findByParent($parent);

            $result = $roleChild;

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