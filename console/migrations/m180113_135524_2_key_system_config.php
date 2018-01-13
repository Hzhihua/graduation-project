<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_system_config
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_system_config extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%system_config}}', 'id');
        $this->addAutoIncrement('{{%system_config}}', 'id', 'smallint');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%system_config}}');
            } else {
                $this->dropIndex($keyName, '{{%system_config}}');
            }
        }

    }
}
