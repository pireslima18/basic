<?php

use app\models\Produtos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;

use app\assets\MeuAsset;

MeuAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\SearchProdutos $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Criar Produto', ['value' => Url::to('index.php?r=produtos/create'), 'class' => 'btn btn-success', 'id' => 'modalCreateProduto']) ?>
    </p>

    <?php
    
        Modal::begin([
            'title' => '<h4>Criar Produto</h4>',
            'id' => 'modalProduto',
            'size' => 'modal-lg',
        ]);

        echo '<div id="modalContentProdutos"></div>';

        Modal::end();
    
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(['id' => 'produtosGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'filter' => Html::activeDropDownList($searchModel, 'status', [1 => 'Ativo', 0 => 'Inativo'], ['class' => 'form-control', 'prompt' => 'Selecione']),
                'value' => function ($model) {
                    return $model->status == 1 ? 'Ativo' : 'Inativo';
                },
                'contentOptions' => function ($model) {
                    return $model->status == 1 ? ['class' => 'text-success'] : ['class' => 'text-danger'];
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Produtos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]);?>
    <?php Pjax::end(); ?>


</div>
