<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\Comment */
/* @var $this \yii\web\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="comment-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'entity')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'entityId')->textInput() ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'parentId')->textInput() ?>

        <?= $form->field($model, 'level')->textInput() ?>

        <?= $form->field($model, 'createdBy')->textInput() ?>

        <?= $form->field($model, 'updatedBy')->textInput() ?>

        <?= $form->field($model, 'relatedTo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'createdAt')->textInput() ?>

        <?= $form->field($model, 'updatedAt')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
