<?php

use hzhihua\dump\Migration;

/**
 * Class m180113_135524_0_table_user
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180113_135524_0_table_user extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user}}', [
            'id' => $this->integer(10)->unsigned()->notNull(),
            'username' => $this->string(255)->notNull()->comment('用户名'),
            'auth_key' => $this->string(32)->null()->comment('保持登陆状态密钥'),
            'password' => $this->char(60)->notNull()->comment('用户密码'),
            'password_reset_token' => $this->string(255)->null()->comment('重置密码密钥'),
            'email' => $this->string(255)->notNull()->comment('用户邮箱'),
            'is_email_pass' => $this->smallInteger(3)->unsigned()->notNull()->comment('邮箱是否验证通过'),
            'user_category_id' => $this->smallInteger(3)->unsigned()->notNull()->comment('验证人员分类(用户/管理员)'),
            'user_status_id' => $this->smallInteger(3)->unsigned()->notNull()->comment('人员状态'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('最新更改时间'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%user}}', '用户表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%user}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
