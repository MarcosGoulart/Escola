<?php  
function getAlunoNome($nome){
	$conexao = getConexao();
	
	$select ="select * from aluno where nome_aluno like'%".$nome."%';";

	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);

	return $aluno;


}

function getAlunoCodigo($codigo){
	$conexao = getConexao();
	$select ="select * from aluno where codigo_aluno = '".$codigo."';";

	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);
	return $aluno;

}


function getAlunoRg($rg){
	$conexao = getConexao();
	$select ="select * from aluno where rg_aluno = '".$rg."';";

	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);
	return $aluno;

}


function getAlunoId($id){
	$conexao = getConexao();
	$select ="select * from aluno where id_aluno = '".$id."';";

	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);
	return $aluno;

}

function setNotasPrimeiro($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas1 = '".$notas."', frequencia1 = '".$frequencia."'
WHERE aluno_turma_id_aluno_turma = '".$id_aluno_turma."' and diciplina_id_diciplina = '".$id_diciplina."';";

	pg_query($conexao, $update);
}


function setNotasSegundo($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas2 = '".$notas."', frequencia2 = '".$frequencia."'
WHERE aluno_turma_id_aluno_turma = '".$id_aluno_turma."' and diciplina_id_diciplina = '".$id_diciplina."';";
	pg_query($conexao, $update);
}

function setNotasTerceiro($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas3 = '".$notas."', frequencia3 = '".$frequencia."'
WHERE aluno_turma_id_aluno_turma = '".$id_aluno_turma."' and diciplina_id_diciplina = '".$id_diciplina."';";
	pg_query($conexao, $update);
	
}

function getHistoricoInfos($id){
	$conexao = getConexao();
	$select = "select nome_aluno, nome_pai, nome_mae, natural_de, data_nasc, rg_aluno from aluno where id_aluno = '".$id."';";
	
	$result = pg_query($conexao, $select);
	$histinfos = pg_fetch_all($result);
	
	return $histinfos;
}

function getHistoricoNotas($id){
	$conexao = getConexao();
	$select = "select notas_diciplina.notas1, notas_diciplina.notas2, notas_diciplina.notas3, diciplina.nome_diciplina, ano.nome_ano, turma.nome_turma, turma.anoLetivo from notas_diciplina 
	inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
	inner join ano on diciplina.ano_id_ano = ano.id_ano
	inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma 
	inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno 
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	WHERE aluno.id_aluno = '".$id."';";
	$result = pg_query($conexao, $select);
	$histnotas = pg_fetch_all($result);
	return $histnotas;
}


function getFichaAcompanhamento($id){
	$conexao = getConexao();
	$select = "select nome_aluno, data_nasc, natural_de, nome_pai, nome_mae, endereco_aluno, cep_aluno, tel_aluno from aluno where id_aluno = '".$id."';";
	$result = pg_query($conexao, $select);
	$ficha = pg_fetch_all($result);
	return $ficha;
}

function getAtestadoFrequencia($id){
	$conexao = getConexao();
	$select = "select aluno.nome_aluno, data_nasc, aluno.nome_mae, aluno.nome_pai, aluno.endereco_aluno, ano.nome_ano from aluno
	inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	inner join ano on turma.ano_id_ano = ano.id_ano
	where id_aluno = '".$id."';";
	$result = pg_query($conexao, $select);
	$atestfreq = pg_fetch_all($result);
	return $atestfreq;
}

function buscaTurma($turma){
	$conexao = getConexao();
	$select = "select id_turma, nome_turma from turma
	where nome_turma like '%".$turma."%';";
	$result = pg_query($conexao, $select);
	$turma = pg_fetch_all($result);
	return $turma;
}

function getTurma($id){
	$conexao = getConexao();
	$select = "select aluno.nome_aluno, turma.anoLetivo, turma.data_formacao from aluno
	inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	where aluno_turma.turma_id_turma = '".$id."';";
	$result = pg_query($conexao, $select);
	$turma = pg_fetch_all($result);
	return $turma;
}

