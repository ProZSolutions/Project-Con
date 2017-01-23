<?php

namespace app\modules\payment\models;

use Yii;

/**
 * This is the model class for table "bank_details".
 *
 * @property integer $bank_id
 * @property string $bank_name
 * @property string $ifsc_code
 * @property string $is_active
 *
 * @property Payment[] $payments
 */
class BankDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_name', 'ifsc_code', 'is_active'], 'required'],
            [['bank_id'], 'integer'],
            [['is_active'], 'string'],
            [['bank_name'], 'string', 'max' => 50],
            [['ifsc_code'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => 'Bank ID',
            'bank_name' => 'Bank Name',
            'ifsc_code' => 'Ifsc Code',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['bank_id' => 'bank_id']);
    }
}
