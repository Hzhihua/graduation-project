<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_2_key_article_and_category
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_2_key_article_and_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%article_and_category}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%article_and_category}}', 'id', 'integer', 'unsigned', 68);
        $this->runSuccess['article_id'] = $this->createIndex('article_id', '{{%article_and_category}}', 'article_id', 0);
        $this->runSuccess['category_id'] = $this->createIndex('category_id', '{{%article_and_category}}', 'category_id', 0);

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
                $this->dropPrimaryKey(null, '{{%article_and_category}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%article_and_category}}');
            }
        }

    }
}
