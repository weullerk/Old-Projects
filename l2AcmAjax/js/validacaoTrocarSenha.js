function validacaoTrocarSenha() {
    $.validity.start();
	
	//Validação do Login
    $("#login")
	.require("O login é obrigatório!")
	.minLength(4, "O login deve ter no mínimo 4 caracteres!")
	.maxLength(16, "O login deve ter no máximo 16 caracteres!")
	.match(/^[a-zA-Z0-9]+$/, "O login deve conter apenas letras e números!");
	
	//Validação da Senha Antiga
	$("#senhaantiga")
	.require("A senha antiga é obrigatória!")
	.minLength(4, "A senha antiga deve ter no mínimo 4 caracteres!")
	.maxLength(16, "A senha antiga deve ter no máximo 16 caracteres!")
	.match(/^[a-zA-Z0-9]+$/, "A senha antiga deve conter apenas letras e números!");
	
	//Validação da Senha Antiga
	$("#senhanova")
	.require("A senha nova é obrigatória")
	.minLength(4, "A senha nova deve ter no mínimo 4 caracteres!")
	.maxLength(16, "A senha nova deve ter no máximo 16 caracteres!")
	.match(/^[a-zA-Z0-9]+$/, "A senha nova deve conter apenas letras e números!");
	
	//Validação da resenha
	$("#resenha")
	.assert(comparaSenhaNovaComReSenha, "As senhas não são iguais!");

    var result = $.validity.end();
	
    return result.valid;
}