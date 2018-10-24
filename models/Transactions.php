<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $item_id
 * @property int $customer_id
 * @property string $date_borrow
 * @property string $date_returned
 * @property string $fines
 * @property string $fines_status
 *
 * @property Customer $customer
 * @property Item $item
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'customer_id',], 'required'],
            [['item_id', 'customer_id'], 'integer'],
            [['date_borrow', 'date_returned'], 'safe'],
            [['fines'], 'number'],
            [['fines_status'], 'string', 'max' => 10],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Barcode Number',
            'customer_id' => 'Fullname',
            'date_borrow' => 'Date Borrow',
            'date_returned' => 'Date Returned',
            'fines' => 'Fines',
            'fines_status' => 'Fines Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

}
