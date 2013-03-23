<?
# Cabecalhos
include("parametros.php");
include("funcoes.php");
include("variaveis.php");

$ano  = substr($_GET['key'], 0, 4);
$mes  = substr($_GET['key'], 4, 2);
$id   = substr($_GET['key'], 6, 2);
$id   = $id > 0 ? ' and id = '.substr($_GET['key'], 6, 2) : '';
$ord  = isset($_GET['ord']) ? $_GET['ord'].',' : '';

# Conectando a Base de Dados
include("conectar.php");

$nomeMes = array(1 => 'Janeiro', 'Fevereiro', 'Março', 'Abil', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

$sql = "select 
         ID, 
         SEQ, 
         TIPDSC, 
         CADRAZSOC, 
         DSCMOVMEN, 
         DTAMOV, 
         DTAVCT, 
         QUANTIDADE, 
         VALOR_UNITARIO, 
         VALOR, 
         CK, 
         PARCELADO 
       from view_relpgtabr
			 where mes = $mes
         and ano = $ano
         $id
       ORDER BY $ord ID, DTAMOV, CADRAZSOC";

$resultado = executa_sql($conexao, $sql);

# Disconectando do Banco de Dados
include("disconectar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalhes</title>
<script language="javascript">
	function alterou(seq,marcado,oValor,flag){
		var url = "";
		
		if(flag < 0){
			url = "atualizaCk.php?ck="+(marcado ? 1 : 0)+"&seq="+seq+"&dta="+oValor;
		}else if(document.getElementById("ck_alter_vlr").checked) {
			
			if(flag == 1){
				alert(oValor + " " + flag);
			}else if(flag == 2){
				alert(oValor + " " + flag);
			}else if(flag == 3){
				alert(oValor + " " + flag);
			}
			
		}
		
		if(url != "")
			loadXMLDoc(url);
	}
	
	function loadXMLDoc(url){
		var req = null;
	
		// Procura por um objeto nativo (Mozilla/Safari)
		if (window.XMLHttpRequest) {
			req = new XMLHttpRequest();
			tipoNavegador = "Firefox";
	
		// Procura por uma versao ActiveX (IE)
		} else if (window.ActiveXObject) {
			req = new ActiveXObject("Microsoft.XMLHTTP");
			tipoNavegador = "IE";
		}
	
		//req.onreadystatechange = processReqChange;
		req.open("GET", url, true);
		req.send(null);
	
	}
</script> 
</head>

<body>
<h2>Detalhes referente ao mês de <?=$nomeMes[(int)$mes]." de ".$ano ?></h2>
<a href="relPagamentoAbertoDetalhe.php?key=<?=$_GET['key']?>&ord=DTAVCT">Ordem Vencimento</a> | <a href="relPagamentoAbertoDetalhe.php?key=<?=$_GET['key']?>">Ordem ID</a>
<table cellpadding="2" cellspacing="1" bgcolor="#666666">
	<tr>
		<td bgcolor="#CCCCCC" align="right"><strong>#</strong></td>
		<td bgcolor="#CCCCCC"><strong>Empresa</strong></td>
		<td bgcolor="#CCCCCC"><strong>Descricao</strong></td>
		<td bgcolor="#CCCCCC"><strong>Data Mov.</strong></td>
		<td bgcolor="#CCCCCC"><strong>Data Vct.</strong></td>
		<td bgcolor="#CCCCCC"><strong>Qtd</strong></td>
		<td bgcolor="#CCCCCC"><strong>Vlr Unt.</strong></td>
		<td bgcolor="#CCCCCC" colspan="2"><strong>Valor</strong></td>
	</tr>
	<?
	$i = 0;
	$total = 0;
	$subTotal = 0;
	$cor = "#F4F4F4";
	$tipo = '';
	$primeiraEntrada = true;
	while($linha = ibase_fetch_object($resultado)){
		$cor = $cor == '#F4F4F4' ? '#FFFFFF' : '#F4F4F4';
		
		if($tipo != $linha->TIPDSC){
			$subTotal = number_format($subTotal, 2);
			if(!$primeiraEntrada){
				echo "<tr>";
				echo "	<td align='right' colspan='7' bgcolor='#FFFFFF'>SubTotal: </td>";
				echo "	<td align='right'  bgcolor='#FFFFFF'><b>$subTotal</b></td>";
				echo "</tr>";
			}
				
			echo "<tr><td colspan='8' bgcolor='#CC99FF'><b>$linha->TIPDSC</b></td><td bgcolor='#CC99FF'></td></tr>";
			$tipo = $linha->TIPDSC;
			$primeiraEntrada = false;
			$subTotal = 0;
			$i = 0;
		}
		
		$i++;
		
		echo "<tr>";
		echo "  <td bgcolor='$cor' align='right'>$i</td>";
		echo "  <td bgcolor='$cor'>".$linha->CADRAZSOC."</td>";
		echo "  <td bgcolor='$cor'>".$linha->DSCMOVMEN."</td>";
		echo "  <td bgcolor='$cor'>".date('d/m/Y', strtotime($linha->DTAMOV))."</td>";
		echo "  <td bgcolor='$cor'>".date('d/m/Y', strtotime($linha->DTAVCT))."</td>";
		echo "  <td bgcolor='$cor' align='right'>".number_format($linha->QUANTIDADE, 3)."</td>";
		echo "  <td bgcolor='$cor' align='right'>".number_format($linha->VALOR_UNITARIO, 2)."</td>";
		echo "  <td bgcolor='$cor' align='right'>".number_format($linha->VALOR, 2)."</td>";
		if($linha->CK < 0) {
			echo "  <td>-</td>";
		}else {
			$ck = $linha->CK > 0 ? 'Checked' : '';
			echo "  <td><input type=\"checkbox\" $ck onClick='alterou(this.name,this.checked,this.value, -1);' value='$linha->DTAMOV' name='$linha->SEQ'/></td>";
		}

		echo "</tr>";
		
		$total    += $linha->VALOR;
		$subTotal += $linha->VALOR;
	}
	?>
	<tr>
		<td colspan='7' bgcolor='#FFFFFF' align='right'>SubTotal: </td>
		<td align="right"  bgcolor='#FFFFFF'><b><?= number_format($subTotal, 2) ?></b></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCCC" align="right" colspan="7"><strong>Total Geral: </strong></td>
		<td bgcolor="#CCCCCC" align="right"><strong><font color="#FF0000"><?=number_format($total, 2) ?></font></strong></td>
	</tr>
</table>
<input type="checkbox" name="ck_alter_vlr" id="ck_alter_vlr"> Alterar valores
</body>
</html>
