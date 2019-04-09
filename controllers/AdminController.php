<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\SqlDataProvider;

use app\models\User;
use app\models\ContactForm;
use app\models\UserForm;
use app\models\AuthAssignment;
use app\models\AuthItemChild;
use yii\helpers\ArrayHelper;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
  
        ];
    }   

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

    public function actionPermission()
    {
        $auth = Yii::$app->authManager;

        $dataProvider = new ArrayDataProvider([
            'allModels' => $auth->getPermissions(),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('permission',[
            'dataProvider' => $dataProvider,
         ]);
    }

    public function actionRole()
    {
        $auth = Yii::$app->authManager;

        $dataProvider = new ArrayDataProvider([
            'allModels' => $auth->getRoles(),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('role',[
            'dataProvider' => $dataProvider,
         ]);
    }

    public function actionRoleChild()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItemChild::find(),
            'pagination' => [
               'pageSize' => 8,
           ]
        ]);
        
        return $this->render('role-child',[
            'dataProvider' => $dataProvider,
         ]);
    }

    public function actionAssign()
    {
        
        $dataProvider = new ActiveDataProvider([
            'query' => AuthAssignment::find(),
            'pagination' => [
               'pageSize' => 8,
           ]
        ]);

        return $this->render('assign',[
            'dataProvider' => $dataProvider,
         ]);
    }

    public function actionUser()
    {
         $dataProvider = new ActiveDataProvider([
             'query' => User::find(),
             'pagination' => [
                'pageSize' => 8,
            ]
         ]);

        return $this->render('user',[
            'dataProvider' => $dataProvider,
            
         ]);
    }

    public function actionCreateUserPopup()
    {
        $model = new UserForm();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createUserPopup',[
                'model' => $model,
            ]);
        }

        return null;
    }

    public function actionUpdateUserPopup()
    {
        
        $model = User::findIdentity(Yii::$app->request->get()['id']);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('updateUserPopup',[
                'model' => $model,
            ]);
        }

        return null;
    }
    
    public function actionCreatePermissionPopup()
    {
        
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createPermissionPopup');
        }
        return null;
    }

    public function actionUpdatePermissionPopup()
    {
    
        if (Yii::$app->request->isAjax) {

            $name = ArrayHelper::getValue($_GET,'name', '');
            $model = $auth = Yii::$app->authManager->getPermissions()[$name];

            return $this->renderAjax('updatePermissionPopup',[
                'model' => $model,
            ]);

        }

        return null;
    }
    
 
}