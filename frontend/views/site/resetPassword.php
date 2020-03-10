<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password" style="padding: 50px; margin-left: 14%">
    <h1><?= Html::encode($this->title) ?></h1>
   <p>Your email will be used to reset your password.</p>

    <div class="row">
        <div class="col-lg-5">
            <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/site/reset" enctype = "multipart/form-data">
               <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
               <?php $counter = 0; ?>
               <div class = "form-group">
                   <?php $counter++; ?>
                  <label for = "<?php echo $counter; ?>" class = "control-label required">Email</label>
                  <input id = "<?php echo $counter; ?>" name = "email" type = "text" class = "form-control required" value = "<?php echo (isset($editable)) ? $editable : '' ?>">
               </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?php if (isset($response) && $response == 1) {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Password Changed!","Your password reset request has been sent.","success");';
    echo '}, 1000);</script>';
}
elseif (isset($response) && $response = 0) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Error!","There was an error processing the request!","error");';
    echo '}, 1000);</script>';
} ?>