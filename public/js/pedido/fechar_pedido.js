$(function(){

    var container = $('.container');
    var modal = container.find('#modal1');

    modal.on('click', '.btn-fechar-pedido' ,function(){

        $.ajax({
        	url: "app/ajax/pedido/fechar_pedido.php",
        	type: "POST",
        	beforeSend: function(){
        		Materialize.toast('Aguarde, estamos fechando seu pedido', 2000);
        	},
        	success: function(data){
                // console.log(data);
        		modal.closeModal();

        		Materialize.toast("Fechando o pedido, aguarde....");

        		setTimeout(function(){
        			window.location.href = data;
        		}, 4000);

        	}
        });
    });
});
