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


/*
4) Efetue um update em tb_clientes dos registros de id_cliente igual a 4, 5, 8, 9 e 10, atualizando o sexo
para “F”. Como desafio, faça este update utilizando dois between’s no filtro.
*/
-- R:

/*
5) Selecione todos os registros de tb_clientes que possuam relação com tb_pedidos e com tb_pedidos
produtos (apenas registros com relacionamentos entre si). Recupe também os detalhes dos produtos da
tabela tb_produtos. A consulta deve retornar de tb_clientes as colunas “id_cliente”, “nome”, “idade” e
de tb_produtos deve ser retornado as colunas “produto” e “valor”.
*/
-- R:
