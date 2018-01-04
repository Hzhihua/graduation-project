<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_2_key_comment_status
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_2_key_comment_status extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%comment_status}}', 'id');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%comment_status}}');
            } else {
                $this->dropIndex($keyName, '{{%comment_status}}');
            }
        }

    }
}
