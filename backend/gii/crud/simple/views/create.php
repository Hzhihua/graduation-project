<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this \yii\web\View */
/* @var $generator \yii\gii\generators\crud\Generator */

require_once __DIR__ . '/../helpers/AttributeHandle.php';

echo "<?php\n";
?>

/* @var $this \yii\web\View */
/* @var $model \<?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create') ?> . <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">

    <?= "<?= " ?>$this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
