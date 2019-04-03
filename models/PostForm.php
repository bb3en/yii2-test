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
class PostForm extends Model
{

    /**
     * Get "API" access token
     */  
    public function createPost()
    {    
        if (\Yii::$app->user->can('createPost')) {
            // create post
        }
    }

    /**
     * Get "API" access token
     */  
    public function updatePost()
    {    
        if (\Yii::$app->user->can('updatePost', ['post' => $post])) {
            // update post
        }
    }
    
}
