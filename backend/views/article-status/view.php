<?php

use backend\widgets\DetailView;
use backend\helpers\Html;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $model \common\models\ArticleStatus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-status-view box box-primary">
    <div class="box-header">
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'sort',
                [
                    'attribute' => 'is_allow_public',
                    'value' => function ($model) {
                        if ($model->is_allow_public) return '是';
                        else return '否';
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return Date::show($model->created_at);
                    },
                ],
                [
                    'attribute' => 'updated_at',
                    'value' => function ($model) {
                        return Date::show($model->updated_at);
                    },
                ],
            ],
        ]) ?>
    </div>
</div>
