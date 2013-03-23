<?
session_start();
?>

<form name="form_login" method="post" >
<input type="hidden" name="menu_cadastros" value="S" />
<table align="center" class="tbl">
	<tr>
		<td colspan="2" class='cell_cabecalho'>:: Login</td>
	</tr>
	<tr>
		<td align="right">Ticket</td>
		<td><input type="password" name="ticket" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" name="enviar" value="enviar" /></td>
	</tr>
</table>
</form>