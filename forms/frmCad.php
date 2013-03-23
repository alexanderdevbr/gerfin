<?
include("../session.php");
?>
<form method="post" action="controlador.php" target="_blank" >
	<input type="hidden" name="action" value="cadastro" />

	<table class="frm" align="center">
		<tr>
			<td colspan="2" align="right" valign="bottom" bgcolor="#CCCCCC"><img src="../images/lupa.jpg" alt="Pesquisar" border="1"/>&nbsp;<img src="../images/excluir.gif" alt="Excluir" border="1"/></td>
		</tr>
		<tr>
			<td align="right">Raz&atilde;o Social</td>
			<td><input type="text" name="cadrazsoc" class="frm_input" size="40" maxlength="40" /></td>
		</tr>
		<tr>
			<td align="right">Descri&ccedil;&atilde;o</td>
			<td><input type="text" name="caddsc" class="frm_input" size="80" maxlength="80" /></td>
		</tr>
		<tr>
			<td align="right">Cidade</td>
			<td><input type="text" name="cadciddsc" class="frm_input" size="40" readonly /> <input type="button" value="..." /></td>
			<input type="hidden" name="cadcid" />
		</tr>
		<tr>
			<td align="right">Endere&ccedil;o</td>
			<td><input type="text" name="cadend" class="frm_input" size="80" maxlength="80" /></td>
		</tr>
		<tr>
			<td align="right">Bairro</td>
			<td><input type="text" name="cadbai" class="frm_input" size="20" maxlength="20" /></td>
		</tr>
		<tr>
			<td align="right">Telefone</td>
			<td><input type="text" name="cadtel" class="frm_input" size="15" maxlength="15" /></td>
		</tr>
		<tr>
			<td align="right">CGC</td>
			<td><input type="text" name="cadcgc" class="frm_input" size="19" maxlength="18" /></td>
		</tr>
		<tr>
			<td align="right">Tipo</td>
			<td>
				<select class="frm_input" >
					<option>Restaurante</option>
					<option>Posto</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" /></td>
		</tr>
	</table>
</form>