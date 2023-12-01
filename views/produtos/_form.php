<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\Produtos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unidade')->dropDownList(['Unidade' => 'Unidade', 'Caixa' => 'Caixa', 'Ampola' => 'Ampola', 'Miligrama' => 'Miligrama'],['prompt' => 'Selecione a Unidade']) ?>

    <?= $form->field($model, 'valor_unitario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validade')->widget(DatePicker::className(), [
        'language' => 'pt', 
        'dateFormat' => 'yyyy/MM/dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            // outras opções de configuração do DatePicker
        ],])
    ?>

    <?= $form->field($model, 'status')->checkbox(['label' => 'Ativo']) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $script = <<< JS
    $('form#{$model->formName()}').on('beforeSubmit', function(e){
        var \$form = $(this);

        // Prevenir o comportamento padrão de envio do formulário
        e.preventDefault();

        $.ajax({
            url: \$form.attr("action"),
            type: \$form.attr("method"),
            data: \$form.serialize(),
            success: function(result) {
                console.log(result);
                if(result.status == 'success'){
                    $(document).find('#modalProduto').modal('hide');
                    $(\$form).trigger("reset");
                    $.pjax.reload({container:'#produtosGrid'});
                } else {
                    $("#message").html(result.message);
                }
            },
            error: function() {
                console.log('Erro ao enviar o formulário.');
            }
        });
        
        return false;
    });

    JS;

    $this->registerJs($script);

?>
