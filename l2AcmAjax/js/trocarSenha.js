//Requisição de Cadastro
$(document).ready(function(){
	$('#trocarSenha').submit(function(){
		if (validacaoTrocarSenha()) { //Se a validação de trocarSenha tiver tudo ok, inicia-se a requisição ajax
			var login = $('#login').val();
			var senhaantiga = $('#senhaantiga').val();
			var senhanova = $('#senhanova').val();
			var resenha = $('#resenha').val();
			var string = '<strong>Troca de senha efetuada com sucesso!!</strong><br /><strong>Login: </strong>'+ login +'<br /><strong>Nova Senha: </strong>'+ senhanova +'<br /><em>Tenha um bom jogo!</em>';
			$.ajax({
			url : 'functions/trocarsenha.php',
			type : 'post',
			data : 'funcao=trocarsenha&ajax=true&login=' + login + '&senhaantiga=' + senhaantiga + '&senhanova=' + senhanova + '&resenha=' + resenha,
			dataType: 'html',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			beforeSend: function(){
				$('#trocarSenhaSubmit').attr('disabled', 'disabled');
				$('#trocarSenhaSubmit').val('Trocando Senha..');
			},   
			success: function(resultado){
				if(resultado == '3'){
					$('#msg').ready(function(){
						$('#msg').html(string);
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '2'){
					$('#msg').ready(function(){
						$('#msg').html('Troca de senha falhou, a senha antiga n&atilde;o confere, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '1'){
					$('#msg').ready(function(){
						$('#msg').html('Troca de senha falhou, login inv&aacute;lido, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});
				}
				if(resultado == '0'){
					$('#msg').ready(function(){
						$('#msg').html('Troca de senha falhou, dados inv&aacute;lidos, tente novamente!');
						$('#msg').animate({
							"opacity": "show"
						},"slow");
					});	
				}
				$('#trocarSenhaSubmit').removeAttr('disabled');
				$('#trocarSenhaSubmit').val('Trocar Senha');
				}       
			});
		}
	return false;
	});
});