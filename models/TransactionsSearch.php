<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search form of `app\models\Transactions`.
 */
class TransactionsSearch extends Transactions
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['date_borrow', 'date_returned', 'fines_status', 'item_id', 'customer_id'], 'safe'],
            [['fines'], 'number'],
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
        $query = Transactions::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'item_id' => $this->item_id,
        //     'customer_id' => $this->customer_id,
        //     'date_borrow' => $this->date_borrow,
        //     'date_returned' => $this->date_returned,
        //     'fines' => $this->fines,
        // ]);

        $query->orFilterWhere(['like', 'barcode_number', $this->globalSearch])
        ->orFilterWhere(['like', 'item_id', $this->globalSearch])
        ->orFilterWhere(['like', 'customer_id', $this->globalSearch])
        ->orFilterWhere(['like', 'date_borrow', $this->globalSearch])
        ->orFilterWhere(['like', 'fines', $this->globalSearch]);
        

        return $dataProvider;
    }
}
