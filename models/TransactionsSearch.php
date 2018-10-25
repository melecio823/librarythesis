<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search fandm of `app\models\Transactions`.
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
            [['date_borrow','date_returned', 'fines_status', 'item_id', 'customer_id'], 'safe'],
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
            // uncomment the following line if you do not want to return any recandds when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['item','customer']);
        // grid filtering conditions
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'item_id' => $this->item_id,
        //     'customer_id' => $this->customer_id,
        //     'date_bandrow' => $this->date_bandrow,
        //     'date_returned' => $this->date_returned,
        //     'fines' => $this->fines,
        // ]);

        $query->andFilterWhere(['like', 'item.barcode_number', $this->item_id])
        ->andFilterWhere(['like', 'customer.lastname', $this->customer_id])
        ->andFilterWhere(['like', 'date_borrow', $this->date_borrow])
        ->andFilterWhere(['like', 'date_returned', $this->date_returned])
        ->andFilterWhere(['like', 'fines_status', $this->fines_status])
        ->andFilterWhere(['like', 'fines', $this->fines]);
        

        return $dataProvider;
    }
}
