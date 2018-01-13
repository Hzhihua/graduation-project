<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_share_category
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_share_category extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%share_category}}', [
            'id' => $this->smallInteger(3)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('转发类型名称(QQ/wechat/sina)'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%share_category}}', '储存分享类型(QQ/wechat/sina)表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%share_category}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%share_category}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
