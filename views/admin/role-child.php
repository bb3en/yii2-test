<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

use app\assets\RbacAsset;
RbacAsset::register($this);


$this->title = 'RBAC-Role-Child Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= html::button('Create RoleChild',[
    'value'=>Url::to('create-role-child-popup'),
    'class' => 'btn btn-success',
    'id' => 'createRoleChild'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Role-Child</h4>',
        'id' => 'modalCreateRoleChild' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreateRoleChildContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
    'columns' => [
        'parent',
        'child',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} ',
            'buttons' => [
                'delete'=>function ($url, $model, $key) {
                    
                    return Html::button('delete', [ 'class' => 'btn btn-xs btn-danger roleChild-delete-btn','data-parent' => $model->parent,'data-child' => $model->child ]);
                }
            ]
        ],
     ],
]) ?>

</div>
