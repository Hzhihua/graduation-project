<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_article_tag
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_article_tag extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article_tag}}', 
            ['id', 'name', 'description', 'created_by', 'created_at', 'updated_at'],
            [
                [1, 'PHP', 'PHP', 1, 1518404189, 1518411482],
                [2, 'Yii2', 'Yii2', 1, 1518510883, 1518510883],
                [3, 'ThinkPHP5', 'ThinkPHP5标签云', 1, 1518510906, 1519612471],
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
