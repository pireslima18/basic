<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Controle de Produtos</h1>

        <p class="lead">Seu aplicativo de gestão de produtos e marcas.</p>

        <p>
            <?= Yii::$app->user->isGuest ?Html::a('Vamos lá', ['login'] , ['class' => 'btn btn-success']) : '' ?>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Controle de Produtos</h2>

                <p>Revolucione completamente o controle dos seus produtos com nossa solução de gerenciamento avançada, proporcionando uma gestão de inventário notavelmente simplificada e dinâmica para elevar ao máximo a eficiência operacional do seu negócio.</p>

                <p class="text-center fs-1"><i class="fas fa-shopping-cart"></i></p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Controle de Marcas</h2>

                <p>Revitalize integralmente o controle de seus produtos e marcas por meio de nossa avançada solução de gerenciamento. Proporcionamos uma gestão de inventário e marcas excepcionalmente simplificada e dinâmica, elevando a eficiência operacional do seu negócio a um novo patamar.</p>

                <p class="text-center fs-1"><i class="fas fa-pen"></i></p>
            </div>
            <div class="col-lg-4">
                <h2>Sistema de Login</h2>

                <p>Exclusivamente para usuários logados em nosso sistema, abrem-se as portas para uma experiência completa e personalizada. Desfrute de todas as funcionalidades disponíveis ao realizar o login. Não perca tempo, comece agora mesmo a explorar e maximizar os benefícios que temos reservados para você!.</p>

                <p class="text-center fs-1"><i class="fas fa-user"></i></p>
            </div>
        </div>

    </div>
</div>
