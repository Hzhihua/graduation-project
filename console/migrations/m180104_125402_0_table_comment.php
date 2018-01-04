<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_0_table_comment
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_0_table_comment extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%comment}}', [
            'id' => $this->bigInteger()->unsigned(),
            'art_id' => $this->integer(10)->unsigned()->notNull(),
            'user_id' => $this->integer(10)->unsigned()->notNull()->comment('评论用户ID'),
            'is_top' => $this->smallInteger(3)->unsigned()->notNull()->comment('是否置顶'),
            'to_comment_id' => $this->bigInteger(20)->unsigned()->notNull()->comment('对哪一个评论进一步评论'),
            'comment' => $this->string(255)->notNull()->comment('评论内容'),
            'count_up' => $this->integer(10)->unsigned()->notNull()->comment('点赞个数'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%comment}}', '用户评论表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%comment}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%comment}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
