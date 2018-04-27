<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%social_account}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $client_id
 * @property string $data
 * @property string $code
 * @property int $created_at
 * @property string $email
 * @property string $username
 *
 * @property User $user
 */
class SocialAccount extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['user_id', 'created_at'], 'integer'],
            [['provider', 'client_id'], 'required'],
            [['data'], 'string'],
            [['provider', 'client_id', 'email', 'username'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
            [['provider', 'client_id'], 'unique', 'targetAttribute' => ['provider', 'client_id']],
            [['code'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
                'provider',
                'client_id',
                'data',
                'code',
                'email',
                'username',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'user_id',
                'provider',
                'client_id',
                'data',
                'code',
                'email',
                'username',
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
            'provider' => Yii::t('common', 'Provider'),
            'client_id' => Yii::t('common', 'Client ID'),
            'data' => Yii::t('common', 'Data'),
            'code' => Yii::t('common', 'Code'),
            'created_at' => Yii::t('common', 'Created At'),
            'email' => Yii::t('common', 'Email'),
            'username' => Yii::t('common', 'Username'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
