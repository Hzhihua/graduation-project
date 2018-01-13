<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $auth_key 保持登陆状态密钥
 * @property string $password 用户密码
 * @property string $password_reset_token 重置密码密钥
 * @property string $email 用户邮箱
 * @property int $is_email_pass 邮箱是否验证通过
 * @property int $user_category_id 验证人员分类(用户/管理员)
 * @property int $user_status_id 人员状态
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class User extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['username', 'password', 'email', 'is_email_pass', 'user_category_id', 'user_status_id', 'created_at', 'updated_at'], 'required'],
            [['is_email_pass', 'user_category_id', 'user_status_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 60],
            [['username'], 'unique'],
        ]);
    }
                                                                                                                                                    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            // 添加数据时允许接受的字段
            'insert' => [
                'username',
                'auth_key',
                'password',
                'password_reset_token',
                'email',
                'is_email_pass',
                'user_category_id',
                'user_status_id',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'username',
                'auth_key',
                'password',
                'password_reset_token',
                'email',
                'is_email_pass',
                'user_category_id',
                'user_status_id',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('common', 'ID'),
            'username' => Yii::t('common', 'Username'),
            'auth_key' => Yii::t('common', 'Auth Key'),
            'password' => Yii::t('common', 'Password'),
            'password_reset_token' => Yii::t('common', 'Password Reset Token'),
            'email' => Yii::t('common', 'Email'),
            'is_email_pass' => Yii::t('common', 'Is Email Pass'),
            'user_category_id' => Yii::t('common', 'User Category ID'),
            'user_status_id' => Yii::t('common', 'User Status ID'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }

    /**
     * 与 UserCategory 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getUserCategory()
    {
        // id 是 UserCategory 表的 id
        return $this->hasOne(UserCategory::className(), ['id' => 'user_category_id']);
    }

    /**
     * 与 UserStatus 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getUserStatus()
    {
        // id 是 UserStatus 表的 id
        return $this->hasOne(UserStatus::className(), ['id' => 'user_status_id']);
    }
}
