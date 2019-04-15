<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\grid\GridView;

use app\assets\RbacAsset;

RbacAsset::register($this);

$this->title = 'RBAC-Assignment Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-sm-flex align-items-left justify-content-between mb-4">
    <button type="button" id="createAssignment" class="btn btn-success" value="create-assignment-popup">
        <i class="fas fa-plus-square"></i>
        Create Assignment
    </button>
</div>

<!-- Modal -->
<div id="modalCreateAssignment" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create Assignment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                <div id="modalCreateAssignmentContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Assignment DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assignment DataTable</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
        </div>
    </div>
</div>