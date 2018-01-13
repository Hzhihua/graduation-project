<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%share}}".
 *
 * @property int $id
 * @property int $user_id 转发文章的用户ID
 * @property string $art_title 转发文章的标题
 * @property int $art_id 转发的文章ID
 * @property int $category 属于哪种转发类型(QQ/wechat/sina)
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class Share extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%share}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['user_id', 'art_title', 'art_id', 'category', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'art_id', 'category', 'created_at', 'updated_at'], 'integer'],
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
                'user_id',
                'art_title',
                'art_id',
                'category',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'user_id',
                'art_title',
                'art_id',
                'category',
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
            'art_title' => Yii::t('common', 'Art Title'),
            'art_id' => Yii::t('common', 'Art ID'),
            'category' => Yii::t('common', 'Category'),
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

    /**
     * 与 Article 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        // id 是 Article 表的 id
        return $this->hasOne(Article::className(), ['id' => 'art_id']);
    }

    /**
     * 与 ShareCategory 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getShareCategory()
    {
        // id 是 ShareCategory 表的 id
        return $this->hasOne(ShareCategory::className(), ['id' => 'category']);
    }
}
