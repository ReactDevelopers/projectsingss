<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $name
 * @property string $email
 * @property string $city
 * @property string $country
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'city', 'country'], 'required'],
            [['name', 'city', 'country'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'name' => 'Name',
            'email' => 'Email',
            'city' => 'City',
            'country' => 'Country',
        ];
    }
}
