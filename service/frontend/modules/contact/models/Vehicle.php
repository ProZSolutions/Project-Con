<?php

namespace app\modules\contact\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $vehicle_no
 * @property string $owner_name
 * @property integer $owner_no
 * @property string $driver_name
 * @property integer $driver_no
 *
 * @property VehicleCost[] $vehicleCosts
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'vehicle_no', 'owner_name', 'owner_no', 'driver_name', 'driver_no'], 'required'],
            [['owner_no', 'driver_no'], 'integer'],
            [['company_name', 'owner_name', 'driver_name'], 'string', 'max' => 50],
            [['vehicle_no'], 'string', 'max' => 10],
            [['company_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'vehicle_no' => 'Vehicle No',
            'owner_name' => 'Owner Name',
            'owner_no' => 'Owner No',
            'driver_name' => 'Driver Name',
            'driver_no' => 'Driver No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleCosts()
    {
        return $this->hasMany(VehicleCost::className(), ['vehicle_id' => 'id']);
    }
}
