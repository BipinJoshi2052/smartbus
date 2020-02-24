<?php
    /* @var $this \yii\web\View */
    /* @var $content string */
    use backend\assets\AppAsset;
    use yii\helpers\Html;

    AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
<head>
    <meta charset = "<?= Yii::$app->charset ?>">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title><?php echo Yii::$app->params['system_name'] ?> - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Favicon icon -->
    <link rel = "apple-touch-icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
    <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
    <!-- Bootstrap Core CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel = "stylesheet">

    <!-- Custom CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/style.css" rel = "stylesheet">
    <!-- You can change the theme colors from here -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/login.css" rel = "stylesheet">

    <style>
        p.help-block-error {
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
            color: #ef6155;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src = "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>

    <script>
        var baseUrl = "<?php echo Yii::$app->request->baseUrl; ?>";
    </script>
</head>
<body class = "fix-header fix-sidebar card-no-border">
    <?php $this->beginBody() ?>
    <!--[if lt IE 8]>
    <p class = "browserupgrade">You are using an <strong>outdated</strong> browser. Please
        <a href = "http//browsehappy.com/">upgrade your browser</a>
        to improve your experience.
    </p><![endif]-->

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class = "preloader">
        <svg class = "circular" viewBox = "25 25 50 50">
            <circle class = "path" cx = "50" cy = "50" r = "20" fill = "none" stroke-width = "2" stroke-miterlimit = "10"/>
        </svg>
    </div>

    <!-- Page -->
    <?= $content ?>
    <!-- End Page -->

    <!-- CSRF TOKEN -->
    <script>
        $.ajaxSetup({
            data: {
                _csrf: $('meta[name=csrf-token]').prop('content')
            }
        });
    </script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/popper/popper.min.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.slimscroll.js"></script>

    <!--Wave Effects -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/waves.js"></script>

    <!--Menu sidebar -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sidebarmenu.js"></script>
    <?php $this->endBody(); ?>
    <script>
        $(function () {
            $(document).ready(function () {
                $('.preloader').remove();
            });
        });
    </script>
</body>
</html>
<?php $this->endPage(); ?>
