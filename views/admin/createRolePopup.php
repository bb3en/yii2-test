<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;

use yii\captcha\Captcha;

use app\bundles\packages\AdminAsset;
AdminAsset::register($this);


$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-create-role-popup">
    <div class="row">
        <div class="col-lg-5">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value=""><br />
            <label class="control-label">Description</label>
            <input type="text" name="description" class="form-control" value=""><br />
            <button onclick="createRbacRole()" type="button">新增</button>
        </div>
    </div>
</div>