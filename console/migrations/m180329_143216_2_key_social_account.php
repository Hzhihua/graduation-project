<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_social_account
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_social_account extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%social_account}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%social_account}}', 'id', 'integer', '', 0);
        $this->runSuccess['account_unique'] = $this->createIndex('account_unique', '{{%social_account}}', 'provider,client_id', 1);
        $this->runSuccess['account_unique_code'] = $this->createIndex('account_unique_code', '{{%social_account}}', 'code', 1);
        $this->runSuccess['fk_user_account'] = $this->createIndex('fk_user_account', '{{%social_account}}', 'user_id', 0);

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
                $this->dropPrimaryKey(null, '{{%social_account}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%social_account}}');
            }
        }

    }
}
