<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \backend\models\search\EmailVerifySearch */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="email-verify-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_category_id') ?>

    <?= $form->field($model, 'email_verify_auth') ?>

    <?= $form->field($model, 'email_verify_send_time') ?>

    <?= $form->field($model, 'email_verify_expire') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
