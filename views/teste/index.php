<?php

use app\models\Teste;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchTeste $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Testes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            [
                'attribute' => 'id_produto',
                'value' => 'produto.nome',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Teste $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
