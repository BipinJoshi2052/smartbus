<?php

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */
    /* @var $model \common\models\LoginForm */

    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;

    $this->title = 'Login';
    $this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class = "site-login">
        <h2 class = "page-info">
            <?= Yii::$app->params['system_name'] ?> Backend
        </h2>

        <div class = "login-wrapper">

            <div class = "form-wrapper">
                <div class = "page-title">
                    <h1><?= Html::encode($this->title) ?></h1>

                </div>
                <div class = "login-form">
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => FALSE]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => TRUE]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class = "form-actions">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>


        </div>

    </div>
</section>
