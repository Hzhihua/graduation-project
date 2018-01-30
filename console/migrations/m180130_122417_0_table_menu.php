<?php

use hzhihua\dump\Migration;

/**
 * Class m180130_122417_0_table_menu
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180130_122417_0_table_menu extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%menu}}', [
            'id' => $this->integer(11)->notNull(),
            'name' => $this->string(128)->notNull(),
            'parent' => $this->integer(11)->null(),
            'route' => $this->string(256)->null(),
            'order' => $this->integer(11)->null(),
            'data' => $this->text()->null(),
        ], $this->tableOptions);

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%menu}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%menu}}');
            } else {
                throw new \yii\db\Exception('some errors in:' . __FILE__);
            }
        }
    }
}
