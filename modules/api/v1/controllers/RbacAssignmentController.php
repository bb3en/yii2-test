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
use app\modules\api\v1\models\RbacAssignment;


class RbacAssignmentController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\RbacAssignment';

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
        unset($actions['create'],
        $actions['update'],
        $actions['delete'],
        $actions['view'],
        $actions['index']);

        return $actions;
    }

    public function actionIndex()
    {
        return RbacAssignment::findWithUser();
    }

    public function actionCreate()
    {

        $userId = (string)ArrayHelper::getValue($_POST, 'userId', '');
        $role = (string)ArrayHelper::getValue($_POST, 'role', '');
        if (empty($userId) || empty($role))
            throw new Exception('');

        if (RbacAssignment::isExistAssignment($userId)) {
            return null;
        } else {
            $assignment = new RbacAssignment();
            $assignment->user_id = $userId;
            $assignment->item_name = $role;
            $assignment->created_at = time();
            $assignment->save();
            $result = $assignment;
        }


        return $result;
    }

    public function actionDelete($id)
    {

        $assignment = RbacAssignment::findByUserId($id);
        $assignment->delete();
        $result = $assignment;

        return $result;
    }
}
