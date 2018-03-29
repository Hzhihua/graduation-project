<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_article
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_article extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%article}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%article}}', 'id', 'integer', 'unsigned', 32);
        $this->runSuccess['created_by'] = $this->createIndex('created_by', '{{%article}}', 'created_by', 0);

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
                $this->dropPrimaryKey(null, '{{%article}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%article}}');
            }
        }

    }
}
