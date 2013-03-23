<?
include("baixa.php");
?>

<script language="javascript">
	function enviar(chave){
		location = "index.php?menu_pagaberto=S&chaves="+chave;
	}
</script>

Relatório de pagamentos em aberto
<table cellspacing="0" cellpadding="2" width="100%" class="tbl">

	<?
	$resultado = executa_sql($conexao, "SELECT ID, MES, ANO, MESANO, DSC, VLR, VLRACUMES FROM PRC_RELPGTABR");
	$mes = '';
	$acu = 0;
	while($linha = ibase_fetch_object($resultado)){
		$key     = ($linha->ANO * 10000) + ($linha->MES * 100) + $linha->ID;
		$keyFull = ($linha->ANO * 10000) + ($linha->MES * 100);
		$btnBaixar = ($_SESSION["ticket"] != "S") ? '' : '<img src="images/pagar.jpg" alt="Baixar..." onClick="enviar('.$key.')" style="cursor: pointer" />';
		
		if($linha->MESANO != $mes){
			if($mes != ''){
				echo '<tr><td colspan="4" heigth="2px" bgcolor="#000000"></td></tr>';
			}
			echo '<tr>';
			echo '	<td colspan="4" class="cell_cabecalho_ult"><a href="relPagamentoAbertoDetalhe.php?key='.$keyFull.'" target="_blank">Inicio de '.$linha->MESANO.'</a></td>';
			echo '</tr>';
			echo '<tr>';
			echo '	<td class="cell_cabecalho" width="70%" align="left">Descrição</td>';
			echo '	<td class="cell_cabecalho" width="15%" align="right">Valor</td>';
			echo '	<td class="cell_cabecalho_ult" width="15%" align="right" colspan="2">Valor Acumulado</td>';
			echo '</tr>';
			$mes = $linha->MESANO;
		}
		
		echo '<tr>';
		echo '	<td align="left"><a href="relPagamentoAbertoDetalhe.php?key='.$key.'" target="_blank">'.$linha->DSC.'</a></td>';
		echo '	<td align="right">'.$linha->VLR.'</td>';
		echo '	<td align="right">'.$linha->VLRACUMES.'</td>';
		echo '  <td align="center">'.$btnBaixar.'</td>';
		echo '</tr>';
		$acu += $linha->VLR;
	}
	?>
	<tr><td colspan="4" heigth="2px" bgcolor="#000000"></td></tr>
	<tr>
		<td colspan="4" class="cell_cabecalho_ult" align="right">Total - R$ <b><?=$acu; ?></b></td>
	</tr>
</table>