<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_article_and_category
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_article_and_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article_and_category}}', 
            ['id', 'article_id', 'category_id', 'created_at'],
            [
                [28, 27, 1, 1519103287],
                [37, 30, 2, 1519200127],
                [38, 30, 1, 1519200127],
                [41, 31, 1, 1519201710],
                [42, 31, 2, 1519201710],
                [46, 25, 1, 1519216547],
                [47, 25, 2, 1519216547],
                [48, 25, 3, 1519216547],
                [60, 24, 1, 1519443020],
                [61, 24, 3, 1519443020],
                [62, 26, 2, 1519452274],
                [67, 28, 2, 1519640470],
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
