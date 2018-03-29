<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_profile
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_profile extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%profile}}', [
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->null(),
            'public_email' => $this->string(255)->null(),
            'gravatar_email' => $this->string(255)->null(),
            'gravatar_id' => $this->string(32)->null(),
            'location' => $this->string(255)->null(),
            'website' => $this->string(255)->null(),
            'bio' => $this->text()->null(),
            'timezone' => $this->string(40)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%profile}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%profile}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
