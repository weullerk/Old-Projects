function comparaSenhaComReSenha(){
	var senha = $("#senha").val();
	var resenha = $("#resenha").val();
	if(resenha == senha) return true;
}

function comparaSenhaNovaComReSenha(){
	var senhanova = $("#senhanova").val();
	var resenha = $("#resenha").val();
	if(resenha == senhanova) return true;
}

function comparaSenhaComContraSenha(){
	var senha = $("#senha").val();
	var contrasenha = $("#contrasenha").val();
	if(contrasenha != senha) return true;
}