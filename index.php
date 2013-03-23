<?
session_start();

$pessoa = $_POST["pessoa"];
echo "Pessoa - $pessoa";
echo " Session - ".$_SESSION["pes"];

if(isset($pessoa) && ($pessoa != $_SESSION["pes"])){
	$_SESSION["pes"] = $pessoa;
}else if($_SESSION["pes"] == null){
	$_SESSION["pes"] = 1;
}

if($_SESSION["pes"] == 1) {
	$pessoa_1 = 'selected';
}else if ($_SESSION["pes"] == 2) {
	$pessoa_2 = 'selected';
}else {
	$pessoa_1 = 'selected';
}
?>
<HTML>
<HEAD>
<TITLE>::. GerFIN .::</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<link href="abasEstilo.css" rel="stylesheet" type="text/css" />
<script language="Javascript" src="abas.js" type="text/javascript" ></script>
</HEAD>
<BODY BGCOLOR=#FFFFFF leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="#666699">
<table width=780 border=0 cellpadding=0 cellspacing=0 height="383" bgcolor="#FFFFFF" align="center">
  <tr> 
    <td rowspan=2 width="165px" height="35" background="images/index_01.gif" valign="top" align="center">
		<form name="frm_pessoa" method="post" class="frm">
		<select name="pessoa" class="input">
			<option value="1" <?=$pessoa_1; ?>>Alexander</option>
			<option value="2" <?=$pessoa_2; ?>>Pollyanny</option>
		</select>
		<input type="submit" value="Ok" class="input">
		</form> 
	</td>
    <td colspan=2> <img src="images/index_02.gif" width=615 height=24></td>
  </tr>
  <tr> 
    <td> <img src="images/index_03.gif" width=1 height=11></td>
    <td rowspan=2> <img src="images/index_04.gif" width=614 height=73></td>
  </tr>
  <tr> 
    <td colspan=2 height="39"> <img src="images/logo.png" width=166 height=62></td>
  </tr>
  <tr> 
    <td colspan=3 background="images/links.gif"> 
		<? include("menu.php"); ?>
    </td>
  </tr>
  <tr> 
    <td colspan=3 height="233"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="10" height="188">
        <tr> 
          <td height="412" valign="top">
		  	<? include("corpo.php"); ?>
		  </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan=3 height="14"> 
      <div align="center"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0" height="35" align="center">
          <tr> 
            <td background="images/index_08.gif" height="35"> 
              <div align="center"><b><font face="Geneva, Arial, Helvetica, san-serif" size="1" color="#666699">COPYRIGHT&copy; 
                2006 ALEXANDER MOREIRA DE MORAIS </font></b></div>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>
</BODY>
</HTML>