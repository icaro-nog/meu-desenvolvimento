function gerartab(){
    var num = document.getElementById(`txttab`)
    var tab = document.getElementById(`seltab`)//para o usuário poder selecionar a tabuada depois de feita, clicar nela

   if(num.value.length == 0){//se o campo for vazio
       window.alert(`Por favor, digite um número!`)
   }else{
        var n = Number(num.value)//Number(value.num) -> pega o VALOR digitado

        var c = 1//irá definir o ponto de início dos multiplicadores de 1 a 10

        tab.innerHTML = ``// limpar o campo das tabuadas inseridas anteriormente
        while(c <= 10){
            var item = document.createElement(`option`)//criar elementos no campo option no html
            item.text = `${n} x ${c} = ${n*c}`//exibir texto com as variáveis
            tab.appendChild(item)//elemento que exibe o item da tabuada para o usuário poder clicar
            c++//para a var = c incrementar até 10
        }
   }

}