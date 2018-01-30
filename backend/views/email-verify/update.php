<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\EmailVerify */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'Email Verify') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Email Verifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="email-verify-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
