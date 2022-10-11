/* Para criação de banco/base de dados */
CREATE DATABASE db_curso_web;

/* Para exclusão de banco/base de dados */
/* DROP db_curso_web; */

/* Para criação de uma nova tabela no banco de dados */
CREATE TABLE tb_cursos (
    /* not null, preenchimento obrigatório */
	id_curso int not null,
    imagem_curso varchar(100) not null,
    nome_curso char(50) not null,
    /* null, preenchimento opcional */
    resumo text null,
    data_cadastro datetime not null,
    ativo boolean default true,
    investimento float(5, 2) default 0
);

/* Para exclusão de tabela do banco de dados */
/* DROP TABLE tb_cursos; */