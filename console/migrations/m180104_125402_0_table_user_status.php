<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_0_table_user_status
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_0_table_user_status extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user_status}}', [
            'id' => $this->smallInteger()->unsigned(),
            'name' => $this->string(255)->notNull()->comment('人员状态名称'),
            'is_allow_login' => $this->smallInteger(3)->unsigned()->notNull()->comment('是否允许登陆'),
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
                $this->dropTable('{{%user_status}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user_status}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
