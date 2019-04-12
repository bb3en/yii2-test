<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

use app\assets\RbacAsset;

RbacAsset::register($this);

$this->title = 'RBAC-Assignment Manager';
$this->params['breadcrumbs'][] = $this->title;
?>


<button type="button" id="createAssignment" class="btn btn-success" value="create-assignment-popup">Create Assignment</button>

<!-- Modal -->
<div id="modalCreateAssignment" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Create Assignment</h4>
            </div>
            <div class="modal-body">
                <div id="modalCreateAssignmentContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<br /><br />

<table id="assignmentTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

</div>