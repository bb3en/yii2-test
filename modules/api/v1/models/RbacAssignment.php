<?php

namespace app\modules\api\v1\models;

use Yii;
use yii\base\Model;

use app\models\User;

/**
 * This is the model class for table "post".
 *
 * @property int $user_id
 * @property string $item_name
 * @property int $created_at
 */
class RbacAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    public static function findByUserId($id)
    {
        return static::findOne(['user_id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findWithUser()
    {
        $assignment = static::find()
            ->joinWith(['user' => function ($query) {
                $query->select(['id', 'username']);
            }])
            ->asArray()->all();

        $newJson = array();
        foreach ($assignment as $item) {
                if(!empty($item['user']['username'])) {
                    $newJson[] = array(
                        'userId' => $item['user_id'],
                        'role' => $item['item_name'],
                        'userName' => $item['user']['username']
                    );
                }
        }
        return $newJson;
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function isExistAssignment($userId)
    {
        if (static::findOne(['user_id' => $userId]) == null) {
            return false;
        } else {
            return true;
        }
    }
}
