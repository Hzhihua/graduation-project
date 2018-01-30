<?php

use backend\helpers\Html;
use yii\grid\GridView;
use backend\helpers\Date;

/* @var $this \backend\helpers\View */
/* @var $searchModel \backend\models\search\UserSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'User'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'username',
                'auth_key',
                'password',
                'password_reset_token',
                'email:email',
                [
                    'attribute' => 'is_email_pass',
                    'value' => function ($model) {
                        if ($model->is_email_pass) return '是';
                        else return '否';
                    },
                ],
                'user_category_id',
                'user_status_id',
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
