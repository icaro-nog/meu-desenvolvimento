/* Criação de banco/base de dados */
CREATE DATABASE db_curso_web;

/* Exclusão de banco/base de dados */
DROP db_curso_web;

/* Criação de uma nova tabela no banco de dados */
CREATE TABLE tb_cursos (
    /* not null, preenchimento obrigatório */
	id_curso int not null,
    imagem_curso varchar(100) not null,
    nome_curso char(50) not null,
    /* null, preenchimento opcional */
    resumo text null,
    data_cadastro datetime not null,
    ativo boolean default true,
    /* Um número de ponto flutuante. O número total de dígitos é especificado em size. O número de dígitos após a vírgula é especificado no parâmetro d. -> float(size, d) */
    investimento float(5, 2) default 0
);

/* Exclusão de tabela do banco de dados */
DROP TABLE tb_cursos;

/* CHAR - aloca um tamanho fixo no disco, se foi definido que será de 10 posições, é alocado 10 posições para o recebimento de dados. Vantagem: Mais rápido para pesquisas - Desvantagem: se mau utilizado, pode pesar o disco de armazenamento */
/* VARCHAR - aloca um tamanho variável no disco, se foi definido como 10 posições, mas o dado contem 4 posições, ele apenas utilizará 4 posições. Vantagem: Ocupa menos espaço em disco - Desvantagem: maior lentidão em pesquisas */

/* Renomear tabela */
RENAME TABLE 'nome_atual' TO 'nome_novo';

/* Incluindo, editando e removendo colunas de tabelas */
/* Incluir coluna na tabela */
ALTER TABLE tb_cursos ADD COLUMN carga_horaria varchar(5) NOT NULL;

/* Editar coluna na tabela */
ALTER TABLE tb_cursos CHANGE carga_horaria carga_hora INT(5) NULL;

/* Remover coluna na tabela */
ALTER TABLE tb_cursos DROP carga_horaria;

/* Inserindo dados na tabela */
INSERT INTO tb_cursos(ativo, carga_horaria, data_cadastro, id_curso, imagem_curso, investimento, nome_curso, resumo) values(1, 35, "2022-10-12 14:08:22", 2, "curso_angular.jpg", 575.86, "Web Completo com JS, TS e Angular", "Aprenda a criar aplicações front-end incríveis com JavaScript, TypeScript e Angular");

/* Consultar colunas da tabela */
SELECT "coluna_tal", "outra_coluna_tal" FROM tb_cursos;
/* Consultar todas as colunas da tabela */
SELECT * FROM tb_cursos;

/* Site para criação de dados em massa para testagem: https://generatedata.com/ */
/* Criação de nova tabela com dados aleatórios tb_alunos */
CREATE TABLE tb_alunos (
  id_aluno int,
  nome varchar(255) default NULL,
  idade int default NULL,
  interesse varchar(255) default NULL,
  email varchar(255) default NULL,
  estado varchar(255) default NULL
);

