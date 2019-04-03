<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

use app\models\ApiForm;

class ApiController extends Controller
{
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
    
    public function actionManager()
    {
        
        if (\Yii::$app->user->isGuest) {

            return $this->goHome();
        }
        $model = new ApiForm();
        return $this->render('manager', [
            'model' => $model,
        ]);
    }

    public function actionUpdateToken()
    {
 
        if (\Yii::$app->user->isGuest) {

            return $this->goHome();
        }
        $model = new ApiForm();
        $result = '';
        if($model->updateAccessToken() > 0 ) {
            
            $result = 'Update Sucess';
        }
        else {
            $result = 'Update Fail';      
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'result' => $result,
            'token' => $model->getAccessToken(),
            'expired' => $model->getAccessTokenExpiredTime()
        ];
    }

}