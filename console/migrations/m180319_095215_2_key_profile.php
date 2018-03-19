<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_profile
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_profile extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%profile}}', 'user_id');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%profile}}');
            } else {
                $this->dropIndex($keyName, '{{%profile}}');
            }
        }

    }
}
