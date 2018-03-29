<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_social_account
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_social_account extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%social_account}}', [
            'id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->null(),
            'provider' => $this->string(255)->notNull(),
            'client_id' => $this->string(255)->notNull(),
            'data' => $this->text()->null(),
            'code' => $this->string(32)->null(),
            'created_at' => $this->integer(11)->null(),
            'email' => $this->string(255)->null(),
            'username' => $this->string(255)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%social_account}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%social_account}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