function getAlunoAnoTurma($id){
	$conexao = getConexao();
	$select = "select turma.nome_turma, turma.anoLetivo, aluno_turma.id_aluno_turma from turma inner join aluno_turma on turma.id_turma = aluno_turma.turma_id_turma
	where aluno_turma.aluno_id_aluno = '".$id."';";
	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);
	return $aluno;
}

function getBoletim($id){
	$conexao = getConexao();
	$select = "select notas1 , frequencia1, notas2, frequencia2, notas3, frequencia3, diciplina.nome_diciplina  from notas_diciplina
inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma
inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno
where aluno_turma_id_aluno_turma = '".$id."';
";
	$result = pg_query($conexao, $select);
	$boletim = pg_fetch_all($result);
	return $boletim;
}

function addAluno($codigo_aluno, $nome_aluno, $endereco_aluno, $tel_aluno, $cep_aluno, $data_nasc, $rg_aluno, $natural_de, $nome_pai, $cpf_pai, $rg_pai, $endereco_pai, $localtrabalho_pai, $cep_pai, $tel_pai, $email_pai, $nome_mae, $endereco_mae, $cpf_mae, $rg_mae, $cep_mae, $localtrabalho_mae, $tel_mae, $email_mae, $pessoasautorizadas, $alergia, $prob_saude, $tipo_sangue, $medicacoes, $nome_medico, $tel_medico, $tel_urgencia,  $escolaano, $gestacao, $desenvolvimento_aluno, $escolaanterior,$interacaoescolar, $turnointegral, $almoco, $restricoesalimentares, $horarioestendido, $atividades, $matricularematricula){
	$conexao = getConexao();
	$insert = "insert into aluno(codigo_aluno, nome_aluno, endereco_aluno, tel_aluno, cep_aluno, data_nasc, rg_aluno, natural_de, nome_pai, cpf_pai, rg_pai, endereco_pai, localtrabalho_pai, cep_pai, tel_pai, email_pai, nome_mae, endereco_mae, cpf_mae, rg_mae, cep_mae, localtrabalho_mae, tel_mae, email_mae, pessoasautorizadas, alergia, prob_saude, tipo_sangue, medicacoes, nome_medico, tel_medico, tel_urgencia, escolaano, gestacao, desenvolvimento_aluno, escolaanterior, interacaoescolar, turnointegral, almoco, restricoesalimentares, horarioestendido, atividades, matricularematricula)
values('".$codigo_aluno."', '".$nome_aluno."', '".$endereco_aluno."', '".$tel_aluno."', '".$cep_aluno."', '".$data_nasc."', '".$rg_aluno."', '".$natural_de."', '".$nome_pai."', '".$cpf_pai."', '".$rg_pai."', '".$endereco_pai."', '".$localtrabalho_pai."', '".$cep_pai."', '".$tel_pai."', '".$email_pai."', '".$nome_mae."', '".$endereco_mae."', '".$cpf_mae."', '".$rg_mae."', '".$cep_mae."', '".$localtrabalho_mae."', '".$tel_mae."', '".$email_mae."', '".$pessoasautorizadas."', '".$alergia."', '".$prob_saude."', '".$tipo_sangue."', '".$medicacoes."', '".$nome_medico."', '".$tel_medico."', '".$tel_urgencia."', '".$escolaano."', '".$gestacao."', '".$desenvolvimento_aluno."', '".$escolaanterior."', '".$interacaoescolar."', '".$turnointegral."', '".$almoco."', '".$restricoesalimentares."', '".$horarioestendido."', '".$atividades."', '".$matricularematricula."');";
	pg_query($conexao, $insert);
	

}

