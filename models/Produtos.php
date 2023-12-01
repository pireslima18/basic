<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string $nome
 * @property int $unidade
 * @property float $valor_unitario
 * @property string $validade
 * @property int $status
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'unidade', 'valor_unitario', 'validade', 'status'], 'required'],
            [['status'], 'integer'],
            [['valor_unitario'], 'number'],
            [['validade'], 'safe'],
            [['nome', 'unidade'], 'string', 'max' => 40, 'min' => 3],
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
            'unidade' => 'Unidade',
            'valor_unitario' => 'Valor Unitario',
            'validade' => 'Validade',
            'status' => 'Status',
        ];
    }
}
