create table tb_produtos (
	id int not null primary key auto_increment,
	descricao varchar(200) not null,
	preco float(8,2) not null
);

insert into tb_produtos(descricao, preco)values('Sofá', 1250.75);
insert into tb_produtos(descricao, preco)values('Cadeira', 378.99);
insert into tb_produtos(descricao, preco)values('Cama', 870.75);
insert into tb_produtos(descricao, preco)values('Notebook', 1752.49);
insert into tb_produtos(descricao, preco)values('Smartphone', 999.99);