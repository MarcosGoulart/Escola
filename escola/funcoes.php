<?php  
function getAlunoNome($nome){
	$conexao = getConexao();
	$select ="select * from aluno where nome_aluno = '%:nome%';";

	$stmt = $conexao->prepare($select);
	$stmt->blindValue(':nome', $nome);

	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;


}

function getAlunoCodigo($codigo){
	$conexao = getConexao();
	$select ="select * from aluno where codigo_aluno = '%:codigo%';";

	$stmt = $conexao->prepare($select);
	$stmt->blindValue(':codigo', $codigo);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}


function getAlunoRg($rg){
	$conexao = getConexao();
	$select ="select * from aluno where rg_aluno = '%:rg%';";

	$stmt = $conexao->prepare($select);
	$stmt->blindValue(':rg', $rg);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}


function getAlunoId($id){
	$conexao = getConexao();
	$select ="select * from aluno where id_aluno = '%:id%';";

	$stmt = $conexao->prepare($select);
	$stmt->blindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}

function setNotasPrimeiro($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas1 = ':notas', frequencia1 = ':frequencia'
WHERE aluno_turma_id_aluno_turma = ':id_turma' and diciplina_id_diciplina = ':id_diciplina';";

	$stmt = $conexao->prepare($update);
	$stmt->blindValue(':notas', $notas);
	$stmt->blindValue(':frequencia', $frequencia);
	$stmt->blindValue(':id_aluno_turma', $id_aluno_turma);
	$stmt->blindValue(':id_diciplina', $id_diciplina);
	$stmt->execute();
	$conexao->query($update);
	$conexao->close();
}


function setNotasSegundo($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas2 = ':notas', frequencia2 = ':frequencia'
WHERE aluno_turma_id_aluno_turma = ':id_turma' and diciplina_id_diciplina = ':id_diciplina';";

	$stmt = $conexao->prepare($update);
	$stmt->blindValue(':notas', $notas);
	$stmt->blindValue(':frequencia', $frequencia);
	$stmt->blindValue(':id_aluno_turma', $id_aluno_turma);
	$stmt->blindValue(':id_diciplina', $id_diciplina);
	$stmt->execute();
	$conexao->query($update);
	$conexao->close();
}

function setNotasTerceiro($notas, $frequencia, $id_aluno_turma, $id_diciplina){
	$conexao = getConexao();
	$update = "update notas_diciplina
SET notas3 = ':notas', frequencia3 = ':frequencia'
WHERE aluno_turma_id_aluno_turma = ':id_turma' and diciplina_id_diciplina = ':id_diciplina';";

	$stmt = $conexao->prepare($update);
	$stmt->blindValue(':notas', $notas);
	$stmt->blindValue(':frequencia', $frequencia);
	$stmt->blindValue(':id_aluno_turma', $id_aluno_turma);
	$stmt->blindValue(':id_diciplina', $id_diciplina);
	$stmt->execute();
	$conexao->query($update);
	$conexao->close();
}

