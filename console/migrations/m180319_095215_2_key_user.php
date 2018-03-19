<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_user
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_user extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%user}}', 'id');
        $this->addAutoIncrement('{{%user}}', 'id', 'integer');
        $this->runSuccess['user_unique_username'] = $this->createIndex('user_unique_username', '{{%user}}', 'username', 1);
        $this->runSuccess['user_unique_email'] = $this->createIndex('user_unique_email', '{{%user}}', 'email', 1);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%user}}');
            } else {
                $this->dropIndex($keyName, '{{%user}}');
            }
        }

    }
}
