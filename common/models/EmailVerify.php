<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%email_verify}}".
 *
 * @property int $id
 * @property int $user_id 用户/管理员ID
 * @property int $user_category_id 验证人员分类(用户/管理员)
 * @property string $email_verify_auth 邮箱验证码
 * @property int $email_verify_send_time 邮箱验证发送时间
 * @property int $email_verify_expire 邮箱验证有效期
 */
class EmailVerify extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%email_verify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['user_id', 'user_category_id', 'email_verify_auth', 'email_verify_send_time', 'email_verify_expire'], 'required'],
            [['user_id', 'user_category_id', 'email_verify_send_time', 'email_verify_expire'], 'integer'],
            [['email_verify_auth'], 'string', 'max' => 255],
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
                'user_id',
                'user_category_id',
                'email_verify_auth',
                'email_verify_send_time',
                'email_verify_expire',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'user_id',
                'user_category_id',
                'email_verify_auth',
                'email_verify_send_time',
                'email_verify_expire',
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
            'user_id' => Yii::t('common', 'User ID'),
            'user_category_id' => Yii::t('common', 'User Category ID'),
            'email_verify_auth' => Yii::t('common', 'Email Verify Addr'),
            'email_verify_send_time' => Yii::t('common', 'Email Verify Send Time'),
            'email_verify_expire' => Yii::t('common', 'Email Verify Expire'),
        ]);
    }

    /**
     * 与 User 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        // id 是 User 表的 id
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
    
}
