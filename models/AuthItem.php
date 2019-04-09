<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "post".
 *
 * @property int $user_id
 * @property string $item_name
 * @property int $created_at
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }


    public static function findById($id)
    {
        return static::findOne(['name' => $id]);
    }
}
