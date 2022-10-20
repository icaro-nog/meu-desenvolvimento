/* Criação de banco de dados Loja Virtual */
CREATE DATABASE db_loja_virtual;

-- Criação de tabela tb_produtos
CREATE TABLE tb_produtos(
	id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    produto VARCHAR(200) NOT NULL,
    valor FLOAT(8, 2) NOT NULL
);

-- Criação de tabela tb_descricoes_tecnicas
CREATE TABLE tb_descricoes_tecnicas(
    -- ID de descrição técnica com AUTO_INCREMENT
	id_descricao_tecnica INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- ID do produto sendo referenciado em FOREIGN KEY(id_produto), não possibilitando a criação de uma descrição de um produto com ID INEXISTENTE***
    id_produto INT NOT NULL,
    descricao_tecnica TEXT NOT NULL,
    -- Referenciação de id_produto, vindo da tb_produtos
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto)
);

-- Inserção de Querys necessárias em tb_produtos
-- Nesta inserção, não é necessário especificar o id_produto, pois ele está como auto increment, sendo criado automaticamente após cada inserção
INSERT INTO tb_produtos(produto, valor) VALUES ('Notebook Dell Inspiron Ultrafino Intel Core i7, 16GB RAM e 240GB SSD', 3500.00);

INSERT INTO tb_produtos(produto, valor) VALUES ('Smart TV LED 40" Samsung Full HD 2 HDMI 1 USB Wi-Fi Integrado', 1475.54);

INSERT INTO tb_produtos(produto, valor) VALUES ('Smartphone LG K10 Dual Chip Android 7.0 4G Wi-Fi Câmera de 13MP', 629.99);

-- Inserção de Querys necessárias em tb_descricoes_tecnicas
-- Nesta inserção, é necessário especificar o id_produto, pois ele está como PRIMARY KEY em tb_produtos, fazendo a relação entre tabelas
INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (1, 'O novo Inspiron Dell oferece um design elegante e tela infinita que amplia seus sentidos, mantendo a sofisticação e medidas compactas...');

INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (2, 'A smart TV da Samsung possui tela de 40" e oferece resolução Full HD, imagens duas vezes melhores que TVs HDs padrão...');

INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (3, 'Saia da mesmice. O smartphone LG está mais divertido, rápido, fácil, cheio de selfies e com tela HD de incríveis 5,3"...');

-- Criação de tb_imagens
CREATE TABLE tb_imagens(
	id_imagem INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    -- Referenciação de id_produto, vindo da tb_produtos
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto),
    url_imagem VARCHAR(200) NOT NULL
)

-- Inserção de registros com relacionamento Um para Muitos (mais de uma imagem relacionada ao mesmo id_produto)
INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(1, "notebook_1.jpg"), (1, "notebook_2.jpg"), (1, "notebook_3.jpg");

INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(2, "smarttv_1.jpg"), (2, "smarttv_2.jpg"), (2, "smarttv_3.jpg");

INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(3, "smartphone_1.jpg");

-- Criação de tb_clientes
CREATE TABLE tb_clientes(
	id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    idade INT(3) NOT NULL
)

-- Criação de tb_pedidos
CREATE TABLE tb_pedidos(
	id_pedido INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL, 
    -- Referenciação de id_cliente, vindo da tb_clientes, para que seja possível identificar qual cliente que realizou o pedido
    FOREIGN KEY(id_cliente) REFERENCES tb_clientes(id_cliente),
    data_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
)

-- Criação de tb_pedidos_produtos - Para ser possível identificar o id_pedido junto do id_produto
CREATE TABLE tb_pedidos_produtos( 
    id_pedido INT NOT NULL, 
    -- Referenciação de id_pedido, vindo da tb_pedidos
    FOREIGN KEY(id_pedido) REFERENCES tb_pedidos(id_pedido), 
    id_produto INT NOT NULL, 
    -- Referenciação de id_produto, vindo da tb_produtos
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto) 
)

-- Inserção de cliente
INSERT INTO tb_clientes(nome, idade) VALUES("Jorge", 29)

-- Inserção de id_cliente em tb_pedido
INSERT INTO tb_pedidos(id_cliente) VALUES(1)

-- Inserção de id_pedido e id_produto em tb_pedidos_produtos
INSERT INTO tb_pedidos_produtos(id_pedido, id_produto) VALUES(1, 2)
-- Inserção de mais um produto no mesmo id_pedido anterior
INSERT INTO tb_pedidos_produtos(id_pedido, id_produto) VALUES(1, 3)

