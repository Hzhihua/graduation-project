<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_status}}".
 *
 * @property int $id
 * @property string $name 人员状态名称
 * @property int $is_allow_login 是否允许登陆
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class UserStatus extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name', 'is_allow_login', 'created_at', 'updated_at'], 'required'],
            [['is_allow_login', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
                'is_allow_login',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'name',
                'is_allow_login',
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
            'name' => Yii::t('common', 'Name'),
            'is_allow_login' => Yii::t('common', 'Is Allow Login'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }
}
