<?php

namespace app\components;

use Exception;
use yii\filters\auth\CompositeAuth;
use yii\web\UnauthorizedHttpException;

class MyCompositeAuth extends CompositeAuth
{

      /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
        // return true;
        // 1/0;
        // throw new Exception('123', 100);
    
        // throw new UnauthorizedHttpException('111');
        // if(empty($this->authMethods)){
        //     throw new UnauthorizedHttpException(401);
        // }
 
        // return empty($this->authMethods) ? true : parent::beforeAction($action);
    }
}