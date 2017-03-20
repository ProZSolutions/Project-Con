<?php

namespace app\modules\payment\models;

use Yii;

/**
 * This is the model class for table "vehicle_cost".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property integer $cost
 * @property string $start_date
 * @property string $end_date
 *
 * @property Vehicle $vehicle
 */
class VehicleCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'vehicle_id', 'cost'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle ID',
            'cost' => 'Cost',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
}
