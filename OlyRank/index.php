<?php
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Olympiad Classic Ranking</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php if (!isset($_GET['funcao']) or $_GET['funcao'] != "rank"){ ?>
<h2 id="titulo">Olympiad Classic Ranking</h2>
<div id="box_classes">
<ul>
<li><a href="index.php?funcao=rank&id=88">Duelist</a></li>
<li><a href="index.php?funcao=rank&id=89">Dreadnought</a></li>
<li><a href="index.php?funcao=rank&id=90">Phoenix Knight</a></li>
<li><a href="index.php?funcao=rank&id=91">Hell Knight</a></li>
<li><a href="index.php?funcao=rank&id=92">Sagittarius</a></li>
<li><a href="index.php?funcao=rank&id=93">Adventurer</a></li>
<li><a href="index.php?funcao=rank&id=94">Archmage</a></li>
<li><a href="index.php?funcao=rank&id=95">Soultaker</a></li>
<li><a href="index.php?funcao=rank&id=96">Arcana Lord</a></li>
<li><a href="index.php?funcao=rank&id=97">Cardinal</a></li>
<li><a href="index.php?funcao=rank&id=98">Hierophant</a></li>
<li><a href="index.php?funcao=rank&id=99">Eva's Templar</a></li>
<li><a href="index.php?funcao=rank&id=100">Sword Muse</a></li>
<li><a href="index.php?funcao=rank&id=101">Wind Rider</a></li>
<li><a href="index.php?funcao=rank&id=102">Moonlight Sentinel</a></li>
<li><a href="index.php?funcao=rank&id=103">Mystic Muse</a></li>
<li><a href="index.php?funcao=rank&id=104">Elemental Master</a></li>
<li><a href="index.php?funcao=rank&id=105">Eva's Saint</a></li>
<li><a href="index.php?funcao=rank&id=106">Shillien Templar</a></li>
<li><a href="index.php?funcao=rank&id=107">Spectral Dancer</a></li>
<li><a href="index.php?funcao=rank&id=108">Ghost Hunter</a></li>
<li><a href="index.php?funcao=rank&id=109">Ghost Sentinel</a></li>
<li><a href="index.php?funcao=rank&id=110">Storm Screamer</a></li>
<li><a href="index.php?funcao=rank&id=111">Spectral Master</a></li>
<li><a href="index.php?funcao=rank&id=112">Shillien Saint</a></li>
<li><a href="index.php?funcao=rank&id=113">Titan</a></li>
<li><a href="index.php?funcao=rank&id=114">Grand Khavatari</a></li>
<li><a href="index.php?funcao=rank&id=115">Dominator</a></li>
<li><a href="index.php?funcao=rank&id=116">Doom Cryer</a></li>
<li><a href="index.php?funcao=rank&id=117">Fortune Seeker</a></li>
<li><a href="index.php?funcao=rank&id=108">Maestro</a></li>
</ul>
<div style="clear:both;"></div>
<br />
<a href="index.php?funcao=rank">Ver Ranking Geral</a>
</div>
<?php } if(isset($_GET['funcao']) AND $_GET['funcao'] == "rank"){ ?>
<h2 id="titulo">Olympiad Classic Ranking</h2>
<div id="box_characters">

<?php 
if(isset($_GET['id'])){
if(is_numeric($_GET['id'])){
	$id = $_GET['id'];
	$sqlClasse = mysql_query("SELECT * FROM class_list WHERE id = '$id'");
	while($linhaClasse = mysql_fetch_array($sqlClasse)){
		$classe = $linhaClasse['class_name'];
	}
	$classe = explode('_',$classe);
?>
<div align="center">Ranking Olympiadas <?php echo $classe[1]; ?></div>
<ul>
<li>#</li><li>Nome</li><?php if($mostrarClan == "1"){ ?><li>Clan</li><?php } ?><?php if($mostrarPontos == "1"){ ?><li>Pontos</li><?php } ?><?php if($mostrarClan == "1"){ ?><li>Vitórias</li><?php } ?>
</ul>
<?php
$i = 1;
$sqlRank = mysql_query("SELECT * FROM olympiad_nobles WHERE class_id = '$id' ORDER BY olympiad_points DESC");
while($linhaRank = mysql_fetch_array($sqlRank)){
	$char = $linhaRank['char_name'];
	$pontos = $linhaRank['olympiad_points'];
	$vitorias = $linhaRank['competitions_done'];
	$sqlClanId = mysql_query("SELECT clanid FROM characters WHERE char_name = '$char'");
while($linhaClanId = mysql_fetch_array($sqlClanId)){
	$clanid = $linhaClanId['clanid'];
}
	$sqlClan = mysql_query("SELECT clan_name FROM clan_data WHERE clan_id = '$clanid'");
while($linhaClan = mysql_fetch_array($sqlClan)){
	$clan = $linhaClan['clan_name'];
}
?>
<ul>
<li><?php echo $i++; ?>&ordm;</li><li><?php echo $char; ?></li><?php if($mostrarClan == "1"){ ?><li><?php if(!isset($clan)){echo "Sem Clan";}else{echo $clan;}?></li><?php } ?><?php if($mostrarPontos == "1"){ ?><li><?php echo $pontos; ?></li><?php } ?><?php if($mostrarClan == "1"){ ?><li><?php echo $vitorias; ?></li><?php } ?>
</ul>
<?php
}
?>
</div>
<br /><center><a href="javascript:history.back();"><strong>Voltar</strong></a></center><br />
<?php
}else{//se id for incorreto, mostrar o erro
	echo "Id incorreta, devera conter apenas numeros";
}//verifica se id é correta
}else{//se id não existir faz o ranking de todas as classes
?>
<div align="center">Ranking Olympiadas Geral</div>
<div id="box_characters_all">
<ul>
<li>#</li><li>Nome</li><li>Classe</li><?php if($mostrarClan == "1"){ ?><li>Clan</li><?php } ?><?php if($mostrarPontos == "1"){ ?><li>Pontos</li><?php } ?><?php if($mostrarClan == "1"){ ?><li>Vitórias</li><?php } ?>
</ul>
<?php
$i = 1;
$sqlRank = mysql_query("SELECT * FROM olympiad_nobles ORDER BY olympiad_points DESC LIMIT $limit_rank_geral");
while($linhaRank = mysql_fetch_array($sqlRank)){
	$char = $linhaRank['char_name'];
	$pontos = $linhaRank['olympiad_points'];
	$vitorias = $linhaRank['competitions_done'];
	$sqlCharDados = mysql_query("SELECT clanid,base_class FROM characters WHERE char_name = '$char'");
while($linhaCharDados = mysql_fetch_array($sqlCharDados)){
	$clanid = $linhaCharDados['clanid'];
	$classid = $linhaCharDados['base_class'];
}
	$sqlClan = mysql_query("SELECT clan_name FROM clan_data WHERE clan_id = '$clanid'");
while($linhaClan = mysql_fetch_array($sqlClan)){
	$clan = $linhaClan['clan_name'];
}
	$sqlClass = mysql_query("SELECT class_name FROM class_list WHERE id = '$classid'");
while($linhaClasse = mysql_fetch_array($sqlClass)){
	$classe = $linhaClasse['class_name'];
}
	$classe = explode('_',$classe);
	$classe = $classe[1];
?>
<ul>
<li><?php echo $i++; ?>&ordm;</li><li><?php echo $char; ?></li><li><?php echo $classe; ?></li><?php if($mostrarClan == "1"){ ?><li><?php if(!isset($clan)){echo "Sem Clan";}else{echo $clan;}?></li><?php } ?><?php if($mostrarPontos == "1"){ ?><li><?php echo $pontos; ?></li><?php } ?><?php if($mostrarClan == "1"){ ?><li><?php echo $vitorias; ?></li><?php } ?>
</ul>
<?php
}
?>
</div>
<br /><center><a href="javascript:history.back();"><strong>Voltar</strong></a></center><br />
<?	
}//verifica se id existe
?>

<?php } ?>
</body>
</html>