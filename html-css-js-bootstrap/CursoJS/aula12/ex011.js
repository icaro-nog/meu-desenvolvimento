var idade = 64
if(idade < 16){
    console.log(`Não vota`)
}else if(idade < 18 || idade > 65){
    console.log(`Voto opcional`)
}else{
    console.log(`Voto Obrigatório`)
}

/*
! Operador lógico NÃO (Logical NOT)
|| Operador lógico OU (Logical OR)
&& Operador lógico E (Logical AND)
*/

//Outras formas de pensar a lógica de programação

/*
var idade = 18
if(idade < 16){
    console.log(`Não vota`)
}else{
    if(idade >= 16 && idade < 18){
        console.log(`Voto opcional`)
    }
}

//_______________________________

var idade = 18
if(idade < 16){
    console.log(`Não vota`)
}else{
    if(idade < 18){
        console.log(`Voto opcional`)
    }
}
*/