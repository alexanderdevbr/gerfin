<?
session_start();

ini_set("ibase.dateformat", "%d/%m/%Y");

# Cabecalhos
include("parametros.php");
include("funcoes.php");
include("variaveis.php");

# Conectando a Base de Dados
include("conectar.php");

$sql = $_POST["sql"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>:: Resultado SQL</title>
</head>

<body>
	<?
		echo "<!-- $sql -->";
	?>
	<table bgcolor="#666666" cellpadding="1" cellspacing="1">
		<tr>
		<?
			$resultado = executa_sql($conexao, $sql);
			$coln = ibase_num_fields($resultado);
			$tipo = array();
			for ($i = 0; $i < $coln; $i++) {
				$col_info = ibase_field_info($resultado, $i);
				echo "<td class='cell_cabecalho'>". $col_info['name']. "</td>";
				array_push($tipo, $col_info["type"]);
			}
		?>
		</tr>
		<?
			$contador = 0;
			while($linha = ibase_fetch_row($resultado)){
				echo "<tr>";
				for($i = 0; $i < $coln; $i++){
					$alinha = $tipo[$i] != "INTEGER" ? "left" : "right";
					echo "<td bgcolor='#FFFFFF' align='$alinha'>".$linha[$i]."</td>";
				}
				echo "</tr>";
				$contador++;
			}
		?>
	<table>
	<div align="center" style="font-size:12px;font-weight:bold">
		<?=$contador > 0 ? "$contador registros retornados" : "Nenhuma registro retornado" ?>
	</div>
</body>
</html>
<?
# Disconectando do Banco de Dados
include("disconectar.php");
?>
<!--
INTEGER
VARCHAR
DATE
BLOB
-->