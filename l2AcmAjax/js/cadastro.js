//Requisição de Cadastro
$(document).ready(function(){
	$('#cadastro').submit(function(){
		if (validacaoCadastro()) { //Se a validação do cadastro tiver tudo ok, inicia-se a requisição ajax
			var login = $('#login').val();
			var senha = $('#senha').val();
			var resenha = $('#resenha').val();
			var string = '<strong>Cadastro Efetuado com sucesso!</strong><br /><strong>Login: </strong>'+ login +'<br /><strong>Senha: </strong>'+ senha +'<br /><em>Obrigado por se cadastrar em nosso servidor! Tenha um bom jogo!</em>';
			$.ajax({
			url : 'functions/cadastro.php',
			type : 'post',
			data : 'funcao=cadastro&ajax=true&login=' + login + '&senha=' + senha + '&resenha=' + resenha,
			dataType: 'html',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			beforeSend: function(){
				$('#cadastroSubmit').attr('disabled', 'disabled');
				$('#cadastroSubmit').val('Cadastrando..');
			},   
			success: function(resultado){
				if(resultado == '2'){
					$('#msg').ready(function(){
						$('#msg').html(string);
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '1'){
					$('#msg').ready(function(){
						$('#msg').html('Cadastro falhou, a conta j&aacute; existe, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '0'){
					$('#msg').ready(function(){
						$('#msg').html('Cadastro falhou, dados inv&aacute;lidos, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});	
				}
				$('#cadastroSubmit').removeAttr('disabled');
				$('#cadastroSubmit').val('Cadastrar');
				}       
			});
		}
	return false;
	});
});