<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_comment
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_comment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%comment}}', 
            ['id', 'entity', 'entityId', 'content', 'parentId', 'level', 'createdBy', 'updatedBy', 'relatedTo', 'url', 'status', 'createdAt', 'updatedAt'],
            [
                [1, 'ed2d4f8a', 1, '123', null, 1, 1, 1, 'User admin commented on the page /article/comment', '/article/comment', 1, 1517729897, 1517729897],
                [2, 'ed2d4f8a', 1, 'eeee', 1, 2, 1, 1, 'User admin commented on the page /article/comment', '/article/comment', 1, 1517729920, 1517729920],
                [3, 'ec414344', 24, '1234', null, 1, 1, 1, 'User root commented on the page /index.php?r=article%2Findex&id=24', '/?r=article&id=24', 1, 1519437648, 1519437648],
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
