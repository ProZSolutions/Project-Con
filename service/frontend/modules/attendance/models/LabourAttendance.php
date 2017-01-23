<?php

namespace app\modules\attendance\models;

use Yii;

/**
 * This is the model class for table "labour_attendence".
 *
 * @property integer $id
 * @property integer $labour_id
 * @property integer $no_of_worker
 * @property integer $no_of_mazons
 * @property integer $ot_mazons
 * @property integer $ot_mazon_hrs
 * @property integer $ot_workers
 * @property integer $ot_workers_hrs
 * @property string $date_time
 *
 * @property Labour $labour
 */
class LabourAttendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labour_attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['labour_id', 'no_of_worker', 'no_of_mazons', 'ot_mazons', 'ot_mazon_hrs', 'ot_workers', 'ot_workers_hrs'], 'required'],
            [['labour_id', 'no_of_worker', 'no_of_mazons', 'ot_mazons', 'ot_mazon_hrs', 'ot_workers', 'ot_workers_hrs'], 'integer'],
            [['date_time'], 'safe'],
            [['labour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Labour::className(), 'targetAttribute' => ['labour_id' => 'labour_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'labour_id' => 'Labour ID',
            'no_of_worker' => 'No Of Worker',
            'no_of_mazons' => 'No Of Mazons',
            'ot_mazons' => 'Ot Mazons',
            'ot_mazon_hrs' => 'Ot Mazon Hrs',
            'ot_workers' => 'Ot Workers',
            'ot_workers_hrs' => 'Ot Workers Hrs',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabour()
    {
        return $this->hasOne(Labour::className(), ['labour_id' => 'labour_id']);
    }
}
