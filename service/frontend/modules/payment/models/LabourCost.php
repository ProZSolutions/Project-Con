<?php
namespace app\modules\payment\models;
use Yii;

/**
 * This is the model class for table "labour_cost".
 *
 * @property integer $id
 * @property integer $labour_id
 * @property integer $cost
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
            [['id'], 'required'],
            [['id', 'labour_id', 'cost'], 'integer'],
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
            'cost' => 'Cost',
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
