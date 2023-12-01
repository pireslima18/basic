<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Marcas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marcas-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_produto')->dropDownList($produtosDropdown, ['prompt' => 'Selecione um produto']) ?>


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
                    $(document).find('#modal').modal('hide');
                    $(\$form).trigger("reset");
                    $.pjax.reload({container:'#marcasGrid'});
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
