<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $name
 * @property string|null $location
 * @property string|null $date
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['name', 'location'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'date' => 'Date',
        ];
    }

    public function getAttendees() {
        // return $this->hasMany(GuestEvent::className(), ['events_id' => 'id']);

        return $this->hasMany(Guest::className(), ['id' => 'guests_id'])
            ->viaTable(GuestEvent::tableName(), ['events_id' => 'id']);
    }
}
