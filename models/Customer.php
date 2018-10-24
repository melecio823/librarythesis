<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $course
 * @property int $year
 * @property int $phone
 * @property string $address
 *
 * @property Transactions[] $transactions
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'year', 'phone'], 'integer'],
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname', 'address'], 'string', 'max' => 191],
            [['course'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'course' => 'Course',
            'year' => 'Year',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['customer_id' => 'id']);
    }
    public function getFullName(){
        return $this->lastname.",".$this->firstname;    
    }
}
