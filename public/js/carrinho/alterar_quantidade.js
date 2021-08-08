$(function(){

     var container = $('.container');
     var table_carrinho = container.find("#table-carrinho");

     table_carrinho.on('click','.btn-alterar-quantidade' ,function(event){

        event.preventDefault();

        var id = $(this).attr('data-id');
        var linha = $(this).closest('tr');
        var qtd = linha.find('#qtd');

        $.ajax({

            url: "/app/ajax/carrinho/alterar_quantidade.php",
            type: 'POST',
            data: "id="+id+"&qtd="+qtd.val(),
            success: function(data){
                if(data == 'atualizado'){
                    window.location.href = '?p=carrinho';
                }
            }
        })
     });
});