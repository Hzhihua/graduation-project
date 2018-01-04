<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_0_table_user_category
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_0_table_user_category extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user_category}}', [
            'id' => $this->smallInteger()->unsigned(),
            'name' => $this->string(255)->notNull()->comment('人员分类名称(用户/管理员)'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%user_category}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user_category}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
