<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcas".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_produto
 *
 * @property Produtos $produto
 */
class Teste extends \yii\db\ActiveRecord
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
            [['nome', 'id_produto'], 'string', 'max' => 30],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::class, 'targetAttribute' => ['id_produto' => 'id']],
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
            'id_produto' => 'Id Produto',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'id_produto']);
    }
}
