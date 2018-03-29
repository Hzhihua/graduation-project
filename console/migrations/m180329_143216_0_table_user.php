<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user}}', [
            'id' => $this->integer(11)->notNull(),
            'username' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'password_hash' => $this->string(60)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'confirmed_at' => $this->integer(11)->null(),
            'unconfirmed_email' => $this->string(255)->null(),
            'blocked_at' => $this->integer(11)->null(),
            'registration_ip' => $this->string(45)->null(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'flags' => $this->integer(11)->notNull()->defaultValue(0),
            'last_login_at' => $this->integer(11)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%user}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