INSERT INTO `tb_alunos` (`id_aluno`,`nome`,`idade`,`interesse`,`email`,`estado`) VALUES (1,"Jorden",47,"Esporte","vel.mauris.Integer@nec.net","DF"),(2,"Lacey",59,"Jogos","ligula.eu.enim@egetlaoreetposuere.com","SC"),(3,"Lillith",48,"Saúde","Curabitur@atvelitCras.org","MA"),(4,"Zephania",63,"Saúde","erat.vitae@loremtristiquealiquet.net","RS"),(5,"Scarlett",95,"Informática","facilisis.Suspendisse.commodo@placeratCrasdictum.org","MS"),(6,"Nash",39,"Música","Aliquam@Maurisquisturpis.org","BA"),(7,"Indigo",62,"Informática","mus.Proin@laoreet.co.uk","GO"),(8,"Bernard",77,"Esporte","ut@Craspellentesque.net","PA"),(9,"Cheyenne",78,"Música","vel.pede@liberoduinec.co.uk","PR"),(10,"Nerea",88,"Música","non@facilisisvitae.edu","PB"),(11,"Lucius",57,"Esporte","eu.erat@interdum.ca","PE"),(12,"Fallon",38,"Saúde","risus@Etiamimperdietdictum.net","MT"),(13,"Steven",35,"Música","tellus@netus.org","CE"),(14,"Paul",37,"Música","sollicitudin.adipiscing@magnaCras.edu","GO"),(15,"Bradley",31,"Música","massa.Vestibulum@vitaesemperegestas.com","AP"),(16,"Jeanette",46,"Informática","vitae@accumsannequeet.co.uk","MG"),(17,"Craig",40,"Informática","magna.et.ipsum@tellusid.edu","MS"),(18,"Maia",94,"Esporte","ac@tempusnon.co.uk","PB"),(19,"Harriet",16,"Jogos","ante.ipsum@maurissitamet.com","AL"),(20,"Finn",99,"Informática","metus.vitae@vitaerisusDuis.com","MT"),(21,"Rafael",71,"Esporte","adipiscing.elit.Etiam@vel.edu","MG"),(22,"Cynthia",85,"Esporte","Donec.nibh.Quisque@Sed.org","RN"),(23,"Evelyn",13,"Informática","lacus.Aliquam.rutrum@etrutrumeu.edu","MA"),(24,"Sybil",39,"Saúde","semper@nuncsed.com","ES"),(25,"Uriel",10,"Esporte","semper.pretium.neque@eumetusIn.ca","PB");
INSERT INTO `tb_alunos` (`id_aluno`,`nome`,`idade`,`interesse`,`email`,`estado`) VALUES (26,"Dakota",99,"Esporte","ipsum@etrutrumnon.co.uk","PB"),(27,"Stewart",31,"Saúde","natoque.penatibus.et@inhendrerit.org","CE"),(28,"Cruz",96,"Saúde","Cum.sociis.natoque@elementumloremut.org","RS"),(29,"Kadeem",57,"Informática","consectetuer@faucibusleoin.net","MS"),(30,"Wyatt",36,"Música","feugiat.non@dolorsitamet.net","SC"),(31,"Griffith",28,"Jogos","Lorem@elementumsem.com","RO"),(32,"Yvette",39,"Saúde","mauris@dignissim.com","RO"),(33,"Burton",14,"Esporte","leo.elementum.sem@arcuVestibulumante.edu","SC"),(34,"Tatum",4,"Saúde","eget.lacus@nequeInornare.com","PA"),(35,"Graham",88,"Informática","ac@necurna.com","ES"),(36,"Aretha",37,"Esporte","malesuada.augue@Nunc.com","ES"),(37,"Sloane",5,"Saúde","parturient@purusMaecenaslibero.net","CE"),(38,"Uriel",81,"Saúde","Praesent.interdum@enimnon.net","AL"),(39,"Cameran",61,"Esporte","sem.consequat@senectus.com","PR"),(40,"Chiquita",8,"Jogos","nisl.Quisque@utodio.co.uk","MA"),(41,"Tanek",40,"Esporte","nonummy@lectusNullamsuscipit.org","AL"),(42,"Bruno",3,"Jogos","semper.Nam@atpretium.ca","DF"),(43,"Winter",14,"Jogos","Quisque.nonummy@dolorNulla.ca","RS"),(44,"Jacob",82,"Música","nec.eleifend.non@sapien.ca","RR"),(45,"Kuame",98,"Esporte","placerat@ametorci.ca","PR"),(46,"Orli",74,"Saúde","eu.erat.semper@dolorsitamet.co.uk","ES"),(47,"Amber",24,"Informática","eleifend.non@quamvelsapien.org","AL"),(48,"Roary",77,"Saúde","quis.pede.Suspendisse@Duisa.com","SE"),(49,"Octavius",28,"Jogos","euismod.in.dolor@posuere.edu","PA"),(50,"Isabella",54,"Informática","eu@euarcuMorbi.ca","RR");
INSERT INTO `tb_alunos` (`id_aluno`,`nome`,`idade`,`interesse`,`email`,`estado`) VALUES (51,"Driscoll",70,"Informática","sem@malesuada.com","SP"),(52,"Brendan",45,"Informática","arcu.et.pede@magna.com","SC"),(53,"Quon",18,"Informática","elit@adipiscingnon.org","AP"),(54,"Rajah",48,"Informática","magna.tellus@Quisquefringilla.org","RJ"),(55,"Lewis",32,"Informática","faucibus@vulputate.com","PA"),(56,"Ronan",34,"Esporte","tellus.non@eleifend.com","CE"),(57,"Baxter",72,"Esporte","enim.sit@urnanec.ca","DF"),(58,"Kyla",6,"Esporte","facilisis.eget@sociosquadlitora.net","AM"),(59,"Ava",54,"Jogos","velit@acmattis.edu","RN"),(60,"Leonard",59,"Música","fermentum.arcu@consequatenim.ca","MS"),(61,"Byron",17,"Música","Pellentesque.habitant.morbi@sapienNunc.edu","MT"),(62,"Roary",52,"Jogos","nec.eleifend.non@velvenenatis.org","GO"),(63,"Amery",89,"Informática","mauris.aliquam.eu@Proindolor.net","PA"),(64,"Adele",40,"Saúde","scelerisque@velvenenatisvel.com","RR"),(65,"Ronan",14,"Saúde","posuere.cubilia@Donecnonjusto.co.uk","RJ"),(66,"Marny",53,"Saúde","convallis.in.cursus@blanditatnisi.com","PA"),(67,"Camden",31,"Música","magna@mauriseu.edu","RJ"),(68,"Yoko",13,"Música","dolor@vehiculaet.com","AM"),(69,"Ina",71,"Informática","gravida.sagittis@tempusscelerisquelorem.com","AL"),(70,"Tyler",3,"Esporte","Proin.dolor.Nulla@nascetur.org","PI"),(71,"Destiny",19,"Saúde","augue.id@elementum.edu","MG"),(72,"Glenna",82,"Jogos","dui@interdumligula.ca","AP"),(73,"Buffy",55,"Esporte","dictum.eu@placeratvelitQuisque.net","MA"),(74,"Hashim",27,"Música","est.congue@enim.org","MA"),(75,"Hiram",67,"Saúde","nunc.sit.amet@nibhPhasellus.co.uk","RN");
INSERT INTO `tb_alunos` (`id_aluno`,`nome`,`idade`,`interesse`,`email`,`estado`) VALUES (76,"Kenneth",50,"Esporte","a.nunc.In@Integermollis.edu","AL"),(77,"Ariel",9,"Jogos","Etiam.vestibulum.massa@egestas.edu","PA"),(78,"Barrett",24,"Informática","fringilla.mi@liberoIntegerin.com","PA"),(79,"Kato",25,"Música","cursus.in.hendrerit@eu.org","BA"),(80,"Lance",50,"Saúde","Nullam@necurna.net","CE"),(81,"Porter",50,"Jogos","ultrices.mauris@nequesed.org","PA"),(82,"Zeus",26,"Informática","hymenaeos@Integereu.net","RR"),(83,"Oleg",36,"Informática","Nam@morbitristiquesenectus.ca","AL"),(84,"Erin",25,"Saúde","ligula@Nullam.edu","TO"),(85,"Wade",61,"Esporte","odio.Aliquam.vulputate@egestas.edu","MS"),(86,"Ross",92,"Música","tortor.at.risus@ac.edu","DF"),(87,"Martina",24,"Música","Cras@lacusAliquam.com","MS"),(88,"Rowan",75,"Saúde","erat@afelisullamcorper.com","RO"),(89,"Aristotle",22,"Esporte","at.auctor@Utnecurna.net","PI"),(90,"Bernard",24,"Saúde","placerat.orci.lacus@vitaesemperegestas.edu","RJ"),(91,"Teegan",9,"Música","id@Fuscealiquam.co.uk","DF"),(92,"Graiden",7,"Jogos","ante.dictum@nibhAliquam.co.uk","AL"),(93,"Alec",50,"Música","vestibulum.neque.sed@nislQuisque.co.uk","PE"),(94,"Savannah",61,"Jogos","odio.a.purus@nequeSedeget.co.uk","ES"),(95,"Rafael",45,"Informática","a@dolorsit.net","PB"),(96,"Clementine",32,"Saúde","dictum@Aliquamerat.edu","RS"),(97,"Tasha",53,"Esporte","in@justoProin.co.uk","AC"),(98,"Hector",83,"Música","Class.aptent@et.co.uk","AM"),(99,"Tara",95,"Jogos","Donec.porttitor.tellus@nonfeugiat.co.uk","DF"),(100,"Charissa",50,"Informática","orci@elementumduiquis.ca","AP");

