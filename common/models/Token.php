<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%token}}".
 *
 * @property int $user_id
 * @property string $code
 * @property int $created_at
 * @property int $type
 *
 * @property User $user
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%token}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['user_id', 'code', 'created_at', 'type'], 'required'],
            [['user_id', 'created_at', 'type'], 'integer'],
            [['code'], 'string', 'max' => 32],
            [['user_id', 'code', 'type'], 'unique', 'targetAttribute' => ['user_id', 'code', 'type']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ]);
    }
                    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            // 添加数据时允许接受的字段
            'insert' => [],
            // 更新数据时允许接受的字段
            'update' => [],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'user_id' => Yii::t('common', 'User ID'),
            'code' => Yii::t('common', 'Code'),
            'created_at' => Yii::t('common', 'Created At'),
            'type' => Yii::t('common', 'Type'),
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
