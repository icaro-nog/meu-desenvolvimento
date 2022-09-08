function verificar(){
    var data = new Date()
    var ano = data.getFullYear()
    var fano = document.getElementById(`txtano`)
    var res = document.querySelector(`div#res`)

    if(fano.value.length == 0 || Number(fano.value) > ano){
        window.alert(`[ERRO] Verifique os dados e tente novamente!`)
    }else{
        /*
        o elemento deve ser solicitado pelo atributo name="radsex", pois senão os gêneros ficam marcados ao mesmo tempo
        */
        var fsex = document.getElementsByName(`radsex`)
        var idade = ano - Number(fano.value)
        var gênero = ``
        var img = document.createElement(`img`)
        img.setAttribute(`id`, `foto`)

        if(fsex[0].checked){
            gênero = `Homem`
            if (idade >= 0 && idade < 10){
                //Criança
                img.setAttribute(`src`, `bebemenino.jpg`)
            }else if(idade < 21){
                //Jovem
                img.setAttribute(`src`, `adolescentemenino.jpg`)
            }else if(idade < 50){
                //Adulto
                img.setAttribute(`src`, `homem.jpg`)
            }else{
                //Idoso
                img.setAttribute(`src`, `idoso.jpg`)
            }
        }else if(fsex[1].checked){
            gênero = `Mulher`
            if (idade >= 0 && idade < 10){
                //Criança
                img.setAttribute(`src`, `bebemenina.jpg`)
            }else if(idade < 21){
                //Jovem
                img.setAttribute(`src`, `adolescentemenina.jpg`)
            }else if(idade < 50){
                //Adulto
                img.setAttribute(`src`, `mulher.jpg`)
            }else{
                //Idoso
                img.setAttribute(`src`, `idosa.jpg`)
            }
        }
        res.style.textAlign = `center`
        res.innerHTML = `Detectamos ${gênero} com ${idade} anos.`
        res.appendChild(img)// Exibir imagem após verificação
    }
}