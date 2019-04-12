<?php

namespace app\modules\api\v1\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property integer $created_at
 * @property integer $updated_at
 */
class RbacItem extends ActiveRecord
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


    public static function findByName($name)
    {
        return static::findOne(['name' => $name]);
    }
}
