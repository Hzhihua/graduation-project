<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_3_FK_social_account
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_3_FK_social_account extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'fk_user_account'] = $this->addForeignKey($tablePrefix.'fk_user_account', '{{%social_account}}', 'user_id', '{{%user}}', 'id', 'CASCADE', null);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($tablePrefix.$keyName, '{{%social_account}}');
        }

    }
}
