let nomes = [
    "nome1",
    "nome2",
    "nome3",
    "nome4",
    "nome5",
    "nome6",
    "nome7",
    "nome8",
    "nome9"
  ]

  function pesquisarNome() {

    let pesquisaNome = document.getElementById("campoPesquisa").value
    let itemLista = ""

    for(indice in nomes) {

      let nome = nomes[indice]
      if(pesquisaNome == nome) {
        itemLista += ` <li class="list-group-item">${nome}</li> `
        document.getElementById("lista").innerHTML = itemLista

      }
      
    }

  }

  function carregarNomes() {

    let itensLista = ""

    for(indice in nomes) {
      let nome = nomes[indice]
      itensLista += ` <li class="list-group-item">${nome}</li> `

    }

    document.getElementById("lista").innerHTML = itensLista
  }

