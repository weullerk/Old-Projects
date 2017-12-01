<?php
require_once('configs/config.php');
require_once('functions/estatisticas.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="pt-br" />
<title><?php print SERVER_NAME; ?> - Estatísticas</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script><!-- API GOOGLE -->
</head>
<body>
<h2>Estat&iacute;sticas</h2>
<?php 
// Para escolher o tipo de grafico, coloque o valor entre os parenteses da função:
// Grafico de Pizza: PieChart
// Grafico de Barra: ColumnChart
// Grafico de Linha: LineChart
// Se não passar nenhum valor, por padrão o grafico será de Pizza. Caso passe algum dado inválido, o grafico não será gerado.
estatisticaDeClasse('PieChart');
estatisticaDeGenero('LineChart');
?>
</body>
</html>