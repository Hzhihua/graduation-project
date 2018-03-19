<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_2_key_article_tag
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_2_key_article_tag extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->addPrimaryKey(null, '{{%article_tag}}', 'id');
        $this->addAutoIncrement('{{%article_tag}}', 'id', 'integer');

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('PRIMARY' === $keyName) {
                $this->dropPrimaryKey(null, '{{%article_tag}}');
            } else {
                $this->dropIndex($keyName, '{{%article_tag}}');
            }
        }

    }
}
