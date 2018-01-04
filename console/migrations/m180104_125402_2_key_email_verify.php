<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_2_key_email_verify
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_2_key_email_verify extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%email_verify}}', 'id');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%email_verify}}');
            } else {
                $this->dropIndex($keyName, '{{%email_verify}}');
            }
        }

    }
}
