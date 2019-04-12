<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\ApiForm;
use function GuzzleHttp\Promise\each;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    public function actionNotice()
    {
        var_dump('1234');
    }

    public function actionError()
    { 
        $exception = Yii::$app->errorHandler->exception;
        $response = Yii::$app->getResponse();
  
        $result =
            [
                'code' => $response->statusCode,
                'message' => $response->statusText,
                'data' => $response->data,
            ];

        if ($response->statusCode == 500) {
            $exception = Yii::$app->getErrorHandler()->exception;

            if (YII_DEBUG) {

                $result =
                    [
                        'name' => ($exception instanceof Exception || $exception instanceof ErrorException) ?$exception->getName() : 'Exception',
                        'type' => get_class($exception),
                        'file' => $exception->getFile(),
                        'errorMessage' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                        'stack-trace' => explode("\n", $exception->getTraceAsString()),
                        //'mytest' => explode("\n", $exception->getTraceAsString()),
                    ];
                if ($exception instanceof Exception) {
                    $result['error-info'] = $exception->errorInfo;
                }
            } else {
                if (get_class($exception) == 'yii\\db\\IntegrityException') {
                    $result['errorMessage'] = $exception->errorInfo;
                    $result['data'] = get_class($exception);
                } else {
                    $result['errorMessage'] = $exception->getMessage();
                    $result['data'] = get_class($exception);
                }
            }
        }
        $response->format = yii\web\Response::FORMAT_JSON;
        return $this->asJson($result);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {


        if (!\Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->login();

            return $this->goBack();
        } else {

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAdminlte()
    {
        return $this->render('adminlte');
    }
}
