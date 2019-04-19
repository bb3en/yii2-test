<?php

use yii\helpers\Html;

use yii\captcha\Captcha;

use app\bundles\packages\AdminAsset;
AdminAsset::register($this);


$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-update-user-popup">
    <div class="row">
        <div class="col-lg-5">
            <label class="control-label">UserName : <?php echo $model->username; ?></label>
            <br /><br />
            <label class="control-label">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $model->email; ?>"><br />
            <button onclick="updateUser('<?php echo $model->id ?>')" type="button">儲存</button>
        </div>
    </div>
</div>