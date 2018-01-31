<?php

use backend\helpers\Html;
use yii\grid\GridView;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $searchModel \backend\models\search\EmailVerifySearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Email Verifies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-verify-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'Email Verify'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'user_id',
                'user_category_id',
                'email_verify_auth:email',
                [
                    'attribute' => 'email_verify_send_time',
                    'value' => function ($model) {
                        return Date::show($model->email_verify_send_time);
                    },
                ],
                'email_verify_expire:email',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