function setAluno($id, $codigo_aluno, $nome_aluno, $endereco_aluno, $tel_aluno, $cep_aluno, $data_nasc, $rg_aluno, $natural_de, $nome_pai, $cpf_pai, $rg_pai, $endereco_pai, $localtrabalho_pai, $cep_pai, $tel_pai, $email_pai, $nome_mae, $endereco_mae, $cpf_mae, $rg_mae, $cep_mae, $localtrabalho_mae, $tel_mae, $email_mae, $pessoasautorizadas, $alergia, $prob_saude, $tipo_sangue, $medicacoes, $nome_medico, $tel_medico, $tel_urgencia,  $escolaano, $gestacao, $desenvolvimento_aluno, $escolaanterior,$interacaoescolar, $turnointegral, $almoco, $restricoesalimentares, $horarioestendido, $atividades, $matricularematricula){
	$conexao = getConexao();
	$update = "update aluno
	set codigo_aluno='".$codigo_aluno."', nome_aluno='".$nome_aluno."', endereco_aluno='".$endereco_aluno."', tel_aluno='".$tel_aluno."', cep_aluno='".$cep_aluno."', data_nasc='".$data_nasc."', rg_aluno='".$rg_aluno."', natural_de='".$natural_de."', nome_pai='".$nome_pai."', cpf_pai='".$cpf_pai."', rg_pai='".$rg_pai."', endereco_pai='".$endereco_pai."', localtrabalho_pai='".$localtrabalho_pai."', cep_pai='".$cep_pai."', tel_pai='".$tel_pai."', email_pai='".$email_pai."', nome_mae='".$nome_mae."', endereco_mae='".$endereco_mae."', cpf_mae='".$cpf_mae."', rg_mae='".$rg_mae."', cep_mae='".$cep_mae."', localtrabalho_mae='".$localtrabalho_mae."', tel_mae='".$tel_mae."', email_mae='".$email_mae."', pessoasautorizadas='".$pessoasautorizadas."', alergia='".$alergia."', prob_saude='".$prob_saude."', tipo_sangue='".$tipo_sangue."', medicacoes='".$medicacoes."', nome_medico='".$nome_medico."', tel_medico='".$tel_medico."', tel_urgencia='".$tel_urgencia."', escolaano='".$escolaano."', gestacao='".$gestacao."', desenvolvimento_aluno='".$desenvolvimento_aluno."', escolaanterior='".$escolaanterior."', interacaoescolar='".$interacaoescolar."', turnointegral='".$turnointegral."', almoco='".$almoco."', restricoesalimentares='".$restricoesalimentares."', horarioestendido='".$horarioestendido."', atividades='".$atividades."', matricularematricula='".$matricularematricula."'
        where id_aluno = '".$id."';";
       pg_query($conexao, $update);
}


function addTurma($ano_id_ano, $data_formacao, $nome_turma, $anoletivo){
	$conexao = getConexao();
	$insert = "insert into turma (ano_id_ano, data_formacao, nome_turma, anoletivo)
values ('".$ano_id_ano."', '".$data_formacao."', '".$nome_turma."', '".$anoletivo."' );";
	pg_query($conexao, $insert);
}

function getIdAno($nome_ano){
	$conexao = getConexao();
	$select = "select id_ano from ano where nome_ano='".$nome_ano."';";
	$result = pg_query($conexao, $select);
	$ano = pg_fetch_all($result);
	return $ano;

}

function addAlunoTurma($aluno_id_aluno, $turma_id_turma){
	$conexao = getConexao();
	$insert = "insert into  aluno_turma(aluno_id_aluno, turma_id_turma)
values ('".$aluno_id_aluno."', '".$turma_id_turma."');";
	pg_query($conexao, $insert);
	}

function getIdAlunoTurma($aluno_id_aluno, $turma_id_turma){
	$conexao = getConexao();
	$select = "select id_aluno_turma from aluno_turma
where aluno_id_aluno = '".$aluno_id_aluno."' and turma_id_turma = '".$turma_id_turma."';";
	$result = pg_query($conexao, $select);
	$aluno = pg_fetch_all($result);
	return $aluno;

}

function setMateriaAlunoTurma($aluno_turma_id_aluno_turma, $diciplina_id_diciplina){
	$conexao = getConexao();
	$insert = "insert into notas_diciplina (aluno_turma_id_aluno_turma, diciplina_id_diciplina)
values ('".$aluno_turma_id_aluno_turma."', '".$diciplina_id_diciplina."');";
	$result = pg_query($conexao, $insert);

}

function getDiciplinaAno($ano_id_ano){
	$conexao = getConexao();
	$select = "select id_diciplina from diciplina
where ano_id_ano = '".$ano_id_ano."';";
	$result = pg_query($conexao, $select);
	$ano = pg_fetch_all($result);
	return $ano;
}

?>