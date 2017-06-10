<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_morda".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $mordaid
 *
 * @property User $user
 * @property Morda $morda
 */
class UserMorda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_morda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'mordaid'], 'required'],
            [['userid', 'mordaid'], 'integer'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            [['mordaid'], 'exist', 'skipOnError' => true, 'targetClass' => Morda::className(), 'targetAttribute' => ['mordaid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'mordaid' => 'Mordaid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMorda()
    {
        return $this->hasOne(Morda::className(), ['id' => 'mordaid']);
    }
}
