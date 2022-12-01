<?php

	// Se clicar em Todas as Tarefas, a $acao será setada como "recuperar"
	$acao = "pendentes";
	require "tarefa_controller.php";

	/*
	echo "<pre>";
	print_r($tarefas_pendentes);
	echo "</pre>";
	*/
	
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>

			function editar(id, txt_tarefa){
				
				// Criar um formulário de edição
				let form = document.createElement("form")
				form.action = "index.php?pag=index&acao=atualizar"
				form.method = "post"
				form.className = "row"

				// Criar um input para entrada
				let inputTarefa = document.createElement("input")
				inputTarefa.type = "text"
				inputTarefa.name = "tarefa"
				inputTarefa.className = "col-9 form-control"
				inputTarefa.value = txt_tarefa

				// Criar um input hidden para guardar o id da tarefa
				let inputId = document.createElement("input")
				inputId.type = "hidden"
				inputId.name = "id"
				// Definindo id que foi passado por parâmetro a tag <script>
				inputId.value = id

				// Criar um button para envio do formulário
				let button = document.createElement("button")
				button.type = "submit"
				button.className = "col-3 btn btn-info"
				button.innerHTML = "Atualizar"

				// Inclusão de inputTarefa no formulário
				form.appendChild(inputTarefa)

				// Incluir inputId no formulário
				form.appendChild(inputId)

				// Incluir button no formulário
				form.appendChild(button)

				// Teste
				//console.log(form)

				// Selecionar div tarefa pelo id recebido por parâmetro
				let tarefa = document.getElementById("tarefa_" + id)

				// Limpar texto da tarefa para inclusão do form
				tarefa.innerHTML = ""

				// Inclusão do form na página
				// O insertBefore() método insere um nó filho antes de um filho existente.
				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id){
				// Parâmetro pag = index para ser redirecionado a página index.php após function
				location.href = "index.php?pag=index&acao=remover&id="+id;
			}

			function marcar_realizada(id){
				// Parâmetro pag = index para ser redirecionado a página index.php após function
				location.href = "index.php?pag=index&acao=marcarRealizada&id="+id;
			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<!-- Foreach para percorrer o array $tarefas_pendentes vindo de require "tarefa_controller.php" -->
								<?php foreach($tarefas_pendentes as $indice => $tarefa){ ?>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<!-- id da tag de acordo com o id do banco de dados -->
									<div class="col-sm-9" id="tarefa_<?php echo $tarefa->id ?>">
										<?php echo $tarefa->tarefa ?>
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?php echo $tarefa->id ?>)"></i>

											<!-- editar(id, txt_tarefa) inteiro e string -->
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?php echo $tarefa->id ?>, '<?php echo $tarefa->tarefa ?>')"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="marcar_realizada(<?php echo $tarefa->id ?>)"></i>
																			
									</div>
								</div>

								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>