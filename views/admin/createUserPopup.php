<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;



$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-create-user-popup">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <button onclick="createUser()" type="button">送出</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>