<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_article_and_tag
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_article_and_tag extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article_and_tag}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'article_id' => $this->integer(10)->unsigned()->notNull()->comment('文章ID'),
            'tag_id' => $this->integer(10)->unsigned()->notNull()->comment('标签ID'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%article_and_tag}}', '文章与标签云表');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%article_and_tag}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%article_and_tag}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
