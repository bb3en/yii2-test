<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use app\bundles\packages\AdminAsset;
AdminAsset::register($this);


$this->title = 'RBAC-Role Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-sm-flex align-items-left justify-content-between mb-4">
    <button type="button" id="createRole" class="btn btn-success" value="create-role-popup">
        <i class="fas fa-plus-square"></i>
        Create Role
    </button>
</div>

<!-- Modal -->
<div id="modalCreateRole" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalCreateRoleContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="modalEditRole" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalEditRoleContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Role DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Role DataTable</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="roleDataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rule Name</th>
                            <th>Created_At</th>
                            <th>Updated_At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>