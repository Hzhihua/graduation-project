<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_article
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_article extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%article}}', 'id');
        $this->addAutoIncrement('{{%article}}', 'id', 'integer');
        $this->runSuccess['created_by'] = $this->createIndex('created_by', '{{%article}}', 'created_by', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%article}}');
            } else {
                $this->dropIndex($keyName, '{{%article}}');
            }
        }

    }
}
