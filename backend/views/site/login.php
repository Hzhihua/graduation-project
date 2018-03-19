<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this \yii\web\View */
/* @var $form \yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback', 'value' => ''],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>",
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput([
                'placeholder' => $model->getAttributeLabel('username'),
                'value' => '',
            ]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput([
                'placeholder' => $model->getAttributeLabel('password'),
                'value' => '',
            ]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton($model->getAttributeLabel('signIn'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-8">
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' =>
                    '<div class="row"><div class="col-lg-12">{image}</div><div class="col-lg-12">{input}</div></div>',
            ])
            ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
