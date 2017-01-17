<?php

namespace frontend\modules\attendance\models;

use Yii;

/**
 * This is the model class for table "vehicle_attendance".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $ot_hrs
 * @property integer $vehicle_cost_id
 * @property string $date_time
 *
 * @property Project $project
 */
class VehicleAttendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'ot_hrs', 'vehicle_cost_id'], 'integer'],
            [['date_time'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'ot_hrs' => 'Ot Hrs',
            'vehicle_cost_id' => 'Vehicle Cost ID',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
