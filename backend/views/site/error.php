<?php

    /* @var $this yii\web\View */
    /* @var $name string */
    /* @var $message string */
    /* @var $exception Exception */

    use yii\helpers\Html;

    $this->title = $name;
?>

<div class = "site-error">
    <div class = "icon">
        <!-- <i class = "fa fa-exclamation-circle"></i> -->
        <i class = "fa fa-exclamation"></i>
    </div>
    <h1><?php echo Yii::$app->errorHandler->exception->statusCode; ?></h1>

    <div class = "alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p>
        To Inform us about this error, Please send an email with the screen shot to
        <a href = "mailto:'<?php echo Yii::$app->params['adminEmail'] ?>'"><?php echo Yii::$app->params['adminEmail'] ?></a>
    </p>

    <p>
        <?= ucwords(Yii::$app->params['system_name']) ?>
    </p>
    <div class = "error-actions margin-top-90">
       <a class = "btn btn-err" href = "javascript: history.go(-1)" role = "button">
          <i class = "fa fa-chevron-left"></i>
          Go Back
       </a>
        <a class = "btn btn-err" href = "<?php echo Yii::$app->request->baseUrl; ?>" role = "button">
            <i class = "fa fa-home"></i>
            Go Home
        </a>
       <a class = "btn btn-err" href = "<?=  Yii::$app->request->baseUrl; ?>/" role = "button">
          <i class = "fa fa-chevron-left"></i>
          Login
       </a>
    </div>
</div>
