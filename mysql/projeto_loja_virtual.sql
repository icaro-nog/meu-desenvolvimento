/* Criação de banco de dados Loja Virtual */
CREATE DATABASE db_loja_virtual;
-- Criação de tabela tb_produtos
CREATE TABLE tb_produtos(
	id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    produto VARCHAR(200) NOT NULL,
    valor FLOAT(8, 2) NOT NULL
);
-- 
CREATE TABLE tb_descricoes_tecnicas(
    -- ID de descrição técnica com AUTO_INCREMENT
	id_descricao_tecnica INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- ID do produto sendo referenciado em FOREIGN KEY(id_produto), não possibilitando a criação de uma descrição de um produto com ID INEXISTENTE***
    id_produto INT NOT NULL,
    descricao_tecnica TEXT NOT NULL,
    -- Referenciação de id_produto, vindo da tb_produtos
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto)
);