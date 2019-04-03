<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ApiForm extends Model
{
    private $userId;
    private $accessToken;
    private $accessTokenAt;
 
    public function init()
    {
        
        $this->userId = Yii::$app->user->getId();
        $user = User::findIdentity($this->userId);
        $this->accessToken = $user['access_token'];
        $this->accessTokenAt = $user['access_token_at'];
    }

    /**
     * Get "API" access token
     */  
    public function getAccessToken()
    {    
        return $this->accessToken;
    }

    /**
     * Get "API" access token
     */  
    public function getAccessTokenExpiredTime()
    {    
        return Yii::$app->formatter->asDatetime($this->accessTokenAt+86400,'Y-MM-dd hh:mm:ss');
    }

    public function updateAccessToken()
    {
        $userModel = User::findIdentity($this->userId);
        $nowTime = time();
        $newToken = Yii::$app->security->generateRandomString(). '_' . $nowTime;
        $userModel->access_token = $newToken;
        $userModel->access_token_at = $nowTime;
        $saveCount = $userModel->save();
        if($saveCount>0){
            $this->accessToken = $userModel->access_token;
            $this->accessTokenAt = $userModel->access_token_at;
        }
        return $saveCount;  
    }

    public function isValidApiToken($token)
    {
        $userModel = User::findOne(['access_token' => $token]);
        
        if($userModel == null){
            return false;
        }
        if($userModel->access_token == ""){
            return false;
        }

        if($userModel->access_token_at + 86400 <= time()){
 
            return false;
        }

        return true;
  
    }
    
}
