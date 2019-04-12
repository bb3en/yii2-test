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

use app\modules\api\v1\models\RbacAssignment;
use app\modules\api\v1\models\RbacPermission;
use app\modules\api\v1\models\RbacRole;
use app\modules\api\v1\models\RbacRoleChild;
use app\modules\api\v1\models\RbacItem;
use yii\helpers\ArrayHelper;

/**
 * This controller used ...
 * 
 * @author dddd <dd.bt@adgeek.com.tw
 * @verserion
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'permission',
                            'role',
                            'role-child',
                            'assignment',
                            'user',
                            'create-assignment-popup',
                            'create-permission-popup',
                            'create-role-child-popup',
                            'create-role-popup',
                            'create-user-popup',
                            'update-permission-popup',
                            'update-role-popup',
                            'update-user-popup',
                        ],
                        'roles' => ['admin'],
                    ]
                ],
            ],
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
                'fixedVerifyCode' => YII_ENV_TEST ?'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPermission()
    {
        //$auth = Yii::$app->authManager;

        $dataProvider = new ActiveDataProvider([
            'query' => RbacPermission::find(),
            'pagination' => [
                'pageSize' => 8,
            ]
        ]);

        return $this->render('permission', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRole()
    {
        $auth = Yii::$app->authManager;

        $dataProvider = new ActiveDataProvider([
            'query' => RbacRole::find(),
            'pagination' => [
                'pageSize' => 8,
            ]
        ]);
        return $this->render('role', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRoleChild()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RbacRoleChild::find(),
            'pagination' => [
                'pageSize' => 8,
            ]
        ]);

        return $this->render('role-child', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAssignment()
    {

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT user.id, user.username, auth_assignment.item_name as role, user.email ' .
                'FROM `auth_assignment` ,`user` ' .
                'WHERE auth_assignment.user_id = user.id ',
        ]);
        // $query = RbacAssignment::find();

        // $query->select('auth_assignment.*, user.username');

        // $query->joinWith(['user']);

        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        //     'pagination' => [
        //        'pageSize' => 8,
        //    ]
        // ]);

        return $this->render('assignment', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     *  This action used to hadnle
     * 
     * @params int $id
     * @return Curl
     */
    public function actionUser()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 8,
            ]
        ]);

        return $this->render('user', [
            'dataProvider' => $dataProvider,

        ]);
    }

    public function actionCreateUserPopup()
    {
        $model = new UserForm();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createUserPopup', [
                'model' => $model,
            ]);
        }

        return null;
    }

    public function actionUpdateUserPopup()
    {

        $model = User::findIdentity(Yii::$app->request->get()['id']);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('updateUserPopup', [
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

            $name = ArrayHelper::getValue($_GET, 'name', '');
            $model = RbacPermission::findByName($name);

            return $this->renderAjax('updatePermissionPopup', [
                'model' => $model,
            ]);
        }

        return null;
    }

    public function actionCreateRolePopup()
    {

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createRolePopup');
        }
        return null;
    }

    public function actionUpdateRolePopup()
    {

        if (Yii::$app->request->isAjax) {

            $name = ArrayHelper::getValue($_GET, 'name', '');
            $model = RbacRole::findByName($name);

            return $this->renderAjax('updateRolePopup', [
                'model' => $model,
            ]);
        }

        return null;
    }

    public function actionCreateRoleChildPopup()
    {

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createRoleChildPopup');
        }
        return null;
    }

    public function actionCreateAssignmentPopup()
    {

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('createAssignmentPopup');
        }
        return $this->renderAjax('createAssignmentPopup');
    }
}
