<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_menu
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_menu extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%menu}}', 
            ['id', 'name', 'parent', 'route', 'order', 'data'], 
            [
                ['1', '管理员', null, null, null, '{"icon": "book", "visible": true}'],
                ['2', '角色管理', '1', '/admin/role/index', null, '{"icon": "book", "visible": true}'],
                ['3', '权限管理', '1', '/admin/permission/index', null, null],
                ['4', '菜单管理', '1', '/admin/menu/index', null, null],
                ['5', '分配管理', '1', '/admin/assignment/index', null, null],
                ['6', '路由管理', '1', '/admin/route/index', null, null],
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
