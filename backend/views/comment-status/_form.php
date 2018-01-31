<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\CommentStatus */
/* @var $this \yii\web\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="comment-status-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sort')->textInput() ?>

        <?= $form->field($model, 'is_allow_public')->dropDownList(['text' => '请选择', 0 => '否', 1 => '是']) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
