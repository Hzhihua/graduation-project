<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_3_FK_auth_item
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_3_FK_auth_item extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'auth_item_ibfk_1'] = $this->addForeignKey($tablePrefix.'auth_item_ibfk_1', '{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'SET NULL', 'CASCADE');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($tablePrefix.$keyName, '{{%auth_item}}');
        }

    }
}
