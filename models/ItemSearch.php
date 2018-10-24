<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form of `app\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'barcode_number', 'acc_no', 'call_no', 'c_year', 'no_of_copies'], 'integer'],
            [['title', 'globalSearch','author', 'publisher', 'type', 'status'], 'safe'],
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
        $query = Item::find();

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
        //     'barcode_number' => $this->barcode_number,
        //     'acc_no' => $this->acc_no,
        //     'call_no' => $this->call_no,
        //     'c_year' => $this->c_year,
        //     'no_of_copies' => $this->no_of_copies,
        // ]);

        $query->orFilterWhere(['like', 'title', $this->globalSearch])
            ->orFilterWhere(['like', 'author', $this->globalSearch])
            ->orFilterWhere(['like', 'publisher', $this->globalSearch])
            ->orFilterWhere(['like', 'type', $this->globalSearch])
            ->orFilterWhere(['like', 'status', $this->globalSearch])
            ->orFilterWhere(['like', 'id', $this->globalSearch])
            ->orFilterWhere(['like', 'barcode_number', $this->globalSearch])
            ->orFilterWhere(['like', 'acc_no', $this->globalSearch])
            ->orFilterWhere(['like', 'c_year', $this->globalSearch])
            ->orFilterWhere(['like', 'no_of_copies', $this->globalSearch]);

        return $dataProvider;
    }
}
