<?php

namespace app\modules\payment\models;

use Yii;
use app\modules\contact\models\Labour;


/**
 * This is the model class for table "labour_cost".
 *
 * @property integer $id
 * @property integer $labour_id
 * @property integer $mason_cost
 * @property integer $ot_mason_cost
 * @property integer $worker_cost
 * @property integer $ot_worker_cost
 * @property integer $sqrt_cost
 * @property string $start_date
 * @property string $end_date
 *
 * @property Labour $labour
 */
class LabourCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labour_cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ot_mason_cost', 'worker_cost', 'ot_worker_cost'], 'required'],
            [['id', 'labour_id', 'mason_cost', 'ot_mason_cost', 'worker_cost', 'ot_worker_cost', 'sqrt_cost'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
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
            'mason_cost' => 'Mason Cost',
            'ot_mason_cost' => 'Ot Mason Cost',
            'worker_cost' => 'Worker Cost',
            'ot_worker_cost' => 'Ot Worker Cost',
            'sqrt_cost' => 'Sqrt Cost',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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
