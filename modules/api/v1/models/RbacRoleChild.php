<?php

namespace app\modules\api\v1\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "post".
 *
 * @property int $user_id
 * @property string $item_name
 * @property int $created_at
 */
class RbacRoleChild extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

    public static function findByParent($parent)
    {
        return static::findAll(['parent' => $parent]);
    }

    public static function findByBoth($parent, $child)
    {
        return static::findOne(['parent' => $parent,'child' => $child]);
    }

    public static function isExistRoleChild($parent, $child)
    {
        if(static::findOne(['parent' => $parent,'child' => $child])==null) {
            return false;
        } else {
            return true;
        }
    }
}
