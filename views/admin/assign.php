<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'RBAC-Assign Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= html::button('Create Assign',[
    'value'=>Url::to('create-assign-popup'),
    'class' => 'btn btn-success',
    'id' => 'createRole'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Assign</h4>',
        'id' => 'modalCreateAssign' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreateAssignContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
    //  'columns' => [
    //     'id',
    //      'name',
    //      'created_at:datetime',
    //     // ...
    //  ],
]) ?>

</div>
