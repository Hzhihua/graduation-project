<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_article_status
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_article_status extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article_status}}', [
            'id' => $this->smallInteger(6)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('文章状态名称'),
            'child' => $this->smallInteger(3)->unsigned()->notNull()->comment('子状态'),
            'created_by' => $this->integer(10)->unsigned()->notNull()->comment('由谁创建'),
            'is_default_status' => $this->smallInteger(5)->unsigned()->notNull()->defaultValue(0)->comment('是否是默认文章状态'),
            'is_allow_public' => $this->smallInteger(3)->notNull()->comment('此状态的文章是否允许发布'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最近修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%article_status}}', '文章状态表');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%article_status}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%article_status}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
