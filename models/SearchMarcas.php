<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Marcas;

/**
 * SearchMarcas represents the model behind the search form of `app\models\Marcas`.
 */
class SearchMarcas extends Marcas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'id_produto'], 'safe'],
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
        //$query = Marcas::find()->joinWith('produto');
        $query = Marcas::find();
        $query->joinWith(['produto']);


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

        $query->andFilterWhere(['like', 'marcas.id', $this->id])->andFilterWhere(['like', 'marcas.nome', $this->nome])->andFilterWhere(['like', 'produtos.nome', $this->id_produto]);

        return $dataProvider;
    }
}
