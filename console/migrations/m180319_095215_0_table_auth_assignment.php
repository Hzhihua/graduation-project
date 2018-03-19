<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_0_table_auth_assignment
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_0_table_auth_assignment extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(11)->null(),
        ], $this->tableOptions);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%auth_assignment}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%auth_assignment}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
