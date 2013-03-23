Acompanhamento de CRT
<table cellspacing="0" cellpadding="2" class="tbl">

	<?
	$sql = "SELECT BCO, SUM(QTDITE * VLRUNI) VLR, 'A Vista' DSC, null DTAMIN, null DTAMAX
              FROM TBLCRT
             WHERE PGTO = 'A'
               AND VLRPAR IS NULL
            GROUP BY BCO
            UNION ALL
            SELECT BCO, SUM(VLRPAR) VLR, 'Parcelado' DSC, min(dtavencfat) DTAMIN, max(dtavencfat) DTAMAX
              FROM TBLCRT
             WHERE PGTO = 'A'
               AND VLRPAR IS NOT NULL
            GROUP BY BCO
            ORDER BY 1";
   
	$resultado = executa_sql($conexao, $sql);
	$mes = '';
	$acu = 0;
	$acuMes = 0;

	while($linha = ibase_fetch_object($resultado)){
		if($linha->BCO != $bco){
			
			switch($linha->BCO){
				case 1:
					$bcoDsc = "Ourocard";
					break;
				case 5:
					$bcoDsc = "Real Gold";
					break;
				case 7:
					$bcoDsc = "Extra MasterCard";
					break;
				case 8:
					$bcoDsc = "Unicard";
					break;
			}
			
			if(isset($bco)){
				echo '<tr>';
				echo '	<td colspan="2" class="cell_cabecalho_ult" align="right">Total R$ <b>'.round($acuMes, 2).'</b></td>';
				echo '</tr>';
				echo '<tr><td colspan="2" heigth="1px" bgcolor="#000000"></td></tr>';
				$acuMes = 0;
			}
			
			echo "<tr>";
			echo "	<td colspan='2' valign='botton' class='cell_cabecalho'>$bcoDsc</td>";
			echo "</tr>";
			echo '<tr>';
			echo '	<td class="cell_cabecalho" width="70%" align="left">Descrição</td>';
			echo '	<td class="cell_cabecalho" width="15%" align="right">Valor</td>';
			echo '</tr>';
			$bco = $linha->BCO;
		}
		$dataMin = ($linha->DTAMIN != '' ? explode('/',$linha->DTAMIN) : '');
		$dataMax = ($linha->DTAMAX != '' ? explode('/',$linha->DTAMAX) : '');
		echo '<tr>';
		echo '	<td align="left">'.$linha->DSC.($linha->DTAMIN != '' ? ' (<em>'.$dataMin[0].'/'.$dataMin[2].' - '.$dataMax[0].'/'.$dataMax[2].'</em>)' : '').'</td>';
		echo '	<td align="right">'.round($linha->VLR, 2).'</td>';
		echo '</tr>';
		$acu += $linha->VLR;
		$acuMes += $linha->VLR;
	}
	?>
	<tr>
		<td colspan="2" class="cell_cabecalho_ult" align="right">Total R$ <b><?=round($acuMes, 2)?></b></td>
	</tr>
	<tr><td colspan="2" heigth="2px" bgcolor="#000000"></td></tr>
	<tr>
		<td colspan="2" class="cell_cabecalho_ult" align="right">Total Geral - R$ <b><?=round($acu, 2) ?></b></td>
	</tr>
</table>