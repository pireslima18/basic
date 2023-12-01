<?php

use app\models\Marcas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;

use app\assets\MeuAsset;

MeuAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\SearchMarcas $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Criar Marca', ['value' => Url::to('index.php?r=marcas/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
    
        Modal::begin([
            'title' => '<h4>Criar Marca</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo '<div id="modalContent"></div>';

        Modal::end();
    
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(['id' => 'marcasGrid']); ?>
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
                'urlCreator' => function ($action, Marcas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
