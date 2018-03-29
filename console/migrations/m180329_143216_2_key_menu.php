<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_menu
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%menu}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%menu}}', 'id', 'integer', '', 7);
        $this->runSuccess['parent'] = $this->createIndex('parent', '{{%menu}}', 'parent', 0);

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
                $this->dropPrimaryKey(null, '{{%menu}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%menu}}');
            }
        }

    }
}
