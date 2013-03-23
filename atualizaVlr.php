<?Php
# Cabecalhos
include("parametros.php");
include("funcoes.php");
include("variaveis.php");

# Conectando a Base de Dados
include("conectar.php");

$flag= $_GET["flag"];
$vlr = $_GET["vlr"];
$seq = $_GET["seq"];
$dta = $_GET["dta"];
$parcelado = $_GET["parcelado"];

$sql = "UPDATE TBLCRT SET CK = $ck WHERE SEQ = $seq AND DTAMOVMEN = '$dta'";

$resultado = executa_sql($conexao, $sql);
?>