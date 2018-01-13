<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%collection}}".
 *
 * @property int $id
 * @property string $art_title 收藏文章的标题
 * @property int $art_id 收藏文章ID
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class Collection extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%collection}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['art_title', 'art_id', 'created_at', 'updated_at'], 'required'],
            [['art_id', 'created_at', 'updated_at'], 'integer'],
            [['art_title'], 'string', 'max' => 255],
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
                'art_title',
                'art_id',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'art_title',
                'art_id',
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
            'art_title' => Yii::t('common', 'Art Title'),
            'art_id' => Yii::t('common', 'Art ID'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }

    /**
     * 与 Article 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        // id 是 Article 表的 id
        return $this->hasOne(Article::className(), ['id' => 'art_id']);
    }
}
