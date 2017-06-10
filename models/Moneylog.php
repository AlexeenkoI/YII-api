<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moneylog".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $money
 * @property integer $type
 * @property string $description
 * @property integer $isdeleted
 *
 * @property User $user
 */
class Moneylog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moneylog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'money', 'type', 'description'], 'required'],
            [['userid', 'money', 'type', 'isdeleted'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
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
            'money' => 'Money',
            'type' => 'Type',
            'description' => 'Description',
            'isdeleted' => 'Isdeleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
