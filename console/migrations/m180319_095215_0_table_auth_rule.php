<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_0_table_auth_rule
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_0_table_auth_rule extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%auth_rule}}', [
            'name' => $this->string(64)->notNull(),
            'data' => $this->binary()->null(),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null(),
        ], $this->tableOptions);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%auth_rule}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%auth_rule}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
