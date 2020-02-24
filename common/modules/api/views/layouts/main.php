<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
   <meta charset="<?= Yii::$app->charset ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?php $this->registerCsrfMetaTags() ?>
   <title><?php echo Yii::$app->params['system_name'] ?> - <?= Html::encode($this->title) ?></title>
   <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">

   <!-- Bootstrap Core CSS -->
   <link href="<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">



   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please
   <a href="http//browsehappy.com/">upgrade your browser</a>
   to improve your experience. </p><![endif]-->

<div>
   <div class="page-wrapper">
      <!-- Page -->
       <?= $content ?>
   </div>
</div>


</body>
</html>
<?php $this->endPage() ?>
