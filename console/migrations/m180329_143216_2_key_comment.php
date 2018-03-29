<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_comment
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_comment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%comment}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%comment}}', 'id', 'integer', '', 4);
        $this->runSuccess['idx-Comment-entity'] = $this->createIndex('idx-Comment-entity', '{{%comment}}', 'entity', 0);
        $this->runSuccess['idx-Comment-status'] = $this->createIndex('idx-Comment-status', '{{%comment}}', 'status', 0);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%comment}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%comment}}');
            }
        }

    }
}
