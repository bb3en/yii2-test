<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'RBAC-Permission Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= html::button('Create Permission',[
    'value'=>Url::to('create-permission-popup'),
    'class' => 'btn btn-success',
    'id' => 'createPermission'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Permission</h4>',
        'id' => 'modalCreatePermission' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreatePermissionContent'></div>";

    Modal::end();
?>

<?php
    Modal::begin([
        'header' => '<h4>Edit Permission</h4>',
        'id' => 'modalEditPermission' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalEditPermissionContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
     'columns' => [
        'name',
         'description',
         'ruleName',
         'createdAt:datetime',
         'updatedAt:datetime',
         [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete} ',
            'buttons' => [
                'update'=>function ($url, $model, $key) {
                    return Html::button('edit', [ 'value'=>Url::to('update-permission-popup?name='. $model->name),'class' => 'btn btn-xs btn-warning permission-edit-btn','data-name' => $model->name ]);
                },
                'delete'=>function ($url, $model, $key) {
                    return Html::button('delete', [ 'class' => 'btn btn-xs btn-danger permission-delete-btn','data-id' => $model->name,'data-name' => $model->name ]);
                }
            ]
        ],
     ],
]) ?>

</div>
