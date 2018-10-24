<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'customer_id', 'year', 'phone'], 'integer'],
            [['firstname', 'globalSearch','lastname', 'course', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        // $query->orFilterWhere([
        //     'id' => $this->id,
        //     'customer_id' => $this->customer_id,
        //     'year' => $this->year,
        //     'phone' => $this->phone,
        // ]);

        $query->orFilterWhere(['like', 'firstname', $this->globalSearch])
            ->orFilterWhere(['like', 'lastname', $this->globalSearch])
            ->orFilterWhere(['like', 'course', $this->globalSearch])
            ->orFilterWhere(['like', 'address', $this->globalSearch])
            ->orFilterWhere(['like', 'id', $this->globalSearch])
            ->orFilterWhere(['like', 'customer_id', $this->globalSearch])
            ->orFilterWhere(['like', 'year', $this->globalSearch])
            ->orFilterWhere(['like', 'phone', $this->globalSearch]);

        return $dataProvider;
    }
}
