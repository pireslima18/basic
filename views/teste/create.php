<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teste $model */

$this->title = 'Create Teste';
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
