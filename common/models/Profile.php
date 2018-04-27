<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property int $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $timezone
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['timezone'], 'string', 'max' => 40],
            [['user_id'], 'unique'],
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
                'name',
                'public_email',
                'gravatar_email',
                'gravatar_id',
                'location',
                'website',
                'bio',
                'timezone',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'name',
                'public_email',
                'gravatar_email',
                'gravatar_id',
                'location',
                'website',
                'bio',
                'timezone',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'user_id' => Yii::t('common', 'User ID'),
            'name' => Yii::t('common', 'Name'),
            'public_email' => Yii::t('common', 'Public Email'),
            'gravatar_email' => Yii::t('common', 'Gravatar Email'),
            'gravatar_id' => Yii::t('common', 'Gravatar ID'),
            'location' => Yii::t('common', 'Location'),
            'website' => Yii::t('common', 'Website'),
            'bio' => Yii::t('common', 'Bio'),
            'timezone' => Yii::t('common', 'Timezone'),
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
