<?php

use hzhihua\dump\Migration;

/**
 * Class m180329_143216_1_tableData_auth_item
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m180329_143216_1_tableData_auth_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%auth_item}}', 
            ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'],
            [
                ['/*', 2, null, null, null, 1519780937, 1519780937],
                ['/admin/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/assignment/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/assignment/assign', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/assignment/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/assignment/revoke', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/assignment/view', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/default/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/default/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/create', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/update', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/menu/view', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/assign', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/create', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/remove', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/update', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/permission/view', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/assign', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/create', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/remove', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/update', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/role/view', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/assign', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/create', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/refresh', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/route/remove', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/create', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/update', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/rule/view', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/*', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/activate', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/change-password', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/index', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/login', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/logout', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/request-password-reset', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/reset-password', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/signup', 2, null, null, null, 1519734392, 1519734392],
                ['/admin/user/view', 2, null, null, null, 1519734392, 1519734392],
                ['/article', 2, null, null, null, 1521387655, 1521387655],
                ['/article/*', 2, null, null, null, 1521387642, 1521387642],
                ['/comment/*', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/default/*', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/default/create', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/default/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/default/quick-edit', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/manage/*', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/manage/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/manage/index', 2, null, null, null, 1519734392, 1519734392],
                ['/comment/manage/update', 2, null, null, null, 1519734392, 1519734392],
                ['/user/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/assignments', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/block', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/confirm', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/create', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/index', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/info', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/resend-password', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/switch', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/update', 2, null, null, null, 1519734392, 1519734392],
                ['/user/admin/update-profile', 2, null, null, null, 1519734392, 1519734392],
                ['/user/profile/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/profile/index', 2, null, null, null, 1519734392, 1519734392],
                ['/user/profile/show', 2, null, null, null, 1519734392, 1519734392],
                ['/user/recovery/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/recovery/request', 2, null, null, null, 1519734392, 1519734392],
                ['/user/recovery/reset', 2, null, null, null, 1519734392, 1519734392],
                ['/user/registration/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/registration/confirm', 2, null, null, null, 1519734392, 1519734392],
                ['/user/registration/connect', 2, null, null, null, 1519734392, 1519734392],
                ['/user/registration/register', 2, null, null, null, 1519734392, 1519734392],
                ['/user/registration/resend', 2, null, null, null, 1519734392, 1519734392],
                ['/user/security/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/security/auth', 2, null, null, null, 1519734392, 1519734392],
                ['/user/security/login', 2, null, null, null, 1519734392, 1519734392],
                ['/user/security/logout', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/*', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/account', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/confirm', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/delete', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/disconnect', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/networks', 2, null, null, null, 1519734392, 1519734392],
                ['/user/settings/profile', 2, null, null, null, 1519734392, 1519734392],
                ['admin', 1, '超级管理员', null, null, 1519780910, 1519780910],
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
