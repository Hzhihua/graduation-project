<?php

use backend\helpers\Html;
use yii\grid\GridView;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $searchModel \backend\models\search\ArticleStatusSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-status-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'Article Status'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
