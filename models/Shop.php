<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $pic
 * @property integer $price
 * @property integer $isdeleted
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'pic', 'price'], 'required'],
            [['price', 'isdeleted'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description', 'pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'pic' => 'урл Картинки',
            'price' => 'Цена',
            'isdeleted' => 'Удален',
        ];
    }
}
