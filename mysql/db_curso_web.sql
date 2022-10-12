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

/* CHAR - aloca um tamanho fixo no disco, se foi definido que será de 10 posições, é alocado 10 posições para o recebimento de dados. Vantagem: Mais rápido para pesquisas - Desvantagem: se mau utilizado, pode pesar o disco de armazenamento */
/* VARCHAR - aloca um tamanho variável no disco, se foi definido como 10 posições, mas o dado contem 4 posições, ele apenas utilizará 4 posições. Vantagem: Ocupa menos espaço em disco - Desvantagem: maior lentidão em pesquisas */