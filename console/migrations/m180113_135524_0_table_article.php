<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_article
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_article extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'title' => $this->string(255)->notNull()->comment('文章标题'),
            'description' => $this->string(255)->notNull()->comment('文章简述'),
            'content' => $this->text()->notNull()->comment('文章内容'),
            'is_top' => $this->smallInteger(3)->unsigned()->notNull()->comment('文章是否置顶'),
            'status' => $this->smallInteger(10)->unsigned()->notNull()->comment('文章状态(待审核?已审核?)'),
            'public_time' => $this->integer(10)->unsigned()->notNull()->comment('定时发布时间'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最近修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%article}}', '文章表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%article}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%article}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
