<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

use app\assets\RbacAsset;
RbacAsset::register($this);


$this->title = 'RBAC-Role Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= html::button('Create Role',[
    'value'=>Url::to('create-role-popup'),
    'class' => 'btn btn-success',
    'id' => 'createRole'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Role</h4>',
        'id' => 'modalCreateRole' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreateRoleContent'></div>";

    Modal::end();
?>

<?php
    Modal::begin([
        'header' => '<h4>Edit Role</h4>',
        'id' => 'modalEditRole' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalEditRoleContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
    'columns' => [
        'name',
         'description',
         'rule_name',
         'created_at:datetime',
         'updated_at:datetime',
         [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete} ',
            'buttons' => [
                'update'=>function ($url, $model, $key) {
                    return Html::button('edit', [ 'value'=>Url::to('update-role-popup?name='. $model->name),'class' => 'btn btn-xs btn-warning role-edit-btn','data-name' => $model->name ]);
                },
                'delete'=>function ($url, $model, $key) {
                    return Html::button('delete', [ 'class' => 'btn btn-xs btn-danger role-delete-btn','data-id' => $model->name,'data-name' => $model->name ]);
                }
            ]
        ],
     ],
]) ?>

</div>
