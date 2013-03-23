<?
$res = executa_sql($conexao, 
'select rdb$relation_name
	from rdb$relations
	where rdb$view_blr is null
	and (rdb$system_flag is null or rdb$system_flag = 0)
	order by 1');
$tabelas = "";
while($linha = ibase_fetch_row($res)){
	$tabelas .= trim($linha[0])."\n";
}
?>


<form action="sqlRes.php" method="post" target="_blank">
	<table width="90%">
		<tr>
			<td><textarea cols="18" rows="15" readonly="readonly"><?=$tabelas ?></textarea></td>
			<td><textarea cols="70" rows="15" name="sql" ></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="enviar" /></td>
		</tr>
	</table>
</form>

<!--
Tabelas:
select rdb$relation_name
from rdb$relations
where rdb$view_blr is null
and (rdb$system_flag is null or rdb$system_flag = 0)
order by 1



View:
select rdb$relation_name
from rdb$relations
where rdb$view_blr is not null
and (rdb$system_flag is null or rdb$system_flag = 0)


Table Coluna:
select f.rdb$relation_name, f.rdb$field_name
from rdb$relation_fields f
join rdb$relations r on f.rdb$relation_name = r.rdb$relation_name
and r.rdb$view_blr is null
and (r.rdb$system_flag is null or r.rdb$system_flag = 0)
order by 1, f.rdb$field_position;

-->