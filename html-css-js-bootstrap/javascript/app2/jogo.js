let altura = 0
let largura = 0
let vidas = 1
let tempo = 10

let criaMosquitoTempo = 1500

let nivel = window.location.search
nivel = nivel.replace("?", "")

if(nivel === "normal"){
    //1500
    criaMosquitoTempo = 1500
}else if(nivel === "dificil"){
    //1000
    criaMosquitoTempo = 1000
}else if( nivel === "chucknorris"){
    //750
    criaMosquitoTempo = 750
}

function ajustaTamanhoPalcoJogo(){
    altura = window.innerHeight
    largura = window.innerWidth

    console.log(altura, largura)
}

ajustaTamanhoPalcoJogo()

let cronometro = setInterval(function(){
    
    tempo -= 1
    if(tempo < 0){
        //clearInterval -> limpando a function da memória e não fazendo com que o Alert seja exibido repetidamente
        clearInterval(cronometro)
        //clearInterval -> limpando a function da memória e não fazendo com que o mosquito randomico não seja masi exibido
        clearInterval(criaMosquito)
        window.location.href = "vitoria.html"
    }else{
        //innerHTML -> tudo que está dentro da tag HTML
        document.getElementById("cronometro").innerHTML = tempo  
    }
    
}, 1000)

function posicaoRandomica(){

    //remover o mosquito anterior (caso exista) o if recupera a existencia do Id
    if(document.getElementById("mosquito")){
        document.getElementById("mosquito").remove()

        if(vidas > 3){
            window.location.href = "fim_de_jogo.html"

        }else{
            document.getElementById("v" + vidas).src = "imagens/coracao_vazio.png"

            vidas++
        }
    }
    // - 90 para o eixo do mosquito.png não exceder o tamanho total da tela, - 90 dá margem aos mosquito.png
    var posicaoX = Math.floor(Math.random() * largura) - 90
    var posicaoY = Math.floor(Math.random() * altura) - 90

    //operadores ternários para que a posição randômica não seja 0:0 e o mosquito.png não "suma" da tela
    posicaoX = posicaoX < 0 ? 0 : posicaoX
    posicaoY = posicaoY < 0 ? 0 : posicaoY

    console.log(posicaoX, posicaoY)

    //criar o elemento no .html
    var mosquito = document.createElement("img")
    //alterando e atribuindo .css por JS
    mosquito.src = "imagens/mosquito.png"
    //espaço entre as classes, para não ocorrer erro de concatenação
    mosquito.className = tamanhoAleatorio() + " " +  ladoAleatorio()
    mosquito.style.left = posicaoX + "px"
    mosquito.style.top = posicaoY + "px"
    mosquito.style.position = "absolute"
    mosquito.id = "mosquito"
    mosquito.onclick = function(){
        this.remove()
    }

    //appendChild para criar uma tag filha da tag BODY
    document.body.appendChild(mosquito)

}

function tamanhoAleatorio(){
    let classe = Math.floor(Math.random() * 3)
    console.log(classe)

    switch(classe){
        case 0:
            return "mosquito0"

        case 1:
            return "mosquito1"

        case 2:
            return "mosquito2"
    }
}

function ladoAleatorio(){
    let classe = Math.floor(Math.random() * 2)
    console.log(classe)

    switch(classe){
        case 0:
            return "ladoA"

        case 1:
            return "ladoB"
    }
}