<table width="100%" class="menu_superior">
	<th>
		<td <?=(isset($rel_pagaberto) ? "bgcolor='$fundo_td_selecionado'" : '') ?> align="center"><a href="index.php?menu_relatorios=S&rel_pagaberto=S">Pagamentos em Aberto</a></td>
		<td <?=(isset($rel_gascad) ? "bgcolor='$fundo_td_selecionado'" : '') ?> align="center"><a href="index.php?menu_relatorios=S&rel_gascad=S">Gastos Cadastrados</a></td>
		<td <?=(isset($rel_cartaberto) ? "bgcolor='$fundo_td_selecionado'" : '') ?> align="center"><a href="index.php?menu_relatorios=S&rel_cartaberto=S">Cartão em Aberto</a></td>
	</th>
</table>
<?
if($rel_pagaberto == 'S'){
	include("rel_pagamento_aberto.php");
}
?>