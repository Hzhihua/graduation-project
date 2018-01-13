<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_collection
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_collection extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%collection}}', 'id');
        $this->addAutoIncrement('{{%collection}}', 'id', 'integer');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%collection}}');
            } else {
                $this->dropIndex($keyName, '{{%collection}}');
            }
        }

    }
}
