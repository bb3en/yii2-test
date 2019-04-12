<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\grid\GridView;
use app\assets\RbacAsset;
RbacAsset::register($this);

$this->title = 'RBAC-Permission Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<button type="button" id="createPermission" class="btn btn-success" value="create-permission-popup">Create Permission</button>

<!-- Modal -->
<div id="modalCreatePermission" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create Permission</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalCreatePermissionContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div id="modalEditPermission" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4>Edit Permission</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalEditPermissionContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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
                    return Html::button('edit', [ 'value'=>Url::to('update-permission-popup?name='. $model->name),'class' => 'btn btn-xs btn-warning permission-edit-btn','data-name' => $model->name ]);
                },
                'delete'=>function ($url, $model, $key) {
                    return Html::button('delete', [ 'class' => 'btn btn-xs btn-danger permission-delete-btn','data-id' => $model->name,'data-name' => $model->name ]);
                }
            ]
        ],
     ],
]) ?>

