<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\UserStatus */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'User Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-status-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
