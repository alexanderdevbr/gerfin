<?
$chaves = $_GET["chaves"];
$ano = substr($chaves, 0, 4);
$mes = substr($chaves, 4, 2);
$id  = substr($chaves, -2);

$resultado = executa_sql($conexao, "EXECUTE PROCEDURE PRC_BAIXA ($id), ($mes), ($ano)");
ibase_commit($conexao);
?>
<!--
EXECUTE PROCEDURE SP_INSERE_USUARIO ('$dep_id'), ('$nome'), ('$login'), ('$senha')
-->