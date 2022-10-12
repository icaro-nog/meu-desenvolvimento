/* Criação de banco/base de dados */
CREATE DATABASE db_curso_web;

/* Exclusão de banco/base de dados */
DROP db_curso_web;

/* Criação de uma nova tabela no banco de dados */
CREATE TABLE tb_cursos (
    /* not null, preenchimento obrigatório */
	id_curso int not null,
    imagem_curso varchar(100) not null,
    nome_curso char(50) not null,
    /* null, preenchimento opcional */
    resumo text null,
    data_cadastro datetime not null,
    ativo boolean default true,
    /* Um número de ponto flutuante. O número total de dígitos é especificado em size. O número de dígitos após a vírgula é especificado no parâmetro d. -> float(size, d) */
    investimento float(5, 2) default 0
);

/* Exclusão de tabela do banco de dados */
DROP TABLE tb_cursos;

/* CHAR - aloca um tamanho fixo no disco, se foi definido que será de 10 posições, é alocado 10 posições para o recebimento de dados. Vantagem: Mais rápido para pesquisas - Desvantagem: se mau utilizado, pode pesar o disco de armazenamento */
/* VARCHAR - aloca um tamanho variável no disco, se foi definido como 10 posições, mas o dado contem 4 posições, ele apenas utilizará 4 posições. Vantagem: Ocupa menos espaço em disco - Desvantagem: maior lentidão em pesquisas */

/* Renomear tabela */
RENAME TABLE 'nome_atual' TO 'nome_novo';

/* Incluindo, editando e removendo colunas de tabelas */
/* Incluir coluna na tabela */
ALTER TABLE tb_cursos ADD COLUMN carga_horaria varchar(5) NOT NULL;

/* Editar coluna na tabela */
ALTER TABLE tb_cursos CHANGE carga_horaria carga_hora INT(5) NULL;

/* Remover coluna na tabela */
ALTER TABLE tb_cursos DROP carga_horaria;

/* Inserindo dados na tabela */
INSERT INTO tb_cursos(ativo, carga_horaria, data_cadastro, id_curso, imagem_curso, investimento, nome_curso, resumo) values(1, 35, "2022-10-12 14:08:22", 2, "curso_angular.jpg", 575.86, "Web Completo com JS, TS e Angular", "Aprenda a criar aplicações front-end incríveis com JavaScript, TypeScript e Angular");

/* Consultar colunas da tabela */
SELECT "coluna_tal", "outra_coluna_tal" FROM tb_cursos;
/* Consultar todas as colunas da tabela */
SELECT * FROM tb_cursos;