<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */

$this->title = 'Produto' . ' - ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'unidade',
            'valor_unitario',
            [
                'attribute' => 'validade',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->validade, 'dd/MM/yyyy');
                },
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 1 ? 'Ativo' : 'Inativo';
                },
            ],
        ],
    ]) ?>

</div>
