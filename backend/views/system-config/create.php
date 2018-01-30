<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\SystemConfig */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'System Config');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'System Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-config-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
