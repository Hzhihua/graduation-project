<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_share
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_share extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%share}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'user_id' => $this->integer(10)->unsigned()->notNull()->comment('转发文章的用户ID'),
            'art_title' => $this->string(255)->notNull()->comment('转发文章的标题'),
            'art_id' => $this->integer(10)->unsigned()->notNull()->comment('转发的文章ID'),
            'category' => $this->smallInteger(3)->unsigned()->notNull()->comment('属于哪种转发类型(QQ/wechat/sina)'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%share}}', '用户转发/分享表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%share}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%share}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
