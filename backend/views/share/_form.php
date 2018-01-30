<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\Share */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="share-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'user_id')->textInput() ?>

        <?= $form->field($model, 'art_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'art_id')->textInput() ?>

        <?= $form->field($model, 'category')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
