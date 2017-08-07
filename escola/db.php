<?php
if(!@($conexao=pg_connect ("host=localhost dbname=Escola port=5432 user=postgres password=postgres"))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	pg_close($conexao);
   print "Conexão OK!"; 
}

function getConexao(){
	$conexao=pg_connect ("host=localhost dbname=Escola port=5432 user=postgres password=postgres");
	return $conexao;
}
?>