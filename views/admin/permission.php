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

<div class="d-sm-flex align-items-left justify-content-between mb-4">
    <button type="button" id="createPermission" class="btn btn-success" value="create-permission-popup">
        <i class="fas fa-plus-square"></i>
        Create Permission
    </button>
</div>

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

<!-- Permission DataTable -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Permission DataTable</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="permissionDataTable" class="table table-striped table-bordered" style="width:100%">
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
