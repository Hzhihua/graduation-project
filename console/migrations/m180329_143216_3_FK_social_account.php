<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_3_FK_social_account
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_3_FK_social_account extends Migration
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
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%social_account}}');
        }

    }
}
