<?php

/* @var $model app\models\ApiForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'API Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
function updateAccessToken(){
    $.ajax({
       url: '<?php echo Yii::$app->request->baseUrl. '/api/update-token' ?>',
       type: 'post',
       data: {
                 _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
             },
       success: function (result) {
          document.getElementById('accessToken').innerHTML = result.token;
          document.getElementById('expiredTime').innerHTML = result.expired;
       }
  });
}
</script>
<div class="site-api">
Your Api Access Token : 
<code id='accessToken'><?php echo $model->getAccessToken(); ?></code>
<button onclick="updateAccessToken()">Update Token</button>
<br/><br/>
Your Token Expired At : 
<code id='expiredTime'><?php echo $model->getAccessTokenExpiredTime(); ?></code>




</div>
