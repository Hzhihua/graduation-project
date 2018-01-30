<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \backend\models\search\UserSearch */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'is_email_pass') ?>

    <?php // echo $form->field($model, 'user_category_id') ?>

    <?php // echo $form->field($model, 'user_status_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