function getHistoricoInfos($id){
	$conexao = getConexao();
	$select = "select nome_aluno, nome_pai, nome_mae, natural_de, data_nasc, rg_aluno from aluno where id_aluno = ':id';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getHistoricoNotas($id){
	$conexao = getConexao();
	$select = "select notas_diciplina.notas1, notas_diciplina.notas2, notas_diciplina.notas3, diciplina.nome_diciplina, ano.nome_ano, turma.nome_turma, turma.anoLetivo from notas_diciplina 
	inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
	inner join ano on diciplina.ano_id_ano = ano.id_ano
	inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma 
	inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno 
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	WHERE aluno.id_aluno = ':id';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getFichaAcompanhamento($nome_aluno){
	$conexao = getConexao();
	$select = "select nome_aluno, data_nasc, natural_de, nome_pai, nome_mae, endereco_aluno, cep_aluno, tel_aluno from aluno where nome_aluno = ':nome_aluno';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':nome_aluno', $nome_aluno);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getAtestadofrequencia($id){
	$conexao = getConexao();
	$select = "select aluno.nome_aluno, data_nasc, aluno.nome_mae, aluno.nome_pai, aluno.endereco_aluno, ano.nome_ano from aluno
	inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	inner join ano on turma.ano_id_ano = ano.id_ano
	where id_aluno = ':id';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function buscaTurma($turma){
	$conexao = getConexao();
	$select = "select nome_turma from turma
	where nome_turma like '%:turma%';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':turma', $turma);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getTurma($id){
	$conexao = getConexao();
	$select = "select aluno.nome_aluno, turma.anoLetivo, turma.data_incio from aluno
	inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
	inner join turma on aluno_turma.turma_id_turma = turma.id_turma
	where aluno_turma.turma_id_turma = ':id';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getAluno($id){
	$conexao = getConexao();
	$select = "select turma.nome_turma, turma.anoLetivo, aluno_turma.id_aluno_turma from turma inner join aluno_turma on turma.id_turma = aluno_turma.turma_id_turma
	where aluno_turma.aluno_id_aluno = ':id';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	$result += getAlunoId($id);
	return $result;

}

function getBoletim($id){
	$conexao = getConexao();
	$select = "select notas1 as '1º Trimestre' , frequencia1 as 'faltas', notas2 as '2º Trimestre', frequencia2 as 'faltas', notas3 as '3º Trimestre', frequencia3 as 'faltas', diciplina.nome_diciplina  from notas_diciplina
inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma
inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno
where aluno_turma_id_aluno_turma = ':id';
";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function addAluno($codigo_aluno, $nome_aluno, $endereco_aluno, $tel_aluno, $cep_aluno, $data_nasc, $rg_aluno, $natural_de, $nome_pai, $cpf_pai, $rg_pai, $endereco_pai, $localtrabalho_pai, $cep_pai, $rg_pai, $cep_pai, $tel_pai, $email_pai, $nome_mae, $endereco_mae, $cpf_mae, $rg_mae, $cep_mae, $localtrabalho_mae, $tel_mae, $email_mae, $pessoasautorizadas, $alergia, $prob_saude, $tipo_sangue, $medicacoes, $nome_medico, $tel_medico, $tel_urgencia,  $escolaano, $gestacao, $desenvolvimento_aluno, $escolaanterior, $turnointegral, $almoco, $restricoesalimentares, $horarioestendido, $atividades, $matricularematricula){
	$conexao = getConexao();
	$insert = "insert into aluno(codigo_aluno, nome_aluno, endereco_aluno, tel_aluno, cep_aluno, data_nasc, rg_aluno, natural_de, nome_pai, cpf_pai, rg_pai, endereco_pai, localtrabalho_pai, cep_pai, tel_pai, email_pai, nome_mae, endereco_mae, cpf_mae, rg_mae, cep_mae, localtrabalho_mae, tel_mae, email_mae, pessoasautorizadas, alergia, prob_saude, tipo_sangue, medicacoes, nome_medico, tel_medico, tel_urgencia, escolaano, gestacao, desenvolvimento_aluno, escolaanterior, interacaoescolar, turnointegral, almoco, restricoesalimentares, horarioestendido, atividades, matricularematricula)
values(':codigo_aluno', ':nome_aluno', ':endereco_aluno', ':tel_aluno', ':cep_aluno', ':data_nasc', ':rg_aluno', ':natural_de', ':nome_pai', ':cpf_pai', ':rg_pai', ':endereco_pai', ':localtrabalho_pai', ':cep_pai', ':tel_pai', ':email_pai', ':nome_mae', ':endereco_mae', ':cpf_mae', ':rg_mae', ':cep_mae', ':localtrabalho_mae', ':tel_mae', ':email_mae', ':pessoasautorizadas', ':alergia', ':prob_saude', ':tipo_sangue', ':medicacoes', ':nome_medico', ':tel_medico', ':tel_urgencia', ':escolaano', ':gestacao', ':desenvolvimento_aluno', ':escolaanterior', ':interacaoescolar', ':turnointegral', ':almoco', ':restricoesalimentares', ':horarioestendido', ':atividades', ':matricularematricula');";
	$stmt = $conexao->prepare($insert);
	$stmt->bindValue(':codigo_aluno', $codigo_aluno);
	$stmt->bindValue(':nome_aluno', $nome_aluno);
	$stmt->bindValue(':endereco_aluno', $endereco_aluno);
	$stmt->bindValue(':tel_aluno', $tel_aluno);
	$stmt->bindValue(':cep_aluno', $cep_aluno);
	$stmt->bindValue(':data_nasc', $data_nasc);
	$stmt->bindValue(':rg_aluno', $rg_aluno);
	$stmt->bindValue(':natural_de', $natural_de);
	$stmt->bindValue(':nome_pai', $nome_pai);
	$stmt->bindValue(':cpf_pai', $cpf_pai);
	$stmt->bindValue(':rg_pai', $rg_pai);
	$stmt->bindValue(':endereco_pai', $endereco_pai);
	$stmt->bindValue(':localtrabalho_pai', $localtrabalho_pai);
	$stmt->bindValue(':cep_pai', $cep_pai);
	$stmt->bindValue(':tel_pai', $tel_pai);
	$stmt->bindValue(':email_pai', $email_pai);
	$stmt->bindValue(':nome_mae', $nome_mae);
	$stmt->bindValue(':endereco_mae', $endereco_mae);
	$stmt->bindValue(':cpf_mae', $cpf_mae);
	$stmt->bindValue(':rg_mae', $rg_mae);
	$stmt->bindValue(':cep_mae', $cep_mae);
	$stmt->bindValue(':localtrabalho_mae', $localtrabalho_mae);
	$stmt->bindValue(':tel_mae', $tel_mae);
	$stmt->bindValue(':email_mae', $email_mae);
	$stmt->bindValue(':pessoasautorizadas', $pessoasautorizadas);
	$stmt->bindValue(':alergia', $alergia);
	$stmt->bindValue(':prob_saude', $prob_saude);
	$stmt->bindValue(':tipo_sangue', $tipo_sangue);
	$stmt->bindValue(':medicacoes', $medicacoes);
	$stmt->bindValue(':nome_medico', $nome_medico);
	$stmt->bindValue(':tel_medico', $tel_medico);
	$stmt->bindValue(':tel_urgencia', $tel_urgencia);
	$stmt->bindValue(':escolaano', $escolaano);
	$stmt->bindValue(':gestacao', $gestacao);
	$stmt->bindValue(':desenvolvimento_aluno', $desenvolvimento_aluno);
	$stmt->bindValue(':escolaanterior', $escolaanterior);
	$stmt->bindValue(':interacaoescolar', $interacaoescolar);
	$stmt->bindValue(':turnointegral', $turnointegral);
	$stmt->bindValue(':almoco', $almoco);
	$stmt->bindValue(':restricoesalimentares', $restricoesalimentares);
	$stmt->bindValue(':horarioestendido', $horarioestendido);
	$stmt->bindValue(':atividades', $atividades);
	$stmt->bindValue(':matricularematricula', $matricularematricula);
	$stmt->execute();
	$result = $conexao->query($insert);
	$conexao->close();
	return $result;

}

function setAluno($id, $codigo_aluno, $nome_aluno, $endereco_aluno, $tel_aluno, $cep_aluno, $data_nasc, $rg_aluno, $natural_de, $nome_pai, $cpf_pai, $rg_pai, $endereco_pai, $localtrabalho_pai, $cep_pai, $rg_pai, $cep_pai, $tel_pai, $email_pai, $nome_mae, $endereco_mae, $cpf_mae, $rg_mae, $cep_mae, $localtrabalho_mae, $tel_mae, $email_mae, $pessoasautorizadas, $alergia, $prob_saude, $tipo_sangue, $medicacoes, $nome_medico, $tel_medico, $tel_urgencia,  $escolaano, $gestacao, $desenvolvimento_aluno, $escolaanterior, $turnointegral, $almoco, $restricoesalimentares, $horarioestendido, $atividades, $matricularematricula){
	$conexao = getConexao();
	$update = "update aluno
	set codigo_aluno = ':codigo_aluno', nome_aluno = ':nome_aluno', endereco_aluno = ':endereco_aluno', tel_aluno = ':tel_aluno', cep_aluno = ':cep_aluno', data_nasc = ':data_nasc', rg_aluno = ':rg_aluno', natural_de = ':natural_de', nome_pai = ':nome_pai', cpf_pai = ':cpf_pai', rg_pai = ':rg_pai', endereco_pai = ':endereco_pai', localtrabalho_pai = ':localtrabalho_pai', cep_pai = ':cep_pai', tel_pai = ':tel_pai', email_pai = ':email_pai', nome_mae = ':nome_mae', endereco_mae = ':endereco_mae', cpf_mae = ':cpf_mae', rg_mae = ':rg_mae', cep_mae = ':cep_mae', localtrabalho_mae = ':localtrabalho_mae', tel_mae = ':tel_mae', email_mae = ':email_mae', pessoasautorizadas = ':pessoasautorizadas', alergia = ':alergia', prob_saude = ':prob_saude', tipo_sangue = ':tipo_sangue', medicacoes = ':medicacoes', nome_medico = ':nome_medico', tel_medico = ':tel_medico', tel_urgencia = ':tel_urgencia', escolaano = ':escolaano', gestacao = ':gestacao', desenvolvimento_aluno = ':desenvolvimento_aluno', escolaanterior = ':escolaanterior', interacaoescolar = ':interacaoescolar', turnointegral = ':turnointegral', almoco = 'almoco', restricoesalimentares = ':restricoesalimentares', horarioestendido = ';horarioestendido', atividades = ':atividades', matricularematricula = ':matricularematricula')
        where id_aluno = ':id';";
        $stmt = $conexao->prepare($update);
        $stmt->bindValue(':id', $id);
		$stmt->bindValue(':codigo_aluno', $codigo_aluno);
		$stmt->bindValue(':nome_aluno', $nome_aluno);
		$stmt->bindValue(':endereco_aluno', $endereco_aluno);
		$stmt->bindValue(':tel_aluno', $tel_aluno);
		$stmt->bindValue(':cep_aluno', $cep_aluno);
		$stmt->bindValue(':data_nasc', $data_nasc);
		$stmt->bindValue(':rg_aluno', $rg_aluno);
		$stmt->bindValue(':natural_de', $natural_de);
		$stmt->bindValue(':nome_pai', $nome_pai);
		$stmt->bindValue(':cpf_pai', $cpf_pai);
		$stmt->bindValue(':rg_pai', $rg_pai);
		$stmt->bindValue(':endereco_pai', $endereco_pai);
		$stmt->bindValue(':localtrabalho_pai', $localtrabalho_pai);
		$stmt->bindValue(':cep_pai', $cep_pai);
		$stmt->bindValue(':tel_pai', $tel_pai);
		$stmt->bindValue(':email_pai', $email_pai);
		$stmt->bindValue(':nome_mae', $nome_mae);
		$stmt->bindValue(':endereco_mae', $endereco_mae);
		$stmt->bindValue(':cpf_mae', $cpf_mae);
		$stmt->bindValue(':rg_mae', $rg_mae);
		$stmt->bindValue(':cep_mae', $cep_mae);
		$stmt->bindValue(':localtrabalho_mae', $localtrabalho_mae);
		$stmt->bindValue(':tel_mae', $tel_mae);
		$stmt->bindValue(':email_mae', $email_mae);
		$stmt->bindValue(':pessoasautorizadas', $pessoasautorizadas);
		$stmt->bindValue(':alergia', $alergia);
		$stmt->bindValue(':prob_saude', $prob_saude);
		$stmt->bindValue(':tipo_sangue', $tipo_sangue);
		$stmt->bindValue(':medicacoes', $medicacoes);
		$stmt->bindValue(':nome_medico', $nome_medico);
		$stmt->bindValue(':tel_medico', $tel_medico);
		$stmt->bindValue(':tel_urgencia', $tel_urgencia);
		$stmt->bindValue(':escolaano', $escolaano);
		$stmt->bindValue(':gestacao', $gestacao);
		$stmt->bindValue(':desenvolvimento_aluno', $desenvolvimento_aluno);
		$stmt->bindValue(':escolaanterior', $escolaanterior);
		$stmt->bindValue(':interacaoescolar', $interacaoescolar);
		$stmt->bindValue(':turnointegral', $turnointegral);
		$stmt->bindValue(':almoco', $almoco);
		$stmt->bindValue(':restricoesalimentares', $restricoesalimentares);
		$stmt->bindValue(':horarioestendido', $horarioestendido);
		$stmt->bindValue(':atividades', $atividades);
		$stmt->bindValue(':matricularematricula', $matricularematricula);
		$stmt->execute();
		$result = $conexao->query($update);
		$conexao->close();
		return $result;
}


function addTurma($ano_id_ano, $data_formacao, $nome_turma, $anoletivo){
	$conexao = getConexao();
	$insert = "insert into turma (ano_id_ano, data_formacao, nome_turma, anoletivo)
values (':ano_id_ano', 'data_formacao', ':nome_turma', ':anoletivo' );";
	$stmt = $conexao->prepare($insert);
	$stmt->bindValue(':ano_id_ano', $ano_id_ano);
	$stmt->bindValue(':data_formacao', $data_formacao);
	$stmt->bindValue(':nome_turma', $nome_turma);
	$stmt->bindValue(':anoletivo', $anoletivo);
	$stmt->execute();
	$result = $conexao->query($insert);
	$conexao->close();
	return $result;
}

function getIdAno($nome_ano){
	$conexao = getConexao();
	$select = "select id_ano from ano where nome_ano=':nome_ano';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':nome_ano', $nome_ano);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function addAlunoTurma($aluno_id_aluno, $turma_id_turma){
	$conexao = getConexao();
	$select = "insert into  aluno_turma(aluno_id_aluno, turma_id_turma)
values (':aluno_id_aluno', ':turma_id_turma');";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':aluno_id_aluno', $aluno_id_aluno);
	$stmt->bindValue(':turma_id_turma', $turma_id_turma);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;
}

function getIdAlunoTurma($aluno_id_aluno, $turma_id_turma){
	$conexao = getConexao();
	$select = "select id_aluno_turma from aluno_turma
where aluno_id_aluno = ':aluno_id_aluno' and turma_id_turma = ':turma_id_turma';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':aluno_id_aluno', $aluno_id_aluno);
	$stmt->bindValue(':turma_id_turma', $turma_id_turma);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}

function setMateriaAlunoTurma($aluno_turma_id_aluno_turma, $diciplina_id_diciplina){
	$conexao = getConexao();
	$insert = "insert into notas_diciplina (aluno_turma_id_aluno_turma, diciplina_id_diciplina)
values (':aluno_turma_id_aluno_turma', ':diciplina_id_diciplina');";
	$stmt = $conexao->prepare($insert);
	$stmt->bindValue(':aluno_turma_id_aluno_turma', $aluno_turma_id_aluno_turma);
	$stmt->bindValue(':diciplina_id_diciplina', $diciplina_id_diciplina);
	$stmt->execute();
	$result = $conexao->query($insert);
	$conexao->close();
	return $result;

}

function getDiciplinaAno($ano_id_ano){
	$conexao = getConexao();
	$select = "select id_diciplina from diciplina
where ano_id_ano = ':ano_id_ano';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':ano_id_ano', $ano_id_ano);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}

function getIdAno($nome_ano){
	$conexao = getConexao();
	$select = "select id_ano from ano 
where nome_ano = ':nome_ano';";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':nome_ano', $nome_ano);
	$stmt->execute();
	$result = $conexao->query($select);
	$conexao->close();
	return $result;

}

?>