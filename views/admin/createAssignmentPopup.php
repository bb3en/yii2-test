<?php

// use app\assets\RbacAsset;

// RbacAsset::register($this);

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="admin-create-role-child-popup">
    <div class="row">
        <div class="col-lg-5">
            <label class="control-label">Username</label>
            <br />
            <select id="assignmentUserNameSelect"></select>    
            <br /><br />
            <label class="control-label">Role</label>
            <br />
            <select id="assignmentRoleSelect" ></select>
            <br /><br />
            <button onclick="createAssignment()" type="button">新增</button>
        </div>
    </div>
</div>
