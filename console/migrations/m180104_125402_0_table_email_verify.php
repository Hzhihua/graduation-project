<?php

use hzhihua\dump\Migration;

/**
 * Class m180104_125402_0_table_email_verify
 * @property yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180104_125402_0_table_email_verify extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%email_verify}}', [
            'id' => $this->integer()->unsigned(),
            'user_id' => $this->integer(10)->unsigned()->notNull()->comment('用户/管理员ID'),
            'user_category_id' => $this->smallInteger(3)->unsigned()->notNull()->comment('验证人员分类(用户/管理员)'),
            'email_verify_addr' => $this->string(255)->notNull()->comment('邮箱验证地址'),
            'email_verify_send_time' => $this->integer(10)->unsigned()->notNull()->comment('邮箱验证发送时间'),
            'email_verify_expire' => $this->integer(10)->unsigned()->notNull()->comment('邮箱验证有效期'),
        ], $this->tableOptions);

        $this->runSuccess['addTableComment'] = $this->addCommentOnTable('{{%email_verify}}', '邮箱验证记录表');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%email_verify}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%email_verify}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
