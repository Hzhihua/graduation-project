<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%user}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%user}}', 'id', 'integer', '', 3);
        $this->runSuccess['user_unique_username'] = $this->createIndex('user_unique_username', '{{%user}}', 'username', 1);
        $this->runSuccess['user_unique_email'] = $this->createIndex('user_unique_email', '{{%user}}', 'email', 1);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%user}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%user}}');
            }
        }

    }
}
