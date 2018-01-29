<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this \yii\web\View */
/* @var $generator \yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

require_once __DIR__ . '/../helpers/AttributeHandle.php';

echo "<?php\n";
?>

use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use <?= substr($generator->controllerClass, 0, strpos($generator->controllerClass, '\\'))?>\helpers\Date;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this \<?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel \\" . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index box box-primary">
<?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : ''
?>    <div class="box-header with-border">
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Create') .' . '. $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
<?php if(!empty($generator->searchModelClass)): ?>
<?= "        <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif;

if ($generator->indexWidgetType === 'grid'):
    echo "        <?= " ?>GridView::widget([
            'dataProvider' => $dataProvider,
            <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n            'layout' => \"{items}\\n{summary}\\n{pager}\",\n            'columns' => [\n" : "'layout' => \"{items}\\n{summary}\\n{pager}\",\n            'columns' => [\n"; ?>
                ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (in_array($name, $generator->tableSchema->primaryKey)) {
            continue;
        }
        if (++$count < 6) {
            echo "                '" . $name . "',\n";
        } else {
            echo "                // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        if (in_array($column->name, $generator->tableSchema->primaryKey)) {
            continue;
        }
        if (
            stripos($column->name, 'created_at') !== false ||
            stripos($column->name, 'updated_at') !== false ||
            (stripos($column->name, 'time') !== false && $column->phpType === 'integer')
        ) {
            echo AttributeHandle::date($column->name) . ",\n";
        } else if (stripos($column->name, 'is_') !== false) {
            echo AttributeHandle::handleIsKeyWord($column->name) . ",\n";
        } else {
            $format = $generator->generateColumnFormat($column);
            echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }

    }
}
?>

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
<?php else: ?>
        <?= "<?= " ?>ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
            },
        ]) ?>
<?php endif; ?>
    </div>
<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
</div>
