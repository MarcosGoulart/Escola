/* busca aluno atraves do nome.*/
SELECT * FROM aluno
WHERE nome_aluno = '%?%';

/* busca aluno atraves do codigo.*/
SELECT * FROM aluno
WHERE codigo_aluno = '?';

/* busca aluno atraves do rg.*/
SELECT * FROM aluno
WHERE rg_aluno = '?';
/* aluno atravez do id*/
SELECT * FROM aluno
WHERE id_aluno = '?';

/* Inserir notas e frequencia do  1° trimestre*/
UPDATE notas_diciplina
SET notas1 = '?', frequencia1 = '?'
WHERE aluno_turma_id_aluno_turma = '?' and diciplina_id_diciplina = '?';

/* Inserir notas e frequencia do  2° trimestre*/
UPDATE notas_diciplina
SET notas2 = '?', frequencia2 = '?'
WHERE aluno_turma_id_aluno_turma = '?' and diciplina_id_diciplina = '?';

/* Inserir notas e frequencia do  3° trimestre*/
UPDATE notas_diciplina
SET notas3 = '?', frequencia3 = '?'
WHERE aluno_turma_id_aluno_turma = '?' and diciplina_id_diciplina = '?';





/* select do histórico escolar busca por id*/
SELECT nome_aluno, nome_pai, nome_mae, natural_de, data_nasc, rg_aluno FROM aluno
WHERE id_aluno = '?';

/* preencher segunda parte do histórioco */
SELECT notas_diciplina.notas1, notas_diciplina.notas2, notas_diciplina.notas3, diciplina.nome_diciplina, ano.nome_ano, turma.nome_turma, turma.anoLetivo FROM notas_diciplina 
inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
inner join ano on diciplina.ano_id_ano = ano.id_ano
inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma 
inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno 
inner join turma on aluno_turma.turma_id_turma = turma.id_turma
WHERE aluno.id_aluno = '?';


/*FICHA DE ACOMPANHAMENTO DA EDUCAÇÃO INFANTIL – FAEI*/
SELECT nome_aluno, data_nasc, natural_de, nome_pai, nome_mae, endereco_aluno, cep_aluno, tel_aluno
FROM aluno
WHERE nome_aluno = '?';

/*Atestado de frequancia*/
SELECT aluno.nome_aluno, data_nasc, aluno.nome_mae, aluno.nome_pai, aluno.endereco_aluno, ano.nome_ano FROM aluno
inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
inner join turma on aluno_turma.turma_id_turma = turma.id_turma
inner join ano on turma.ano_id_ano = ano.id_ano
WHERE id_aluno = '?';

/*buscar turma*/
SELECT nome_turma FROM turma
WHERE nome_turma like '%?%';

/*clique em no nome da turma */
SELECT aluno.nome_aluno, turma.anoLetivo, turma.data_incio FROM aluno
inner join aluno_turma on aluno.id_aluno = aluno_turma.aluno_id_aluno
inner join turma on aluno_turma.turma_id_turma = turma.id_turma
WHERE aluno_turma.turma_id_turma = '?';

/*Clique em aluno*/
SELECT turma.nome_turma, turma.anoLetivo, aluno_turma.id_aluno_turma FROM turma 
inner join aluno_turma on turma.id_turma = aluno_turma.turma_id_turma
WHERE aluno_turma.aluno_id_aluno = '?';

/* clique em gerar boletim  */
SELECT notas1 as "1º Trimestre" , frequencia1 as "faltas", notas2 as "2º Trimestre", frequencia2 as "faltas", notas3 as "3º Trimestre", frequencia3 as "faltas", diciplina.nome_diciplina  FROM notas_diciplina
inner join diciplina on notas_diciplina.diciplina_id_diciplina = diciplina.id_diciplina
inner join aluno_turma on notas_diciplina.aluno_turma_id_aluno_turma = aluno_turma.id_aluno_turma
inner join aluno on aluno_turma.aluno_id_aluno = aluno.id_aluno
WHERE aluno_turma_id_aluno_turma = '?';

/*novo aluno, matricula*/
INSERT INTO aluno(codigo_aluno, nome_aluno, endereco_aluno, tel_aluno, cep_aluno, data_nasc, rg_aluno, natural_de, nome_pai, cpf_pai, rg_pai, endereco_pai, localtrabalho_pai, cep_pai, tel_pai, email_pai, nome_mae, endereco_mae, cpf_mae, rg_mae, cep_mae, localtrabalho_mae, tel_mae, email_mae, pessoasautorizadas, alergia, prob_saude, tipo_sangue, medicacoes, nome_medico, tel_medico, tel_urgencia, escolaano, gestacao, desenvolvimento_aluno, escolaanterior, interacaoescolar, turnointegral, almoco, restricoesalimentares, horarioestendido, atividades, matricularematricula)
VALUES('?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
/*update aluno, rematricula*/
UPDATE aluno
SET codigo_aluno = '?', nome_aluno = '?', endereco_aluno = '?', tel_aluno = '?', cep_aluno = '?', data_nasc = '?', rg_aluno = '?', natural_de = '?', nome_pai = '?', cpf_pai = '?', rg_pai = '?', endereco_pai = '?', localtrabalho_pai = '?', cep_pai = '?', tel_pai = '?', email_pai = '?', nome_mae = '?', endereco_mae = '?', cpf_mae = '?', rg_mae = '?', cep_mae = '?', localtrabalho_mae = '?', tel_mae = '?', email_mae = '?', pessoasautorizadas = '?', alergia = '?', prob_saude = '?', tipo_sangue = '?', medicacoes = '?', nome_medico = '?', tel_medico = '?', tel_urgencia = '?', escolaano = '?', gestacao = '?', desenvolvimento_aluno = '?', escolaanterior = '?', interacaoescolar = '?', turnointegral = '?', almoco = '?', restricoesalimentares = '?', horarioestendido = '?', atividades = '?', matricularematricula = '?')
WHERE id_aluno = '?';

