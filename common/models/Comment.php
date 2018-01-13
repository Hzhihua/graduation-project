<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property string $id
 * @property int $art_id
 * @property int $user_id 评论用户ID
 * @property int $is_top 是否置顶
 * @property string $to_comment_id 对哪一个评论进一步评论
 * @property string $comment 评论内容
 * @property string $status 评论状态
 * @property int $count_up 点赞个数
 * @property int $created_at 创建时间
 * @property int $updated_at 最新更改时间
 */
class Comment extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['art_id', 'user_id', 'is_top', 'to_comment_id', 'comment', 'status', 'count_up', 'created_at', 'updated_at'], 'required'],
            [['art_id', 'user_id', 'is_top', 'to_comment_id', 'status', 'count_up', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
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
                'art_id',
                'user_id',
                'is_top',
                'to_comment_id',
                'comment',
                'count_up',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'art_id',
                'user_id',
                'is_top',
                'to_comment_id',
                'comment',
                'count_up',
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
            'art_id' => Yii::t('common', 'Art ID'),
            'user_id' => Yii::t('common', 'User ID'),
            'is_top' => Yii::t('common', 'Is Top'),
            'to_comment_id' => Yii::t('common', 'To Comment ID'),
            'comment' => Yii::t('common', 'Comment'),
            'count_up' => Yii::t('common', 'Count Up'),
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
     * 与 CommentStatus 表一对一关系
     * @return \yii\db\ActiveQuery
     */
    public function getCommentStatus()
    {
        // id 是 CommentStatus 表的 id
        return $this->hasOne(CommentStatus::className(), ['id' => 'status']);
    }
}
