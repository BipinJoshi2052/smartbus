<?php
    /* @var $this \yii\web\View */
    /* @var $content string */

    use yii\helpers\Html;

?><?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang = "<?= Yii::$app->language ?>">
    <head>
        <meta charset = "<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <link rel = "apple-touch-icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
        <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
        <title><?= ucwords(Yii::$app->params['system_name']) ?> - <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link href = 'http://fonts.googleapis.com/css?family=Poppins:400,600' rel = 'stylesheet' type = 'text/css'>
        <link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel = "stylesheet">
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity = "sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin = "anonymous">

        <style>
            body {
                color: #535353;
                font-family: "Poppins", sans-serif;
                height: 100vh;
            }

            .error-wrapper {
                display: table;
                width: 100%;
                height: 100%
            }

            .error-container {
                display: table-cell;
                vertical-align: middle;
                text-align: center;
            }

            .alert {
                border-radius: 0;
                margin: 60px 0 90px 0;
            }

            .btn-err > i {
                margin-right: 12px
            }

            h1 {
                font-size: 120px;
                font-weight: 600;
                color: #fccd20;
                padding: 0;
                line-height: 120px;
            }

            h3 {
                color: #9e9e9e;
                font-weight: 100;
                font-size: 26px;
                line-height: 26px;
                padding: 0;
            }

            h1, h3, p {
                margin-bottom: 20px;
            }

            p {
                padding: 20px 0;
            }

            a.btn {
                font-size: 14px;
                padding: 8px 18px;
                background: #cfcfcf;
                border-radius: 4px;
                text-decoration: none;
                color: #535353;
                margin-right: 32px;
            }

            a.btn:last-child {
                margin: 0;
            }

            a.btn:hover {
                background: #fccd20;
                color: #ffffff;
            }

            .icon {
                display: inline-block;
                width: 150px;
                height: 150px;
                border: 5px solid #fccd20;
                border-radius: 50%;
                margin-bottom: 30px;
            }

            .icon > i {
                font-size: 70px;
                line-height: 150px;
                color: #fccd20;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class = "error-wrapper">
            <div class = "error-container">
                <?= $content ?>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>