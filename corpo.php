<?
session_start();

# Cabecalhos
include("parametros.php");
include("funcoes.php");
include("variaveis.php");

# Conectando a Base de Dados
include("conectar.php");

if($menu_cadastros == 'S'){
	$inc = "login.php";
	if(($_SESSION["ticket"] == "S") || (md5($_POST["ticket"]) == $ticket) ) {
		$_SESSION["ticket"] = "S";
		$inc = "cadastro.php";
	}
	include($inc);
}else if($menu_cartoes == 'S'){
	include("rel_cartoes.php");
}else if($menu_cheques == 'S'){
}else if($menu_gastosprg == 'S'){
}else if($menu_pagaberto == 'S'){
	include("rel_pagamento_aberto.php");
}else if($menu_sql == 'S'){
	include("sql.php");
}else if($menu_logout == 'S'){
	session_destroy();
}

# Disconectando do Banco de Dados
include("disconectar.php");
?>