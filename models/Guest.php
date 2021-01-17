<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guests".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $number
 * @property string $gender
 * @property int $address
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'firstname', 'lastname', 'email', 'gender'], 'required'],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 120,],
            [['number'], 'number'],
            [['email'], 'email'],
            [['email'],'unique','message'=>'Email already exist. Please try another one.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'number' => 'Number',
            'gender' => 'Gender',
            'address' => 'Address',
            'events_id' => 'Address',
        ];
    }
}
