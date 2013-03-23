<?Php
# Cabecalhos
include("parametros.php");
include("funcoes.php");
include("variaveis.php");

# Conectando a Base de Dados
include("conectar.php");

$ck  = $_GET["ck"];
$seq = $_GET["seq"];
$dta = $_GET["dta"];

$sql = "UPDATE TBLCRT SET CK = $ck WHERE SEQ = $seq AND DTAMOVMEN = '$dta'";

$resultado = executa_sql($conexao, $sql);
?>