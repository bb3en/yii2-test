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

<button type="button" id="createRoleChild" class="btn btn-success" value="create-role-child-popup">Create RoleChild</button>

<!-- Modal -->
<div id="modalCreateRoleChild" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Create Role-Child</h4>
            </div>
            <div class="modal-body">
                <div id="modalCreateRoleChildContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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


