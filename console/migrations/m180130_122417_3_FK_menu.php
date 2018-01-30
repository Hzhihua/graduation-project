<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_3_FK_menu
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_3_FK_menu extends Migration
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
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($tablePrefix.$keyName, '{{%menu}}');
        }

    }
}
