<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_system_config
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_system_config extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%system_config}}', [
            'id' => $this->smallInteger(5)->unsigned()->notNull(),
            'key' => $this->string(255)->notNull()->comment('系统配置名称'),
            'value' => $this->string(255)->notNull()->comment('系统配置值'),
            'user_id' => $this->integer(10)->unsigned()->notNull()->comment('管理员ID'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%system_config}}', '网站系统配置参数表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%system_config}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%system_config}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
