<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_article_and_tag
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_article_and_tag extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%article_and_tag}}', 'id');
        $this->addAutoIncrement('{{%article_and_tag}}', 'id', 'integer');
        $this->runSuccess['article_id'] = $this->createIndex('article_id', '{{%article_and_tag}}', 'article_id', 0);
        $this->runSuccess['tag_id'] = $this->createIndex('tag_id', '{{%article_and_tag}}', 'tag_id', 0);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%article_and_tag}}');
            } else {
                $this->dropIndex($keyName, '{{%article_and_tag}}');
            }
        }

    }
}
