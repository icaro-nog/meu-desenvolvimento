    let num = document.getElementById(`txtnum`)
    let dig = document.getElementById(`numdig`)
    let fin = document.getElementById(`finnum`)
    let res = document.querySelector(`div#res`)
    let valores = []


function adicionar(){
    /*
    A propriedade LENGTH tem como responsabilidade retornar a quantidade de caracteres de uma string ou o tamanho de um array.
    */
    if(num.value.length == 0){
        window.alert(`Por favor, digite um número!`)
    }else if(num.value <= 0){
        window.alert(`Por favor, digite um número válido!`)
    }else if(num.value > 100){
        window.alert(`Este número não está entre 0 e 100. Digite um número válido!`)
    }else{
        let n = Number(num.value)
        /*
        Number(num.value) --> serve para a var = n pegar o número valor que foi inserido anteriormente no Input
        */
        
        let item = document.createElement(`option`)
        item.text = `Valor ${n} adicionado.`
        dig.appendChild(item) //Adicionar elemento filho da let item
        res.innerHTML = ``
    }
    num.value = ``
    num.focus()
}

function finalizar(){
    if(valores.length == 0){
        window.alert(`Adicione números antes de finalizar`)
    }else{
        let tot = valores.length

        res.innerHTML = ``
        res.innerHTML += `<p>Ao todo, temos ${tot} números cadastrados.</p>`
    }

}