-- Inserção de novo pedido, relacionado ao mesmo id_cliente anterior
INSERT INTO tb_pedidos(id_cliente) VALUES(1)
-- Inserção de id_pedido e id_produto em tb_pedidos_produtos -  id_cliente 1 fez outro pedido (id_pedido 3) com id_produto 3
INSERT INTO tb_pedidos_produtos(id_pedido, id_produto) VALUES(2, 3)

-- Inserção de cliente
INSERT INTO tb_clientes(nome, idade) VALUES("Jamilton", 20)

-- Inserção de id_cliente 2 em tb_pedido
INSERT INTO tb_pedidos(id_cliente) VALUES(2)

-- Inserção de novo pedido, relacionado id_cliente 2
INSERT INTO tb_pedidos_produtos(id_pedido, id_produto) VALUES(3, 1)

-- Junção à esquerda com LEFT JOIN
-- Selecionar tudo de tb_pedidos com tudo de tb_clientes, relacionando a forma como serão exibidas id_cliente de uma e id_cliente da outra
SELECT * FROM tb_clientes LEFT JOIN tb_pedidos ON (tb_clientes.id_cliente = tb_pedidos.id_cliente)

-- Selecionar tudo de tb_produtos com tudo de tb_imagens, relacionando a forma como serão exibidas id_produto de uma e id_produto da outra 
SELECT * FROM tb_produtos LEFT JOIN tb_imagens ON(tb_produtos.id_produto = tb_imagens.id_produto)

-- Junção a direita com RIGHT JOIN
-- RIGTH torna a tabela a DIREITA como prioritária, mostrando apenas os registros que existam (NULL não é retornado)
SELECT * FROM tb_clientes RIGHT JOIN tb_pedidos ON (tb_clientes.id_cliente = tb_pedidos.id_cliente)

-- Junção interna com INNER JOIN
-- Inserção de novo produto
INSERT INTO tb_produtos(produto, valor) VALUES("HD Externo Portátil Seagate Expansion 1TB USB 3.0", 274.90)

-- Seleção apenas para comparação
SELECT * FROM tb_pedidos LEFT JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido)

-- Selecionar tudo de tb_pedidos com tudo de tb_pedidos_produtos e tudo de tb_produtos, tabela prioritária é tb_pedidos
SELECT * FROM tb_pedidos LEFT JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido) LEFT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produto)

-- Selecionar tudo de tb_pedidos com tudo de tb_pedidos_produtos e com tudo de tb_produtos, tabela prioritária é tb_pedidos_produtos
SELECT * FROM tb_pedidos RIGHT JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido) LEFT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produto);

-- Selecionar tudo de tb_pedidos com tudo de tb_pedidos_produtos e com tudo de tb_produtos, tabela prioritária é tb_produtos
SELECT * FROM tb_pedidos RIGHT JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido) RIGHT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produto);

-- Retorna apenas os registros que houverem relação entre sí nas duas tabelas
SELECT * FROM tb_pedidos INNER JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido)

-- Retorna apenas os registros que houverem relação entre sí nas três tabelas
SELECT * FROM tb_pedidos INNER JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido) INNER JOIN tb_produtos ON(tb_pedidos_produtos.id_produto = tb_produtos.id_produto)

-- Apelidando tabelas com ALIAS - AS
SELECT * FROM tb_produtos LEFT JOIN tb_descricoes_tecnicas ON(tb_produtos.id_produto = tb_descricoes_tecnicas.id_produto)

-- AS
SELECT * FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON(p.id_produto = dt.id_produto)

-- Selecionando colunas específicas com o AS
SELECT p.id_produto, p.produto, p.valor, dt.descricao_tecnica FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON(p.id_produto = dt.id_produto)

-- Selecionando colunas específicas com AS referenciado e valor maior ou igual a 500
SELECT p.id_produto, p.produto, p.valor, dt.descricao_tecnica FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON(p.id_produto = dt.id_produto) WHERE p.valor >= 500

-- Selecionando colunas específicas com AS referenciado e valor maior ou igual a 500 e ordenando de forma crescente
SELECT p.id_produto, p.produto, p.valor, dt.descricao_tecnica FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON(p.id_produto = dt.id_produto) WHERE p.valor >= 500 ORDER BY p.valor ASC