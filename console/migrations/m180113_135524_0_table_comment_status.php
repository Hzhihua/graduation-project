<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_comment_status
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_comment_status extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%comment_status}}', [
            'id' => $this->smallInteger(3)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('评论状态'),
            'sort' => $this->smallInteger(3)->unsigned()->notNull()->comment('评论状态排序'),
            'is_allow_public' => $this->smallInteger(3)->unsigned()->notNull()->comment('评论是否允许显示'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最近修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%comment_status}}', ' 用户评论状态表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%comment_status}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%comment_status}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
