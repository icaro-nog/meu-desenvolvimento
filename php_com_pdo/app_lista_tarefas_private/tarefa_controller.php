<?php
    // Requerendo as classes para criação de instâncias
    require "tarefa.model.php";
    require "tarefa.service.php";
    require "conexao.php";

    // Se houver $_GET["acao"] setado por envio do formulário nova_tarefa.php, usar $_GET["acao"]. Senão, usar a $acao setada em todas as tarefas.php
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;

    

    // Lógica para uso de $acao
    if($acao == "inserir"){
        $tarefa = new Tarefa();
        // Setando o atributo $tarefa pelo valor de $_POST["tarefa"]
        $tarefa->__set("tarefa", $_POST["tarefa"]);
        // Instância da classe Conexão para posterior passagem em $tarefaService
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        // Chamada de função para inserção de dados no banco de dados
        $tarefaService->inserir();

        header("Location: nova_tarefa.php?inclusao=1");

    } else if($acao == "recuperar"){

        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();

    } else if($acao == "atualizar"){

        $tarefa = new Tarefa();
        // Setando variáveis por meio da $_POST
        $tarefa->__set("id", $_POST["id"]);
        $tarefa->__set("tarefa", $_POST["tarefa"]);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        // Redirecionamento se $tarefaService->atualizar() for true
        if($tarefaService->atualizar()){

            if(isset($_GET["pag"]) && $_GET["pag"] == "index"){
                header("Location: index.php");
            } else{
                header("Location: todas_tarefas.php");
            }
            
        }

    } else if($acao == "remover"){

        $tarefa = new Tarefa();
        // Setando o id da tarefa recebido por meio de get em todas_tarefas.php - function remover(id)
        $tarefa->__set("id", $_GET["id"]);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        
        if(isset($_GET["pag"]) && $_GET["pag"] == "index"){
            header("Location: index.php");
        } else{
            header("Location: todas_tarefas.php");
        }

    } else if($acao == "marcarRealizada"){

        $tarefa = new Tarefa();
        $tarefa->__set("id", $_GET["id"]);
        // id_status = 2 é realizado
        $tarefa->__set("id_status", 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();

        if(isset($_GET["pag"]) && $_GET["pag"] == "index"){
            header("Location: index.php");
        } else{
            header("Location: todas_tarefas.php");
        }

    } else if($acao == "pendentes"){

        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas_pendentes = $tarefaService->pendentes();

    }

?>