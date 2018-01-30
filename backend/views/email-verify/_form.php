<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\EmailVerify */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="email-verify-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'user_id')->textInput() ?>

        <?= $form->field($model, 'user_category_id')->textInput() ?>

        <?= $form->field($model, 'email_verify_auth')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email_verify_send_time')->textInput() ?>

        <?= $form->field($model, 'email_verify_expire')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
