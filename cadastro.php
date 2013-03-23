<table width="100%" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td id="celAbaCadastro" align="center" valign="middle" height="20px" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Cadastro
		</td>
		<td id="celAbaCartao" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Cartão
		</td>
		<td id="celAbaCheque" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Cheque
		</td>
		<td id="celAbaContaCorrente" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Conta Corrente
		</td>
		<td id="celAbaGastoProgramado" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Gasto Programado
		</td>
		<td id="celAbaGastoFiesta" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Fiesta
		</td>
		<td id="celAbaGastoGolf" align="center" valign="middle" width="10%" class="abainativa" onMouseOver="trataMouseAba( this );" onClick="trataCliqueAba( this.id );">
			Golf
		</td>
	</tr>
</table>

<br />

<div id="divCadastro" style="display: block">
	<table border="0" width="90%" align="center">
		<tr>
			<td bgcolor="#F1F1F3">
				<? include("forms/frmCad.php") ?>
			</td>
		</tr>
  </table>
</div>
<div id="divCartao" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Cartão de credito...
			</td>
		</tr>
  </table>
</div>
<div id="divCheque" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Cheques...
			</td>
		</tr>
	</table>
</div>
<div id="divContaCorrente" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Conta Corrente...
			</td>
		</tr>
	</table>
</div>
<div id="divGastoProgramado" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Gasto programado...
			</td>
		</tr>
	</table>
</div>
<div id="divGastoFiesta" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Gasto fiesta...
			</td>
		</tr>
	</table>
</div>
<div id="divGastoGolf" style="display: none">
	<table border="0" width="50%">
		<tr>
			<td>
				Gasto golf...
			</td>
		</tr>
	</table>
</div>


<script>
	defineAba( "celAbaCadastro",        "divCadastro"            );
	defineAba( "celAbaCartao",          "divCartao"              );
	defineAba( "celAbaCheque",          "divCheque"              );
	defineAba( "celAbaContaCorrente",   "divContaCorrente"       );
	defineAba( "celAbaGastoProgramado", "divGastoProgramado"     );
	defineAba( "celAbaGastoFiesta",     "divGastoFiesta"         );
	defineAba( "celAbaGastoGolf",       "divGastoGolf"           );

	defineAbaAtiva( "celAba" );
</script>