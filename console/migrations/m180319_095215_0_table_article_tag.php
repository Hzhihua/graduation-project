<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_0_table_article_tag
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_0_table_article_tag extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%article_tag}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('标签云名称'),
            'description' => $this->string(255)->notNull()->defaultValue('')->comment('标签云简述'),
            'created_by' => $this->integer(10)->unsigned()->notNull()->comment('由谁创建'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('修改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%article_tag}}', '文章表标签云');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%article_tag}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%article_tag}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
