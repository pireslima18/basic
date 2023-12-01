<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marcas $model */

$this->title = 'Atualizar Marca - ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produtosDropdown' => $produtosDropdown,
    ]) ?>

</div>
