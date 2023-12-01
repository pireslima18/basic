<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Produtos;

/**
 * This is the model class for table "marcas".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_produto
 *
 * @property Produtos $id_produto
 */
class Marcas extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'id_produto'], 'required'],
            [['nome' , 'id_produto'], 'string', 'max' => 30]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_produto' => 'Produto',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        //return $this->hasOne(Produtos::class, ['nome' => 'id']);
        return $this->hasOne(Produtos::class, ['id' => 'id_produto']);
    }
}
