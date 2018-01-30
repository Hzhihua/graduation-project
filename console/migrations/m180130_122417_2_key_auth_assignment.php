<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_2_key_auth_assignment
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_2_key_auth_assignment extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%auth_assignment}}', 'item_name,user_id');
        $this->runSuccess['auth_assignment_user_id_idx'] = $this->createIndex('auth_assignment_user_id_idx', '{{%auth_assignment}}', 'user_id', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%auth_assignment}}');
            } else {
                $this->dropIndex($keyName, '{{%auth_assignment}}');
            }
        }

    }
}
