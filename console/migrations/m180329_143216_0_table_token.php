<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_token
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_token extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%token}}', [
            'user_id' => $this->integer(11)->notNull(),
            'code' => $this->string(32)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'type' => $this->smallInteger(6)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%token}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%token}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
