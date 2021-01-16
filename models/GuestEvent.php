<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guests_events".
 *
 * @property int $id
 * @property int|null $guests_id
 * @property int|null $events_id
 */
class GuestEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guests_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['events_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guests_id' => 'Guests ID',
            'events_id' => 'Events ID',
        ];
    }

}
