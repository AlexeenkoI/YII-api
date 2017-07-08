<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moneylog".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $money
 * @property string $type
 * @property string $description
 * @property integer $isdeleted
 * @property string $date
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
            [['userid', 'money', 'description'], 'required'],
            [['userid', 'money', 'isdeleted'], 'integer'],
            [['type'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 30],
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
            'userid' => 'ИД пользователя',
            'money' => 'Деньги',
            'type' => 'Тип',
            'description' => 'Описание',
            'isdeleted' => 'Удален',
            'date' => 'Дата',
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
