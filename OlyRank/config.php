<?php
/*
Script criado por Weuller Krysthian!
Peço que preservem os créditos.
Se tem alguma sugestão para novos scripts, me envie um email: weuller_krysthian@hotmail.com.
Para suporte utilize o fórum em que o conteúdo foi postado.
Script criado em 30/12/2010.
A sabedoria da vida não está em fazer aquilo que se gosta, mas gostar daquilo que se faz. ''Leonardo da Vinci''.
*/

//Configure aqui com os dados do seu servidor.
$ipservidor 			= "127.0.0.1";
$usuario_database 		= "root";
$senha_database			= "";
$mysql_port				= "3306";
$nome_database			= "l2jdb";

//Mostrar clan do personagem, 0 para não, 1 para sim
$mostrarClan			= "1";
//Mostrar pontos ganhos nas compretições, 0 para não, 1 para sim
$mostrarPontos			= "1";
//Mostrar vitorias ganhas, 0 para não, 1 para sim
$mostrarVitorias		= "1";

//O limite de player que serão mostrados no ranking das oly geral (Aconcelho a não utilizar valores muito altos, como 100+, pois o processamento pode ficar lento.)
$limit_rank_geral		= "25";


/********** Não Alterar **********/
$dados = mysql_connect("$ipservidor","$usuario_database","$senha_database");
$db = mysql_select_db("$nome_database",$dados);
?>