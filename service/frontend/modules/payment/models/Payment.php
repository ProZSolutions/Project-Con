<?php

namespace app\modules\payment\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $bank_id
 * @property integer $supplier_id
 * @property string $mode
 * @property string $desc
 *
 * @property BankDetails $bank
 * @property Supplier $supplier
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'bank_id', 'supplier_id', 'mode', 'desc'], 'required'],
            [['payment_id', 'bank_id', 'supplier_id'], 'integer'],
            [['mode'], 'string'],
            [['desc'], 'string', 'max' => 255],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankDetails::className(), 'targetAttribute' => ['bank_id' => 'bank_id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'supplier_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'bank_id' => 'Bank ID',
            'supplier_id' => 'Supplier ID',
            'mode' => 'Mode',
            'desc' => 'Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(BankDetails::className(), ['bank_id' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplier_id' => 'supplier_id']);
    }
}
