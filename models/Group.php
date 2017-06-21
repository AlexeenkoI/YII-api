<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $totemname
 * @property string $totemimage
 * @property string $color
 * @property string $colorhex
 * @property integer $isdeleted
 *
 * @property Grouppriority[] $grouppriorities
 * @property User[] $users
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'totemname', 'totemimage', 'color', 'colorhex'], 'required'],
            [['isdeleted'], 'integer'],
            [['name', 'totemname', 'color', 'colorhex'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['totemimage'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'totemname' => 'Имя тотема',
            'totemimage' => 'Изображение тотема',
            'color' => 'Цвет',
            'colorhex' => 'Colorhex',
            'isdeleted' => 'Удален',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrouppriorities()
    {
        return $this->hasMany(Grouppriority::className(), ['groupid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['groupid' => 'id']);
    }
}
