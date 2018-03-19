<?php
namespace common\fixtures;

use yii\test\ActiveFixture;
use yii\test\FixtureTrait;

class UserFixture extends ActiveFixture
{
    use FixtureTrait;
    public $modelClass = 'common\models\User';
}