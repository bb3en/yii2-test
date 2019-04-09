<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'RBAC-Role Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= html::button('Create Role',[
    'value'=>Url::to('create-role-popup'),
    'class' => 'btn btn-success',
    'id' => 'createRole'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Role</h4>',
        'id' => 'modalCreateRole' ,
        'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalCreateRoleContent'></div>";

    Modal::end();
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,       
    //  'columns' => [
    //     'id',
    //      'name',
    //      'created_at:datetime',
    //     // ...
    //  ],
]) ?>

</div>
