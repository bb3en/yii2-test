<?php

namespace app\modules\api\v1\controllers;

use yii;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use app\models\User;

class UsersController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\Users';

    /* 分頁
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];*/
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                QueryParamAuth::className(),
                HttpBearerAuth::className(),
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
		$actions = parent::actions();

	    unset($actions['create'],$actions['update']);
	    
	    return $actions;

    }

    public function actionCreate()
    {   
        $request = Yii::$app->request->post();
        if(strrpos($request['username']," ")>0){
            return false;
        }
        $user = new User();
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->setPassword($request['password']);
        $user->generateAuthKey();
        $user->save();

        return $user;
    }
    
    public function actionUpdate($id)
    {   
        $user = User::findIdentity($id);
 
        $request = Yii::$app->request->post();

        $user->email = $request['email'];

        $user->save();

        return User::findIdentity($id);
    } 
}