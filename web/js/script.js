$('document').ready(function(){
    //recuperar evento de clique modalMarcas
    $('#modalButton').click(function(){
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'))
    })
    //recuperar evento de clique modalProdutos
    $('#modalCreateProduto').click(function(){
        $('#modalProduto').modal('show').find('#modalContentProdutos').load($(this).attr('value'))
    })

})