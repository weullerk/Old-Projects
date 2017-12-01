//Requisição de Cadastro
$(document).ready(function(){
	$('#destravarChar').submit(function(){
		if (validacaoDestravarChar()) { //Se a validação de destravarChar tiver tudo ok, inicia-se a requisição ajax
			var login = $('#login').val();
			var senha = $('#senha').val();
			var resenha = $('#resenha').val();
			var charr = $('#char').val();
			var string = '<strong>'+ charr +' - Destravado com sucesso!</strong><br /><em>Tenha um bom jogo!</em>';
			$.ajax({
			url : 'functions/destravarchar.php',
			type : 'post',
			data : 'funcao=destravarchar&ajax=true&login=' + login + '&senha=' + senha + '&resenha=' + resenha + '&char=' + charr,
			dataType: 'html',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			beforeSend: function(){
				$('#destravarCharSubmit').attr('disabled', 'disabled');
				$('#destravarCharSubmit').val('Destravando Char..');
			},   
			success: function(resultado){
				if(resultado == '4'){
					$('#msg').ready(function(){
						$('#msg').html(string);
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '3'){
					$('#msg').ready(function(){
						$('#msg').html('Falha ao destravar char, o char n&atilde;o existe, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '2'){
					$('#msg').ready(function(){
						$('#msg').html('Falha ao destravar char, senha inv&aacute;lida, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '1'){
					$('#msg').ready(function(){
						$('#msg').html('Falha ao destravar char, login inv&aacute;lido, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '0'){
					$('#msg').ready(function(){
						$('#msg').html('Falha ao destravar char, dados inv&aacute;lidos, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});	
				}
				$('#destravarCharSubmit').removeAttr('disabled');
				$('#destravarCharSubmit').val('Destravar Char');
				}       
			});
		}
	return false;
	});
});