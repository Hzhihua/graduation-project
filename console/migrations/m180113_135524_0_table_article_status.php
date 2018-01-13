<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_article_status
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_article_status extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article_status}}', [
            'id' => $this->smallInteger(10)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('文章状态名称'),
            'sort' => $this->smallInteger(3)->unsigned()->notNull()->comment('文章状态排序'),
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
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
