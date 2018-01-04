<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_0_table_collection
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_0_table_collection extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%collection}}', [
            'id' => $this->integer()->unsigned(),
            'art_title' => $this->string(255)->notNull()->comment('收藏文章的标题'),
            'art_id' => $this->integer(10)->unsigned()->notNull()->comment('收藏文章ID'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%collection}}', '文章收藏表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%collection}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%collection}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
