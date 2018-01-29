<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\helpers\Date;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view box box-primary">
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
                'title',
                'description',
                'content:ntext',
                'is_top',
                'status',
                [
                    'attribute' => 'public_time',
                    'value' => function ($model) {
                        return Date::show($model->public_time);
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
