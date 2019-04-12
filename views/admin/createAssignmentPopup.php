<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use app\modules\api\v1\models\RbacRole;
use app\models\User;
// use app\assets\RbacAsset;

// RbacAsset::register($this);

$this->params['breadcrumbs'][] = $this->title;

?>


<div class="admin-create-role-child-popup">

    <div class="row">
        <div class="col-lg-5">
            <label class="control-label">Username</label>
            <br />
            <select id="userNameSelect"></select>    
            <br /><br />
            <label class="control-label">Role</label>
            <br />
            <select id="roleSelect" ></select>
            <br /><br />
            <button onclick="createAssignment()" type="button">新增</button>
        </div>
    </div>
</div>
