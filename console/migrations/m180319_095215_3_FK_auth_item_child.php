<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_3_FK_auth_item_child
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_3_FK_auth_item_child extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'auth_item_child_ibfk_1'] = $this->addForeignKey($tablePrefix.'auth_item_child_ibfk_1', '{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE');
        $this->runSuccess[$tablePrefix.'auth_item_child_ibfk_2'] = $this->addForeignKey($tablePrefix.'auth_item_child_ibfk_2', '{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($tablePrefix.$keyName, '{{%auth_item_child}}');
        }

    }
}
