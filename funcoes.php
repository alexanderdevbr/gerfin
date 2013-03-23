<?

# Executando uma instrucao no banco de dados
function executa_sql($conexao, $instrucao){	
	$result = ibase_query($instrucao);
	$erro_msg = ibase_errmsg();
	if($erro_msg){
		ibase_rollback($conexao);
		$msg = "<hr width='100%'>Ocorreu um <b>E R R O</b> ao executar o comando SQL <font color='#FF0000'>$instrucao</font><br>
		        Detalhes do Erro: <i>$erro_msg</i><hr width='100%'>";
	}else{
		$inicio = strtoupper( substr( trim($instrucao), 0, 6) );
		if( ($inicio == 'INSERT') || ($inicio == 'UPDATE') || ($inicio == 'DELETE') ){
			ibase_commit($conexao);
		}
	}
	return $result;
}
?>