<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_2_key_menu
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_2_key_menu extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%menu}}', 'id');
        $this->runSuccess['parent'] = $this->createIndex('parent', '{{%menu}}', 'parent', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%menu}}');
            } else {
                $this->dropIndex($keyName, '{{%menu}}');
            }
        }

    }
}
