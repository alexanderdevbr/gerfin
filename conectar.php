<?
# Conectando a base de dados

$conexao = ibase_connect($host, $user, $pass, null, null, $dialeto, null) or die("Erro ao conectar a base de dados!");
?>