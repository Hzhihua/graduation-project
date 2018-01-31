<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this \yii\web\View */
/* @var $generator \yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

require_once __DIR__ . '/../helpers/AttributeHandle.php';

echo "<?php\n";
?>

use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\widgets\DetailView;
use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\Html;
use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\Date;

/* @var $this \yii\web\View */
/* @var $model \<?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view box box-primary">
    <div class="box-header">
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (in_array($name, $generator->tableSchema->primaryKey)) {
            continue;
        }
        echo "                '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
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
            ],
        ]) ?>
    </div>
</div>
