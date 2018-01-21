<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_share
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_share extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%share}}', 'id');
        $this->addAutoIncrement('{{%share}}', 'id', 'integer');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%share}}');
            } else {
                $this->dropIndex($keyName, '{{%share}}');
            }
        }

    }
}