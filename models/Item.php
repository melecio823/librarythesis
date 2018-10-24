<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $barcode_number
 * @property string $title
 * @property int $acc_no
 * @property int $call_no
 * @property string $author
 * @property string $publisher
 * @property int $c_year
 * @property string $type
 * @property int $no_of_copies
 * @property string $status
 *
 * @property Transactions[] $transactions
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['barcode_number', 'title', 'acc_no', 'call_no', 'author', 'publisher', 'c_year', 'type', 'no_of_copies', 'status'], 'required'],
            [['acc_no', 'call_no', 'c_year', 'no_of_copies'], 'integer'],
            [['barcode_number', 'title', 'author', 'publisher', 'type', 'status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barcode_number' => 'Barcode Number',
            'title' => 'Title',
            'acc_no' => 'Acc No',
            'call_no' => 'Call No',
            'author' => 'Author',
            'publisher' => 'Publisher',
            'c_year' => 'C Year',
            'type' => 'Type',
            'no_of_copies' => 'No Of Copies',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['item_id' => 'id']);
    }
}
