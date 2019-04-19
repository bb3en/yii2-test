<?php


use yii\helpers\Html;
use yii\captcha\Captcha;

use app\bundles\packages\AdminAsset;
AdminAsset::register($this);


$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-update-permission-popup">
    <div class="row">
        <div class="col-lg-5">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $model->name ?>"><br />
            <br />
            <label class="control-label">Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $model->description ?>"><br />
            <button onclick="updateRbacPermission('<?php echo $model->name ?>')" type="button">儲存</button>
        </div>
    </div>
</div>