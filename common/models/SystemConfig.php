<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%system_config}}".
 *
 * @property int $id
 * @property string $key 系统配置名称
 * @property string $value 系统配置值
 * @property int $user_id 管理员ID
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class SystemConfig extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['key', 'value', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255],
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
                'key',
                'value',
                'user_id',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'key',
                'value',
                'user_id',
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
            'key' => Yii::t('common', 'Key'),
            'value' => Yii::t('common', 'Value'),
            'user_id' => Yii::t('common', 'User ID'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
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
}
