<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use app\bundles\packages\AdminAsset;
AdminAsset::register($this);

$this->title = 'RBAC-Role-Child Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-sm-flex align-items-left justify-content-between mb-4">
    <button type="button" id="createRoleChild" class="btn btn-success" value="create-role-child-popup">
        <i class="fas fa-plus-square"></i>
        Create RoleChild
    </button>
</div>

<!-- Modal -->
<div id="modalCreateRoleChild" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4>Create Role-Child</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalCreateRoleChildContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Role-Child DataTable -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Role-Child DataTable</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="role-childDataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Parent</th>
                            <th>Child</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>