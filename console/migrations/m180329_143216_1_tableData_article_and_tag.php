<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_article_and_tag
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_article_and_tag extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article_and_tag}}', 
            ['id', 'article_id', 'tag_id', 'created_at'],
            [
                [34, 27, 1, 1519103287],
                [43, 30, 1, 1519200127],
                [44, 30, 2, 1519200127],
                [45, 30, 3, 1519200127],
                [48, 31, 1, 1519201710],
                [49, 31, 2, 1519201710],
                [50, 31, 3, 1519201710],
                [56, 25, 1, 1519216547],
                [77, 24, 1, 1519443020],
                [78, 24, 3, 1519443020],
                [79, 26, 1, 1519452274],
                [84, 28, 2, 1519640470],
                [85, 28, 3, 1519640470],
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
