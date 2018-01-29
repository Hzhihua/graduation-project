<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this \yii\web\View */
/* @var $generator \yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();

$model->setScenario('insert');
$safeAttributes1 = $model->safeAttributes();

$model->setScenario('update');
$safeAttributes2 = $model->safeAttributes();

$safeAttributes = array_merge($safeAttributes1, $safeAttributes2);

if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

require_once __DIR__ . '/../helpers/AttributeHandle.php';

echo "<?php\n";
?>

use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\Html;
use <?= AttributeHandle::getAppName($generator->controllerClass) ?>\widgets\ActiveForm;

/* @var $model \<?= ltrim($generator->modelClass, '\\') ?> */
/* @var $this \<?= AttributeHandle::getAppName($generator->controllerClass) ?>\helpers\View */
/* @var $form \<?= AttributeHandle::getAppName($generator->controllerClass) ?>\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form box box-primary">
    <?= "<?php " ?>$form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        if (stripos($attribute, 'is') !== false) {
            echo "        <?= \$form->field(\$model, '$attribute')->dropDownList(['text' => '请选择', 0 => '否', 1 => '是']) ?>\n\n";
        } else {
            echo "        <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
        }
    }
} ?>
    </div>
    <div class="box-footer">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
