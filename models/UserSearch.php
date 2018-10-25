<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'status', 'role'], 'integer'],
            [['first_name','globalSearch', 'last_name', 'username', 'email', 'password', 'authkey'], 'safe'],
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
        $query = User::find();

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
        //     'status' => $this->status,
        //     'role' => $this->role,
        // ]);

        $query->orFilterWhere(['like', 'first_name', $this->globalSearch])
            ->orFilterWhere(['like', 'last_name', $this->globalSearch])
            ->orFilterWhere(['like', 'username', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch])
            ->orFilterWhere(['like', 'password', $this->globalSearch])
            ->orFilterWhere(['like', 'authkey', $this->globalSearch])
            ->orFilterWhere(['like', 'id', $this->globalSearch])
            ->orFilterWhere(['like', 'status', $this->globalSearch])
            ->orFilterWhere(['like', 'role', $this->globalSearch]);

        return $dataProvider;
    }
}
