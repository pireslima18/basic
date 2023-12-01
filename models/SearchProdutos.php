<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produtos;

/**
 * SearchProdutos represents the model behind the search form of `app\models\Produtos`.
 */
class SearchProdutos extends Produtos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'unidade', 'validade', 'status'], 'safe'],
            [['valor_unitario'], 'number'],
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
        $query = Produtos::find();

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
        $query->andFilterWhere([
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
        ->andFilterWhere(['like', 'nome', $this->nome])
        ->andFilterWhere(['like', 'unidade', $this->unidade])
        ->andFilterWhere(['like', 'valor_unitario', $this->valor_unitario])
        ->andFilterWhere(['like', 'validade', $this->validade])
        ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
