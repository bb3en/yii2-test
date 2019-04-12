<?php

namespace app\modules\api\v1\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class RbacRole extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    public static function find()
    {
        return parent::find()->where(['=', 'type', 1]);
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
