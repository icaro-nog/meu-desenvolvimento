/* Criação de tabela de usuários */
create table usuarios(
    id int not null primary key auto_increment,
    nome varchar(100) not null,
    email varchar(150) not null,
    senha varchar(32) not null
)

/* Transformando senhas em hashes de 32 caracteres */
UPDATE usuarios SET senha = md5(senha) WHERE id IN(1, 2);

/* Criação de tabela para tweets */
CREATE TABLE tweets(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    if_usuario int not null,
    tweet varchar(140) not null,
    data datetime DEFAULT CURRENT_TIMESTAMP
)

/* Criação de tabela usuarios_seguidores */
create TABLE usuarios_seguidores(
	id int not null primary key AUTO_INCREMENT,
    id_usuario int not null,
    id_usuario_seguindo int not null
)