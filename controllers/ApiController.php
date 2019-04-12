<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\ApiForm;
use Exception;
use yii\db\Exception as DbException;

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
 
        try {
            if (\Yii::$app->user->isGuest) {
                throw new Exception("Perm deny... [1]", 403);
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
    
            $result =  [
                'code' => 200,
                'data' => [
                    'result' => $result,
                    'token' => $model->getAccessToken(),
                    'expired' => $model->getAccessTokenExpiredTime()
                ]
            ];

            // $result = [
            //     'result' => $result,
            //     'token' => $model->getAccessToken(),
            //     'expired' => $model->getAccessTokenExpiredTime()
            // ];

        } catch (DbException $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => 'xxxxxx'
            ];
        } catch (Exception $e) {
            $result =  [
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getMessage()
            ];
        }

        return $this->asJson($result);
    }

}