/* Fim /Criação de nova tabela com dados aleatórios tb_alunos */

/* Filtros com operadores de comparação */
SELECT * FROM `tb_alunos` WHERE idade > 30;
SELECT * FROM `tb_alunos` WHERE idade >= 25;
SELECT * FROM `tb_alunos` WHERE interesse > "Jogos";

/* Filtros com operadores lógicos */
SELECT * FROM `tb_alunos` WHERE interesse = "Jogos" AND idade > 45 AND estado = "RN";
SELECT * FROM `tb_alunos` WHERE interesse = "Jogos" AND idade > 45;
SELECT * FROM `tb_alunos` WHERE interesse = "Jogos" OR idade > 45;

/* Filtros com o operador BETWEEN */
SELECT * FROM `tb_alunos` WHERE idade BETWEEN 18 AND 25;
SELECT * FROM `tb_alunos` WHERE data BETWEEN "25-10-2022" AND "12-01-2035";

/* Filtros com o operador IN e NOT IN */
-- SELECT * FROM `tb_alunos` WHERE interesse = "Jogos" OR interesse = "Esporte" OR interesse = "Música"; --
SELECT * FROM `tb_alunos` WHERE interesse IN("Jogos", "Esporte", "Música");
/* NOT IN para retornar apenas onde o interesse NÃO É "Jogos", "Esporte", "Música" */
SELECT * FROM `tb_alunos` WHERE interesse NOT IN("Jogos", "Esporte", "Música");

