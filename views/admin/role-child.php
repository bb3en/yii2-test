<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'RBAC-Role-Child Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= html::button('Create Role-Child',[
    'value'=>Url::to('create-role-child-popup'),
    'class' => 'btn btn-success',
    'id' => 'createRole'
    ]); ?>

<?php
    Modal::begin([
        'header' => '<h4>Create Role-Child</h4>',
        'id' => 'modalCreateRoleChild' ,
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
