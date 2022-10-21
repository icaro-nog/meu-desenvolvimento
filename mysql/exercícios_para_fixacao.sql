/*
1) Selecione todos os clientes com idade igual ou superior a 29. Os registros devem ser ordenados de
forma ascendente pela idade.
*/
-- R: 
SELECT * FROM tb_clientes WHERE idade >= 29 ORDER BY idade ASC;


/*
2) Utilize instruções do subconjunto DDL do SQL para realizar a inclusão das colunas abaixo na tabela
tb_clientes:

• Adicine a coluna “sexo” do tipo string com tamanho fixo de 1 caractere. Coluna não pode ser
vazia na inserção.
• Adicione a coluna “endereço” do tipo string com tamanho variado de até 150 caracteres. Coluna
pode ser vazia na inserção.
*/
-- R:
ALTER TABLE `tb_clientes` ADD `sexo` CHAR(1) NOT NULL ;
ALTER TABLE `tb_clientes` ADD `endereco` VARCHAR(150) NULL DEFAULT NULL ;

/*
3) Efetue um update em tb_clientes dos registros de id_cliente igual a 1, 2, 3, 6 e 7, atualizando o sexo
para “M”. Utilize a instrução IN para este fim.
*/
-- R:
-- Insert de registros
INSERT INTO tb_clientes (nome, idade, sexo, endereco) VALUES ("Marcos", 21, "F", "Restinga, Porto Alegre"), ("Gustavo", 25, "M", "Centro, Porto Alegre"), ("Márcio", 49, "F", "Olaria, Porto Alegre"), ("Márcio", 49, "M", "Bairro 3, Porto Alegre"), ("Fernanda", 49, "F", "Outro bairro, Porto Alegre"), ("William", 49, "M", "Capital, Porto Alegre");
-- Update de sexo
UPDATE tb_clientes SET sexo = "M" WHERE id_cliente IN(1, 2, 3, 6, 7);

/*
4) Efetue um update em tb_clientes dos registros de id_cliente igual a 4, 5, 8, 9 e 10, atualizando o sexo
para “F”. Como desafio, faça este update utilizando dois between’s no filtro.
*/
-- R:
UPDATE tb_clientes SET sexo = "F" WHERE id_cliente BETWEEN 4 AND 5 AND id_cliente BETWEEN 8 AND 10;

/*
5) Selecione todos os registros de tb_clientes que possuam relação com tb_pedidos e com tb_pedidos
produtos (apenas registros com relacionamentos entre si). Recupere também os detalhes dos produtos da
tabela tb_produtos. A consulta deve retornar de tb_clientes as colunas “id_cliente”, “nome”, “idade” e
de tb_produtos deve ser retornado as colunas “produto” e “valor”.
*/
-- R:
SELECT clientes.id_cliente, clientes.nome, clientes.idade, produtos.produto, produtos.valor FROM tb_produtos AS produtos, tb_clientes AS clientes INNER JOIN tb_pedidos ON(clientes.id_cliente = tb_pedidos.id_cliente) INNER JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido );
