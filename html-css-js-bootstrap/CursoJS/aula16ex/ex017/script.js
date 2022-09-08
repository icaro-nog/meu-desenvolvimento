function tabuada(){
    var num = document.getElementById(`txtnum`)
    var tab = document.getElementById(`seltab`)

    /*
    A propriedade LENGTH tem como responsabilidade retornar a quantidade de caracteres de uma string ou o tamanho de um array.
    */
    if(num.value.length == 0){
        window.alert(`Por favor, digite um número!`)
    }else{
        var n = Number(num.value)
        /*
        Number(num.value) --> serve para a var = n pegar o número valor que foi inserido anteriormente no Input
        */
        var c = 1// é a varivel dos multiplicadores de 1 a 10

        tab.innerHTML = ``//para limpar o campo 
        //c <= 10 para ele chegar até o dígito 10 e encerrar a tabuada
        while(c <= 10){
            var item = document.createElement(`option`)
            item.text = `${n} x ${c} = ${n*c}`
            item.value = `tab${c}`
            tab.appendChild(item)//adicionar elemento filho da var item
            c++
        }
        
    }
    


}