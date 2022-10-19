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

-- Inserção de registros com relacionamento Muitos para Muitos (mais de uma imagem relacionada ao mesmo id_produto)
INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(1, "notebook_1.jpg"), (1, "notebook_2.jpg"), (1, "notebook_3.jpg");

INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(2, "smarttv_1.jpg"), (2, "smarttv_2.jpg"), (2, "smarttv_3.jpg");

INSERT INTO tb_imagens(id_produto, url_imagem) VALUES(3, "smartphone_1.jpg");