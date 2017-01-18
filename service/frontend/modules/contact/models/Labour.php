<?php

namespace frontend\modules\contact\models;

use Yii;

/**
 * This is the model class for table "labour".
 *
 * @property integer $labour_id
 * @property string $name
 * @property integer $mobile_no
 * @property integer $alternate_no
 * @property string $address
 * @property string $bank_id
 * @property string $type
 *
 * @property LabourAttendence[] $labourAttendences
 * @property LabourCost[] $labourCosts
 */
class Labour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['labour_id', 'name', 'mobile_no', 'alternate_no', 'address', 'bank_id'], 'required'],
            [['labour_id', 'mobile_no', 'alternate_no'], 'integer'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255],
            [['bank_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'labour_id' => 'Labour ID',
            'name' => 'Name',
            'mobile_no' => 'Mobile No',
            'alternate_no' => 'Alternate No',
            'address' => 'Address',
            'bank_id' => 'Bank ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabourAttendences()
    {
        return $this->hasMany(LabourAttendence::className(), ['labour_id' => 'labour_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabourCosts()
    {
        return $this->hasMany(LabourCost::className(), ['labour_id' => 'labour_id']);
    }
}
