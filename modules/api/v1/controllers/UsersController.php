<?php

namespace app\modules\api\v1\controllers;

use yii;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;

use yii\web\Response;
use yii\db\Exception as DbException;

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

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actions()
    {
		$actions = parent::actions();

	    unset($actions['create'],$actions['update'],$actions['index']);
	    
	    return $actions;

    }

    public function actionIndex()
    {

        $result = User::find()->all();
        $redis = Yii::$app->redis;
        return $result;
    }

    public function actionCreate()
    {   
        // try {
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
            $result = $user;

    //    } catch (DbException $e) {
    //         $result =  [
    //             'code' => $e->getCode(),
    //             'data' => '',
    //             'message' => '重複'
    //         ];
    //     } catch (Exception $e) {
    //         $result =  [
    //             'code' => $e->getCode(),
    //             'data' => '',
    //             'message' => $e->getMessage()
    //         ];
    //     }
        return $result;
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