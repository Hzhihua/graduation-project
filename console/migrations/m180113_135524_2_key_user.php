<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_user
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_user extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%user}}', 'id');
        $this->addAutoIncrement('{{%user}}', 'id', 'integer');
        $this->runSuccess['username'] = $this->createIndex('username', '{{%user}}', 'username', 1);
        $this->runSuccess['email'] = $this->createIndex('email', '{{%user}}', 'email', 0);

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
