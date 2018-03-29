<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_article_category
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_article_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article_category}}', 
            ['id', 'name', 'description', 'created_by', 'created_at', 'updated_at'],
            [
                [1, 'PHP', 'PHP desc', 1, 1518411884, 1518411884],
                [2, 'Python', 'Python', 1, 1518510725, 1518510725],
                [3, 'Java', 'Java', 1, 1518510829, 1518510829],
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
