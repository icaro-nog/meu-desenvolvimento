create table usuarios(
    id int not null primary key auto_increment,
    nome varchar(100) not null,
    email varchar(150) not null,
    senha varchar(32) not null
)