<?php
/**
 * @Author: Hzhihua
 * @Time: 18-1-3 下午11:18
 * @Email: cnzhihua@gmail.com
 */

namespace common\models;

use yii\db\ActiveRecord;

/**
 * 数据库表basemodel
 * 所有的数据库表model继承于此model
 *
 * @package common\models
 */
class BaseModel extends ActiveRecord
{
    /**
     * 创建时间
     * @var int
     */
    public $created_at = 0;
    /**
     * 最新更改时间
     * @var int
     */
    public $updated_at = 0;

    public function beforeInsert()
    {
        $time = $_SERVER['REQUEST_TIME'];
        $this->created_at = $time;
        $this->updated_at = $time;

        return true;
    }

    public function beforeUpdate()
    {
        $time = $_SERVER['REQUEST_TIME'];
        $this->updated_at = $time;

        return true;
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert)
            return $this->beforeInsert();
        else
            return $this->beforeUpdate();

    }
}