<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_2_key_article
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_2_key_article extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%article}}', 'id');
        $this->addAutoIncrement('{{%article}}', 'id', 'integer');

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
