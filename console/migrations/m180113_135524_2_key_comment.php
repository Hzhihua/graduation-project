<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_comment
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_comment extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%comment}}', 'id');
        $this->addAutoIncrement('{{%comment}}', 'id', 'bigint');
        $this->runSuccess['art_id'] = $this->createIndex('art_id', '{{%comment}}', 'art_id', 0);
        $this->runSuccess['user_id'] = $this->createIndex('user_id', '{{%comment}}', 'user_id', 0);

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
