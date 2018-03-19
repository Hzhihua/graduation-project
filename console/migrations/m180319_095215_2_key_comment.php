<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_comment
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_comment extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%comment}}', 'id');
        $this->addAutoIncrement('{{%comment}}', 'id', 'integer');
        $this->runSuccess['idx-Comment-entity'] = $this->createIndex('idx-Comment-entity', '{{%comment}}', 'entity', 0);
        $this->runSuccess['idx-Comment-status'] = $this->createIndex('idx-Comment-status', '{{%comment}}', 'status', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%comment}}');
            } else {
                $this->dropIndex($keyName, '{{%comment}}');
            }
        }

    }
}
