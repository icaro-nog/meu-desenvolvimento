/* Criação de uma nova tabela no banco de dados */
CREATE TABLE php_com_pdo (
    
);

/* Criação de tabela tb_usuarios se não existir */
create table if not exists tb_usuarios(
    id int not null primary key auto_increment,
    nome varchar(50) not null,
    email varchar(100) not null,
    senha varchar(32) not null
)

/* Inserção de dados em tb_usuarios */
insert into tb_usuarios(
    nome, email, senha 
) values(
    'Jorge Sant Ana', 'jorge@teste.com.br', '123456'
)

/* Remoção de todos os dados de tb_usuarios */
delete from tb_usuarios
