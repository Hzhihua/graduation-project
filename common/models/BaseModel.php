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
 * @property $created_at int 创建时间
 * @property $updated_at int 最新修改时间
 * @package common\models
 */
class BaseModel extends ActiveRecord
{
    /**
     * 添加数据前操作
     * @return bool
     */
    public function beforeInsert()
    {
        $time = $_SERVER['REQUEST_TIME'];
        $this->created_at = $time;
        $this->updated_at = $time;

        return true;
    }

    /**
     * 更改数据前操作
     * @return bool
     */
    public function beforeUpdate()
    {
        $time = $_SERVER['REQUEST_TIME'];
        $this->updated_at = $time;

        return true;
    }

    /**
     * @param bool $insert true insert | false update
     * @return bool
     */
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