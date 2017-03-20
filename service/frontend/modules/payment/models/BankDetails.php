<?php

namespace app\modules\payment\models;

use Yii;

/**
 * This is the model class for table "bank_details".
 *
 * @property integer $bank_id
 * @property integer $account_no
 * @property string $account_name
 * @property string $account_type
 * @property string $bank_name
 * @property string $ifsc_code
 * @property string $branch
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
            [['account_no', 'account_name', 'account_type', 'bank_name', 'ifsc_code', 'branch'], 'required'],
            [['bank_id', 'account_no'], 'integer'],
            [['is_active'], 'string'],
            [['account_name', 'branch'], 'string', 'max' => 25],
            [['account_type'], 'string', 'max' => 20],
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
            'account_no' => 'Account No',
            'account_name' => 'Account Name',
            'account_type' => 'Account Type',
            'bank_name' => 'Bank Name',
            'ifsc_code' => 'Ifsc Code',
            'branch' => 'Branch',
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
