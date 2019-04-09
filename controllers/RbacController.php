<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;


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
    
    public function actionUpdate()
    {
        
    }

    public function actionCreate()
    {

    }

}