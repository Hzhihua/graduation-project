<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%share_category}}".
 *
 * @property int $id
 * @property string $name 转发类型名称(QQ/wechat/sina)
 * @property int $created_at 创建时间
 * @property int $updated_at 最新修改时间
 */
class ShareCategory extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%share_category}}';
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
