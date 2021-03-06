<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_article_category
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_article_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article_category}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('文章分类名称'),
            'description' => $this->string(255)->notNull()->comment('文章分类简述'),
            'created_by' => $this->integer(10)->unsigned()->notNull()->comment('由谁创建'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%article_category}}', '文章分类表');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%article_category}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%article_category}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
