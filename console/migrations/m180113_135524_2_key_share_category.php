<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_share_category
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_share_category extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%share_category}}', 'id');
        $this->addAutoIncrement('{{%share_category}}', 'id', 'smallint');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%share_category}}');
            } else {
                $this->dropIndex($keyName, '{{%share_category}}');
            }
        }

    }
}