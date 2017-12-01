function validacaoCadastro() {
    $.validity.start();
	
	//Validação do Login
    $("#login")
	.require("O login é obrigatório!")
	.minLength(4, "O login deve ter no mínimo 4 caracteres!")
	.maxLength(16, "O login deve ter no máximo 16 caracteres!")
	.match(/^[a-zA-Z0-9]+$/, "O login deve conter apenas letras e números!");
	
	//Validação da senha
	$("#senha")
	.require("A senha é obrigatória!")
	.minLength(4, "A senha deve ter no mínimo 4 caracteres!")
	.maxLength(16, "A senha deve ter no máximo 16 caracteres!")
	.match(/^[a-zA-Z0-9]+$/, "A senha deve conter apenas letras e números!");
	
	//Validação da resenha
	$("#resenha")
	.assert(comparaSenhaComReSenha, "As senhas não são iguais!");

    var result = $.validity.end();
	
    return result.valid;
}