/*criar turma*/
INSERT INTO turma (ano_id_ano, data_formacao, nome_turma, anoletivo)
VALUES ('?', '?', '?', '?' );
/*selectr ano para criação de turma*/
SELECT id_ano FROM ano
WHERE nome_ano;

/* adicionar aluno na turma */
INSERT INTO  aluno_turma(aluno_id_aluno, turma_id_turma)
VALUES ('?', '?');

/*selecionar id_aluno turma*/
SELECT id_aluno_turma FROM aluno_turma
WHERE aluno_id_aluno = '?' and turma_id_turma = '?';

/*inserir materia do aluno na turma*/
INSERT INTO notas_diciplina (aluno_turma_id_aluno_turma, diciplina_id_diciplina)
VALUES ('?', '?');


/*selecionar diciplinas do ano*/
SELECT id_diciplina FROM diciplina
WHERE ano_id_ano = '?';

/* selecionar id_ano atravez do nome */
SELECT id_ano FROM ano 
WHERE nome_ano = '?';


/*tabelas*/

/* aluno*/
CREATE TABLE aluno
(
  id_aluno serial NOT NULL,
  codigo_aluno integer,
  nome_aluno character varying(250),
  endereco_aluno character varying(250),
  tel_aluno character varying(20),
  cep_aluno character varying(20),
  data_nasc date,
  rg_aluno character varying(20),
  natural_de character varying(250),
  nome_pai character varying(250),
  cpf_pai character varying(20),
  rg_pai character varying(20),
  endereco_pai character varying(250),
  localtrabalho_pai character varying(250),
  cep_pai character varying(20),
  tel_pai character varying(20),
  email_pai character varying(250),
  nome_mae character varying(250),
  endereco_mae character varying(250),
  cpf_mae character varying(20),
  rg_mae character varying(20),
  cep_mae character varying(20),
  localtrabalho character varying(250),
  tel_mae character varying(20),
  email_mae character varying(250),
  pessoasautorizadas character varying(500),
  alergia character varying(500),
  prob_saude character varying(500),
  tipo_sangue character varying(20),
  medicacoes character varying(500),
  nome_medico character varying(250),
  tel_medico character varying(20),
  tel_urgencia character varying(500),
  escolaano character varying(500),
  gestacao character varying(500),
  desenvolvimento_aluno character varying(500),
  escolaanterior boolean,
  interacaoescolar character varying(500),
  turnointegral boolean,
  almoco boolean,
  restricoesalimentares character varying(500),
  horarioestendido boolean,
  atividades character varying(250),
  matricularematricula character varying(250),
  CONSTRAINT aluno_pkey PRIMARY KEY (id_aluno)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE aluno
  OWNER TO postgres;

/* aluno_turma*/

CREATE TABLE aluno_turma
(
  id_aluno_turma serial NOT NULL,
  aluno_id_aluno integer,
  turma_id_turma integer,
  CONSTRAINT aluno_turma_pkey PRIMARY KEY (id_aluno_turma),
  CONSTRAINT aluno_turma_aluno_id_aluno_fkey FOREIGN KEY (aluno_id_aluno)
      REFERENCES aluno (id_aluno) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE aluno_turma
  OWNER TO postgres;

  /*ano*/

CREATE TABLE ano
(
  id_ano serial NOT NULL,
  nome_ano character varying,
  CONSTRAINT ano_pkey PRIMARY KEY (id_ano)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE ano
  OWNER TO postgres;


/* diciplina */

CREATE TABLE diciplina
(
  id_diciplina serial NOT NULL,
  ano_id_ano integer,
  nome_diciplina character varying(250),
  CONSTRAINT diciplina_pkey PRIMARY KEY (id_diciplina),
  CONSTRAINT diciplina_ano_id_ano_fkey FOREIGN KEY (ano_id_ano)
      REFERENCES ano (id_ano) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE diciplina
  OWNER TO postgres;

  /*notas diciplina*/

CREATE TABLE notas_diciplina
(
  id_notas_diciplina serial NOT NULL,
  aluno_turma_id_aluno_turma integer,
  diciplina_id_diciplina integer,
  notas1 integer,
  notas2 integer,
  notas3 integer,
  frequencia1 integer,
  frequencia2 integer,
  frequencia3 integer,
  CONSTRAINT notas_diciplina_pkey PRIMARY KEY (id_notas_diciplina),
  CONSTRAINT notas_diciplina_aluno_turma_id_aluno_turma_fkey FOREIGN KEY (aluno_turma_id_aluno_turma)
      REFERENCES aluno_turma (id_aluno_turma) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT notas_diciplina_diciplina_id_diciplina_fkey FOREIGN KEY (diciplina_id_diciplina)
      REFERENCES diciplina (id_diciplina) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE notas_diciplina
  OWNER TO postgres;

/*turma*/
CREATE TABLE turma
(
  id_turma serial NOT NULL,
  ano_id_ano integer,
  data_formacao date,
  data_encerramento date,
  nome_turma character varying(20),
  anoletivo character varying(4),
  CONSTRAINT turma_pkey PRIMARY KEY (id_turma),
  CONSTRAINT turma_ano_id_ano_fkey FOREIGN KEY (ano_id_ano)
      REFERENCES ano (id_ano) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE turma
  OWNER TO postgres;
