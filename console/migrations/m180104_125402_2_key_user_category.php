<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_2_key_user_category
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_2_key_user_category extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%user_category}}', 'id');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%user_category}}');
            } else {
                $this->dropIndex($keyName, '{{%user_category}}');
            }
        }

    }
}
