<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-status-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sort')->textInput() ?>

        <?= $form->field($model, 'is_allow_public')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
