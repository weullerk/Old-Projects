<?php
/*
Script criado por Weuller Krysthian!
Pe�o que preservem os cr�ditos.
Se tem alguma sugest�o para novos scripts, me envie um email: weuller_krysthian@hotmail.com.
Para suporte utilize o f�rum em que o conte�do foi postado.
Script criado em 30/12/2010.
A sabedoria da vida n�o est� em fazer aquilo que se gosta, mas gostar daquilo que se faz. ''Leonardo da Vinci''.
*/

//Configure aqui com os dados do seu servidor.
$ipservidor 			= "127.0.0.1";
$usuario_database 		= "root";
$senha_database			= "";
$mysql_port				= "3306";
$nome_database			= "l2jdb";

//Mostrar clan do personagem, 0 para n�o, 1 para sim
$mostrarClan			= "1";
//Mostrar pontos ganhos nas compreti��es, 0 para n�o, 1 para sim
$mostrarPontos			= "1";
//Mostrar vitorias ganhas, 0 para n�o, 1 para sim
$mostrarVitorias		= "1";

//O limite de player que ser�o mostrados no ranking das oly geral (Aconcelho a n�o utilizar valores muito altos, como 100+, pois o processamento pode ficar lento.)
$limit_rank_geral		= "25";


/********** N�o Alterar **********/
$dados = mysql_connect("$ipservidor","$usuario_database","$senha_database");
$db = mysql_select_db("$nome_database",$dados);
?>