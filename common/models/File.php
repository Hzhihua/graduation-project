<?php
/**
 * @Author: cnzhihua
 * @Date: 2018-05-10 13:49
 * @Github: https://github.com/Hzhihua
 */

namespace common\models;

use Yii;
use hzhihua\actions\Event;

/**
 * This is the model class for table "{{%file}}".
 *
 * @property int $id
 * @property string $new_name 名称
 * @property string $origin_name 原始名称
 * @property string $new_directory 新目录(a/b/c)
 * @property string $extension 拓展名
 * @property string $type MIME type
 * @property int $size 文件大小
 * @property string $file_key 文件key参数
 * @property int $created_at 创建时间
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['new_name', 'origin_name', 'new_directory', 'extension', 'type', 'size', 'file_key'], 'required'],
            [['size', 'created_at'], 'integer'],
            [['new_name', 'origin_name', 'new_directory', 'file_key'], 'string', 'max' => 255],
            [['extension'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 50],
            [['file_key'], 'unique'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            // 添加数据时允许接受的字段
            'insert' => [
                'new_name',
                'origin_name',
                'new_directory',
                'extension',
                'type',
                'size',
                'file_key',
            ],
            // 更新数据时允许接受的字段
            'update' => [
                'new_name',
                'origin_name',
                'new_directory',
                'extension',
                'type',
                'size',
                'file_key',
            ],
        ]);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'updatedAtAttribute' => false,
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('common', 'ID'),
            'new_name' => Yii::t('common', 'New Name'),
            'origin_name' => Yii::t('common', 'Origin Name'),
            'new_directory' => Yii::t('common', 'New Directory'),
            'extension' => Yii::t('common', 'Extension'),
            'type' => Yii::t('common', 'Type'),
            'size' => Yii::t('common', 'Size'),
            'file_key' => Yii::t('common', 'File Key'),
            'created_at' => Yii::t('common', 'Created At'),
        ]);
    }

    /**
     * @param Event $event
     * @throws \Throwable
     */
    public function afterFileUpload(Event $event)
    {
        $this->size = $event->file->size;
        $this->type = $event->file->type;
        $this->extension = $event->file->extension;
        $this->origin_name = $event->file->baseName;
        $this->file_key = $event->sender->fileKey;
        $this->new_name = $event->sender->newName;
        $this->new_directory = $event->sender->newDirectory;
        $event->isValid = static::validate() && static::insert();

        /**
         * @see https://docs.ckeditor.com/ckeditor4/latest/guide/dev_file_upload.html
         */
        $event->sender->setResponseBody([
            'uploaded' => 1,
            'fileName' => $event->file->baseName,
            'url' => sprintf(
                '%s/%s/%s.%s',
                rtrim(Yii::$app->params['baseUrl'], '/'),
                rtrim($event->sender->newDirectory, '/'),
                $event->sender->newName,
                $event->file->extension
            ),
//            'error' => [
//                'message' => ''
//            ]
        ]);
    }
}
