<?php
  /* Passagem de script validador_acesso.php para proteger página, se login não tiver sido feito */
  require_once "validador_acesso.php";
?>
<?php

  // Array de chamados
  $chamados = [];

  // Abrir registro_chamado.hd
  $arquivo = fopen("registro_chamado.hd", "r");

  // Percorrer o arquivo, enquanto houver registros(linhas) a serem recuperadas
  // feof() -> Find End Of File -> Procura pelo fim do arquivo
  // feof() -> Lê a primeira linha do arquivo, retorna false para a função pq não encontrou o final do arquivo, por isso está sendo usado "!". Após ler a primeira linha, passa para a segunda e assim segue...
  while(!feof($arquivo)){
    // fgets() -> Recupera o que estiver na linha de registro_chamado.hd até a quebra de linha
    $registro = fgets($arquivo);
    // Listar de forma dinâmica em arrays o registro_chamado.hd
    $chamados[] = $registro;

  }

  // Fechar o registro_chamado.hd aberto
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <!-- Imprimir o card no html a cada array $chamado criado -->
              <?php foreach($chamados as $chamado) { ?>
              
                <?php 
                  // Remover "#" dos arrays
                  $chamado_dados = explode("#", $chamado);

                  // Se a quantidade de índices for menor que 3 em $chamado_dados, não irá imprimir
                  if(count($chamado_dados) < 3){
                    continue;
                  }
                ?>
                
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <!-- Imprimir $chamado_dados[] por índice -->
                    <h5 class="card-title"> <?php echo $chamado_dados[0]; ?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $chamado_dados[1]; ?> </h6>
                    <p class="card-text"> <?php echo $chamado_dados[2]; ?> </p>

                  </div>
                </div>

              <?php } ?>
              <!-- Fim do foreach() PHP -->
              
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>