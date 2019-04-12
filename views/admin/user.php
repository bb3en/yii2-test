<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'User Manager';
$this->params['breadcrumbs'][] = $this->title;
?>


<button type="button" id="createUser" class="btn btn-success" value="create-user-popup">Create User</button>

<!-- Modal -->
<div id="modalCreateUser" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalCreateUserContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="modalEditUser" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Edit User</h4>
            </div>
            <div class="modal-body">
                <div id="modalEditUserContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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



