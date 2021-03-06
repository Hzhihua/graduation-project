<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_system_config
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_system_config extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%system_config}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%system_config}}', 'id', 'smallint', 'unsigned', 0);

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
                $this->dropPrimaryKey(null, '{{%system_config}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%system_config}}');
            }
        }

    }
}
