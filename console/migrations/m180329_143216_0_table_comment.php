<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_0_table_comment
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_0_table_comment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%comment}}', [
            'id' => $this->integer(11)->notNull(),
            'entity' => $this->char(10)->notNull(),
            'entityId' => $this->integer(11)->notNull(),
            'content' => $this->text()->notNull(),
            'parentId' => $this->integer(11)->null(),
            'level' => $this->smallInteger(6)->notNull()->defaultValue(1),
            'createdBy' => $this->integer(11)->notNull(),
            'updatedBy' => $this->integer(11)->notNull(),
            'relatedTo' => $this->string(500)->notNull(),
            'url' => $this->text()->null(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11)->notNull(),
            'updatedAt' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%comment}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%comment}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
