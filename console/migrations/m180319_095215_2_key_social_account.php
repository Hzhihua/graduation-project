<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_social_account
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_social_account extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%social_account}}', 'id');
        $this->addAutoIncrement('{{%social_account}}', 'id', 'integer');
        $this->runSuccess['account_unique'] = $this->createIndex('account_unique', '{{%social_account}}', 'provider', 1);
        $this->runSuccess['account_unique'] = $this->createIndex('account_unique', '{{%social_account}}', 'client_id', 1);
        $this->runSuccess['account_unique_code'] = $this->createIndex('account_unique_code', '{{%social_account}}', 'code', 1);
        $this->runSuccess['fk_user_account'] = $this->createIndex('fk_user_account', '{{%social_account}}', 'user_id', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%social_account}}');
            } else {
                $this->dropIndex($keyName, '{{%social_account}}');
            }
        }

    }
}
