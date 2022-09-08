//TRADICIONAL
function fatorial(n){
    let fat = 1
    for(let c = n; c > 1; c--){
        /*
        Essas duas são iguais, apenas escritas de maneira diferentes 
        */
        fat *= c 
        fat = fat * c//Ele fará fat*1 = fat*4 = fat*3 = fat*2 = fat*1 = fat
            /* 
            Neste caso, c = n = 5. fat*5 ou 1*5 = 5, fat*4 ou 5*4 = 20, fat*3 ou 20*3 = 60, fat*2 ou 60*2 = 120 e fat*1 ou 120*1 ----> fat == 120
            */
    }
    return fat
}

console.log(fatorial(5))

// 5! = 5 x 4 x 3 x 2 x 1 = 120