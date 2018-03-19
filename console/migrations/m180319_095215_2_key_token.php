<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_token
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_token extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%token}}', 'user_id,code,type');
        $this->runSuccess['token_unique'] = $this->createIndex('token_unique', '{{%token}}', 'user_id', 1);
        $this->runSuccess['token_unique'] = $this->createIndex('token_unique', '{{%token}}', 'code', 1);
        $this->runSuccess['token_unique'] = $this->createIndex('token_unique', '{{%token}}', 'type', 1);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%token}}');
            } else {
                $this->dropIndex($keyName, '{{%token}}');
            }
        }

    }
}
