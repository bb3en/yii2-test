<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;

use app\assets\RbacAsset;
RbacAsset::register($this);


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create-role-child-popup">

    <div class="row">
            <div class="col-lg-5">
            <label class="control-label" >Parent</label>
            <br/>
            <?= Html::dropDownList('parent', null,ArrayHelper::map(RbacItem::find()->all(), 'name', 'name'),['class'=>'dropdown']) ?>
            <br/><br/>   
            <label class="control-label" >Child</label>
            <br/> 
            <?= Html::dropDownList('child', null,ArrayHelper::map(RbacItem::find()->all(), 'name', 'name'),['class'=>'dropdown']) ?>
            <br/><br/>  
            <button onclick="createRbacRoleChild()" type="button">新增</button>

            </div>
        </div>
</div>