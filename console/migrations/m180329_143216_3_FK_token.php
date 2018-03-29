<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_3_FK_token
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_3_FK_token extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'fk_user_token'] = $this->addForeignKey($tablePrefix.'fk_user_token', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', null);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%token}}');
        }

    }
}
