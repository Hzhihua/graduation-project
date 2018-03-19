<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_user
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_user extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%user}}', 
            ['id', 'username', 'email', 'password_hash', 'auth_key', 'confirmed_at', 'unconfirmed_email', 'blocked_at', 'registration_ip', 'created_at', 'updated_at', 'flags', 'last_login_at'], 
            [
                ['1', 'root', 'cnzhihua@gmail.com', '$2y$10$956uNFKZ1GFvn4j6b23Z6uhYvvWa8i7PbXtFQAW3LnUv5wzkJv7qm', 'Aw1PIv8B2ngnZe1nVPtDaqLlkQgpbxeO', '1517553971', null, null, '127.0.0.1', '1517553971', '1517729954', '0', '1521384731'],
                ['2', 'zhihua', '1044144905@qq.com', '$2y$10$zIQRM3g2rlvATOflkGu39u49Y28T27EAnlmGfj4EE1Rs1goezbU96', '3GOSk15U-5psReIw2SLfpb7KTEOXrVLF', '1517729992', null, null, '127.0.0.1', '1517729992', '1517729992', '0', '1517730064'],
            ]
        );
        $this->_transaction->commit();

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