/* Filtros com o operador LIKE */
SELECT * FROM `tb_alunos` WHERE nome LIKE "Evelyn";
-- Nomes terminados com a letra "e" 
SELECT * FROM `tb_alunos` WHERE nome LIKE "%e";
-- Nomes que comecem com -> qualquer conjunto de caracteres "e" qualquer conjunto de caracteres <-
SELECT * FROM `tb_alunos` WHERE nome LIKE "%e%";
-- Nomes que comecem com a letra "C"
SELECT * FROM `tb_alunos` WHERE nome LIKE "C%";
-- Um único caractere terminando com "riel"
SELECT * FROM `tb_alunos` WHERE nome LIKE "_riel";
-- Um único caractere "ru" um único caractere
SELECT * FROM `tb_alunos` WHERE nome LIKE "_ru_";
-- Caracteres aleatórios "tt" e um único caractere ao final
SELECT * FROM `tb_alunos` WHERE nome LIKE "%tt_";

/* Ordenando resultados */
-- Idade entre 18 e 59 anos e nome em ordem alfabética abc...
SELECT * FROM `tb_alunos` WHERE idade BETWEEN 18 AND 59 ORDER BY nome ASC;
-- Idade entre 18 e 59 anos e nome em ordem alfabética descrescente zyx...
SELECT * FROM `tb_alunos` WHERE idade BETWEEN 18 AND 59 ORDER BY nome DESC;
-- Idade entre 18 e 59 anos e nome em ordem alfabética descrescente zyx...
SELECT * FROM `tb_alunos` WHERE idade BETWEEN 18 AND 59 ORDER BY nome ASC, idade DESC, estado ASC;

/* Limitando retorno de resultados */
SELECT * FROM `tb_alunos` LIMIT 25;
-- id início de 100 até 76
SELECT * FROM `tb_alunos` ORDER BY id_aluno DESC LIMIT 25;
-- partindo do id 0, listagem de 4 registros
SELECT * FROM `tb_alunos` LIMIT 4 OFFSET 0;
-- partindo do id 8, listagem de 4 registros (forma mais enxuta)
SELECT * FROM `tb_alunos` LIMIT 8, 4;

/* Funções de agregação parte 1: MIN, MAX e AVG */
-- Retorna o investimento MÍNIMO de tb_cursos
SELECT MIN(investimento) FROM `tb_cursos`;
-- Retorna o investimento MÍNIMO de tb_cursos de um curso ATIVO
SELECT MIN(investimento) FROM `tb_cursos` WHERE ativo = true;
-- Retorna o investimento MÁXIMO de tb_cursos de um cursto ATIVO
SELECT MAX(investimento) FROM `tb_cursos` WHERE ativo = true;
-- Retorna o investimento MÉDIO de tb_cursos de cursos ativos
SELECT AVG(investimento) FROM `tb_cursos` WHERE ativo = true;

/* Funções de agregação parte 2: SUM e COUNT */
-- Retorna a soma de todos os valores de investimento de tb_cursos
SELECT SUM(investimento) FROM `tb_cursos`;
-- Retorna a quantidade de todos os registros ativos de tb_cursos -> 4
SELECT COUNT(*) FROM `tb_cursos` WHERE ativo = true;
-- Retorna a quantidade de todos os registros inativos de tb_cursos -> 1
SELECT COUNT(*) FROM `tb_cursos` WHERE ativo = false;