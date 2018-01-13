<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string $title 文章标题
 * @property string $desription 文章简述
 * @property string $content 文章内容
 * @property int $is_top 文章是否置顶
 * @property int $status 文章状态(待审核?已审核?)
 * @property int $public_time 定时发布时间
 * @property int $created_at 创建时间
 * @property int $updated_at 最近修改时间
 */
class Article extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['title', 'desription', 'content', 'is_top', 'status', 'public_time', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['is_top', 'status', 'public_time', 'created_at', 'updated_at'], 'integer'],
            [['title', 'desription'], 'string', 'max' => 255],
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
                'title',
                'desription',
                'content',
                'is_top',
                'status',
                'public_time',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'title',
                'desription',
                'content',
                'is_top',
                'status',
                'public_time',
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
            'title' => Yii::t('common', 'Title'),
            'desription' => Yii::t('common', 'Desription'),
            'content' => Yii::t('common', 'Content'),
            'is_top' => Yii::t('common', 'Is Top'),
            'status' => Yii::t('common', 'Status'),
            'public_time' => Yii::t('common', 'Public Time'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ]);
    }

    /**
     * 与 ArticleStatus 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getArticleStatus()
    {
        // id 是 ArticleStatus 表的 id
        return $this->hasOne(ArticleStatus::className(), ['id' => 'status']);
    }
}
