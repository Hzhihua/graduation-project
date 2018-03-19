<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_article_status
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_article_status extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article_status}}', 
            ['id', 'name', 'child', 'created_by', 'is_default_status', 'is_allow_public', 'created_at', 'updated_at'], 
            [
                ['1', '待审核', '3', '1', '0', '0', '1518316541', '1518339049'],
                ['2', '已审核', '1', '1', '1', '1', '1518317289', '1518340152'],
                ['3', '待编辑', '0', '1', '0', '0', '1518339009', '1518340700'],
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
