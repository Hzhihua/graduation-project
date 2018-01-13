<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_category}}".
 *
 * @property int $id
 * @property string $name 人员分类名称(用户/管理员)
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class UserCategory extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
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
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'name',
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
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }
}
