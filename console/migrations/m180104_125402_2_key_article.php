<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_2_key_article
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_2_key_article extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%article}}', 'id');

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
