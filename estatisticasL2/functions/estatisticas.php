<?php
header("Content-Type: text/html; charset=UTF-8");
require_once('configs/config.php');
require_once('class/manipulaDB.class.php');

function estatisticaDeClasse($grafico = 'PieChart'){
	$conn = new manipulaDB(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
	
	$query = 'SELECT COUNT(*) AS humano, 
	(SELECT COUNT(*) FROM '. TABLE_CHAR .' c WHERE (SELECT SUBSTRING_INDEX('. COLUMN_CLASS_NAME .', "_", 1) FROM '. TABLE_CLASS .' cl WHERE cl.'. COLUMN_CLASS_ID .' = c.'. COLUMN_CHAR_ID_CLASS .') = "E") AS elf, 
	(SELECT COUNT(*) FROM '. TABLE_CHAR .' c WHERE (SELECT SUBSTRING_INDEX('. COLUMN_CLASS_NAME .', "_", 1) FROM '. TABLE_CLASS .' cl WHERE cl.'. COLUMN_CLASS_ID .' = c.'. COLUMN_CHAR_ID_CLASS .') = "DE") AS delf, 
	(SELECT COUNT(*) FROM '. TABLE_CHAR .' c WHERE (SELECT SUBSTRING_INDEX('. COLUMN_CLASS_NAME .', "_", 1) FROM '. TABLE_CLASS .' cl WHERE cl.'. COLUMN_CLASS_ID .' = c.'. COLUMN_CHAR_ID_CLASS .') = "O") AS orc, 
	(SELECT COUNT(*) FROM '. TABLE_CHAR .' c WHERE (SELECT SUBSTRING_INDEX('. COLUMN_CLASS_NAME .', "_", 1) FROM '. TABLE_CLASS .' cl WHERE cl.'. COLUMN_CLASS_ID .' = c.'. COLUMN_CHAR_ID_CLASS .') = "D") AS dwarft
	FROM '. TABLE_CHAR .' c 
	WHERE (SELECT SUBSTRING_INDEX('. COLUMN_CLASS_NAME .', "_", 1) FROM '. TABLE_CLASS .' cl WHERE cl.'. COLUMN_CLASS_ID .' = c.'. COLUMN_CHAR_ID_CLASS .') = "H"';
	
	$data = $conn->listQr($conn->execSQL($query));
	
	echo '
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(estClass);
		function estClass() {
			var data = new google.visualization.DataTable();
			data.addColumn("string", "Classes");
			data.addColumn("number", "Quantidade");
			data.addRows(5);
			data.setValue(0, 0, "Humano");
			data.setValue(0, 1, ' . $data->humano . ');
			data.setValue(1, 0, "Elf");
			data.setValue(1, 1, ' . $data->elf . ');
			data.setValue(2, 0, "Dark Elf");
			data.setValue(2, 1, ' . $data->delf . ');
			data.setValue(3, 0, "Orc");
			data.setValue(3, 1, ' . $data->orc . ');
			data.setValue(4, 0, "Dwarft");
			data.setValue(4, 1, ' . $data->dwarft . ');

			var chart = new google.visualization.'. $grafico .'(document.getElementById("estClass"));
			chart.draw(data, {width: 450, height: 300, title: "Estatística das Classes"});
		}
	</script>
	<div id="estClass"></div>
	';
	
	$conn->connectClose();
}

function estatisticaDeGenero($grafico = 'PieChart'){
	$conn = new manipulaDB(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
	
	$query = 'SELECT COUNT(*) AS masculino, 
	(SELECT COUNT(*) FROM '. TABLE_CHAR .' c WHERE sex = "1") AS feminino
	FROM '. TABLE_CHAR .' c 
	WHERE sex = "0"';
	
	$data = $conn->listQr($conn->execSQL($query));
	
	echo '
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(estGen);
		function estGen() {
			var data = new google.visualization.DataTable();
			data.addColumn("string", "Sexo");
			data.addColumn("number", "Quantidade");
			data.addRows(2);
			data.setValue(0, 0, "Masculino");
			data.setValue(0, 1, ' . $data->masculino . ');
			data.setValue(1, 0, "Feminino");
			data.setValue(1, 1, ' . $data->feminino . ');

			var chart = new google.visualization.'. $grafico .'(document.getElementById("estGen"));
			chart.draw(data, {width: 450, height: 300, title: "Estatística dos Generos"});
		}
	</script>
	<div id="estGen"></div>
	';
	
	$conn->connectClose();
}
?>