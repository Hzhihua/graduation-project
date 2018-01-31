<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\EmailVerify */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Email Verify');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Email Verifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-verify-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
