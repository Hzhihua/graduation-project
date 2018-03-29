<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_3_FK_menu
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_3_FK_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'menu_ibfk_1'] = $this->addForeignKey($tablePrefix.'menu_ibfk_1', '{{%menu}}', 'parent', '{{%menu}}', 'id', 'SET NULL', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%menu}}');
        }

    }
}
