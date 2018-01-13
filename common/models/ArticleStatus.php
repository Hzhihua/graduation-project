<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article_status}}".
 *
 * @property int $id
 * @property string $name 文章状态名称
 * @property int $sort 文章状态排序
 * @property int $is_allow_public 此状态的文章是否允许发布
 * @property int $created_at 创建时间
 * @property int $updated_at 最近修改时间
 */
class ArticleStatus extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name', 'sort', 'is_allow_public', 'created_at', 'updated_at'], 'required'],
            [['sort', 'is_allow_public', 'created_at', 'updated_at'], 'integer'],
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
                'sort',
                'is_allow_public',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'name',
                'sort',
                'is_allow_public',
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
            'sort' => Yii::t('common', 'Sort'),
            'is_allow_public' => Yii::t('common', 'Is Allow Public'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }
}
