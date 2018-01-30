<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_2_key_auth_item_child
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_2_key_auth_item_child extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%auth_item_child}}', 'parent,child');
        $this->runSuccess['child'] = $this->createIndex('child', '{{%auth_item_child}}', 'child', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%auth_item_child}}');
            } else {
                $this->dropIndex($keyName, '{{%auth_item_child}}');
            }
        }

    }
}
