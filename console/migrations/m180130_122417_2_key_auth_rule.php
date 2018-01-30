<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_2_key_auth_rule
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_2_key_auth_rule extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%auth_rule}}', 'name');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%auth_rule}}');
            } else {
                $this->dropIndex($keyName, '{{%auth_rule}}');
            }
        }

    }
}
