<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $capacity
 * @property integer $isdeleted
 *
 * @property User[] $users
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'capacity'], 'required'],
            [['capacity', 'isdeleted'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'capacity' => 'Capacity',
            'isdeleted' => 'Isdeleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['routeid' => 'id']);
    }
}
