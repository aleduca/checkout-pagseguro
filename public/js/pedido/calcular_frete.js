$(function(){

    var container = $('.container');
    var modal = container.find('#modal1');
    var modal_content = modal.find('.modal-content');
    var modal_footer = modal.find('.modal-footer');
    var btn_calcular_frete = container.find('.btn-calcular-frete');

    btn_calcular_frete.on('click', function(){

        modal.openModal();

        $.ajax({
            url: 'app/ajax/pedido/calcular_frete.php',
            dataType: 'json',
            success: function(data){

                numeral.language('pt-br');

                var dadosFrete = '<h2>Cálculo do frete</h2>';
                dadosFrete += "<p class='flow-text'>O valor do frete é de "+numeral(data.valor).format('$ 0,0.00')+"</p>";
                dadosFrete += "<p class='flow-text'>O valor do seu pedido é de "+numeral(data.pedido).format('$ 0,0.00')+"</p>";
                dadosFrete += "<p class='flow-text'>O valor do seu pedido com o ftete é de "+(numeral(data.pedido + data.valor).format('$ 0,0.00'))+"</p>";
                dadosFrete += "<p class='flow-text'><a href='#' class='waves-effect green darken-3 btn btn-fechar-pedido'>Fechar o Pedido</a></p>";

                modalFooter = '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>';

                 modal_content.html(dadosFrete);
                 modal_footer.html(modalFooter);
            },error: function (request, status, error) {
                console.log(request.responseText);
            }
        });
    });

    modal.on('click', '.modal-close', function(){
        modal.closeModal();
    });

});