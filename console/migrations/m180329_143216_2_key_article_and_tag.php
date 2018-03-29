<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_article_and_tag
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_article_and_tag extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%article_and_tag}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%article_and_tag}}', 'id', 'integer', 'unsigned', 86);
        $this->runSuccess['article_id'] = $this->createIndex('article_id', '{{%article_and_tag}}', 'article_id', 0);
        $this->runSuccess['tag_id'] = $this->createIndex('tag_id', '{{%article_and_tag}}', 'tag_id', 0);

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
                $this->dropPrimaryKey(null, '{{%article_and_tag}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%article_and_tag}}');
            }
        }

    }
}
