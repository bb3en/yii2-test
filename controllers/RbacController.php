<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;

use app\modules\api\v1\models\RbacAssignment;
use app\modules\api\v1\models\RbacPermission;
use app\modules\api\v1\models\RbacRole;
use app\modules\api\v1\models\RbacRoleChild;


class RbacController extends Controller
{
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'allow' => true,
    //                     'actions' => ['index'],
    //                     'roles' => ['viewPost'],
    //                 ],
    //                 [
    //                     'allow' => true,
    //                     'actions' => ['create'],
    //                     'roles' => ['createPost'],
    //                 ],
    //                 [
    //                     'allow' => true,
    //                     'actions' => ['update'],
    //                     'roles' => ['updatePost'],
    //                 ],
    //                 [
    //                     'allow' => true,
    //                     'actions' => ['updateOwn'],
    //                     'roles' => ['updateOwnPost'],
    //                 ],
    //             ],
    //         ],
    //     ];
    // }   

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreatePermission()
    {
        $auth = Yii::$app->authManager;
        
        if (Yii::$app->request->isAjax) 
        {
            $name  = (string)ArrayHelper::getValue($_POST,'name', 'null');
            $description  = (string)ArrayHelper::getValue($_POST,'description', 'null');
            $createPermission = $auth->createPermission($name);
            $createPermission->description = $description;
            try {
                $auth->add($createPermission);
            
                return 'OK'; 
            
            } catch (Exception $e) {
                 return 'NG';
            }
        }
        return $this->goHome();
    }
    
    public function actionUpdatePermission()
    {
        
        if (Yii::$app->request->isAjax) 
        {
            $name  = (string)ArrayHelper::getValue($_POST,'name', 'null');
            $newName  = (string)ArrayHelper::getValue($_POST,'newName', 'null');
            $description  = (string)ArrayHelper::getValue($_POST,'description', 'null');
            $model = AuthItem::findByName($name);
            $model->name = $newName;
            $model->description = $description;
            $model->updated_at = time();
            if($model->save())
            {
                return 'OK';
            }
            else
            {
                return 'NG';
            }

        }
        return $this->goHome();
    }

    public function actionCreate()
    {

    }

}