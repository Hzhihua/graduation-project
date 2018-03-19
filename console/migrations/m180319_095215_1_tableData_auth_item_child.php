<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_auth_item_child
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_auth_item_child extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%auth_item_child}}', 
            ['parent', 'child'], 
            [
                ['admin', '/*'],
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
