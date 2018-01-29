<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\ArticleStatus */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Article Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-status-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
