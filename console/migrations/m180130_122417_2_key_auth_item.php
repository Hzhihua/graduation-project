<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_2_key_auth_item
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_2_key_auth_item extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%auth_item}}', 'name');
        $this->runSuccess['rule_name'] = $this->createIndex('rule_name', '{{%auth_item}}', 'rule_name', 0);
        $this->runSuccess['type'] = $this->createIndex('type', '{{%auth_item}}', 'type', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%auth_item}}');
            } else {
                $this->dropIndex($keyName, '{{%auth_item}}');
            }
        }

    }
}
