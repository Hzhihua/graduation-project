<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_profile
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_profile extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%profile}}', 
            ['user_id', 'name', 'public_email', 'gravatar_email', 'gravatar_id', 'location', 'website', 'bio', 'timezone'], 
            [
                ['1', null, null, null, null, null, null, null, null],
                ['2', null, null, null, null, null, null, null, null],
            ]
        );
        $this->_transaction->commit();

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
