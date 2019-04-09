<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'User Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= html::button('Create User',[
    'value'=>Url::to('create-user-popup'),
    'class' => 'btn btn-success',
    'id' => 'createUser'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create User</h4>',
        'id' => 'modalCreateUser' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreateUserContent'></div>";

    Modal::end();
?>

<?php
    Modal::begin([
        'header' => '<h4>Edit User</h4>',
        'id' => 'modalEditUser' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalEditUserContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'username',
        'email',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete} ',
            'buttons' => [
                'update'=>function ($url, $model, $key) {
                    return Html::button('edit', [ 'value'=>Url::to('update-user-popup?id='. $model->id),'class' => 'btn btn-xs btn-warning user-edit-btn','data-id' => $model->id ]);
                },
                'delete'=>function ($url, $model, $key) {
                    return Html::button('delete', [ 'class' => 'btn btn-xs btn-danger user-delete-btn','data-id' => $model->id,'data-name' => $model->username ]);
                }
            ]
        ],
    ],
]) ?>


</div>
