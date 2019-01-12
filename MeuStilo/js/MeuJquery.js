$(function(){
	$("#pesquisaNome").keyup(function(){
		var pesquisa = $(this).val();
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
		
		$.post('../../php/busca.php' , dados , function(retorna){
			$(".resultado").html(retorna);
		});
	}else{
		$(".resultado").html('');
	}
});
});