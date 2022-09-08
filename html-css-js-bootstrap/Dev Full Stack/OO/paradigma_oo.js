//Paradigma -> exemplo de padrão a ser seguido, não se trata de uma linguagem, mas a forma como você soluciona problemas usando uma linguagem de programação

//Javascript é multi paradigma

/*
//Procedural seria apenas uma função padrão que se refere a um objeto, mas não é necessariamente um objeto**

//Procedural
//Funções manipulam dados
function verificarDisponibilidade(quartos, ocupados) {
    let res = quartos - ocupados
    console.log("Disponíveis: " + res)
}

let quartos = 20
let ocupados = 5
verificarDisponibilidade(quartos, ocupados)
*/

//Orientado a objetos
const hotel = {
    quartos: 20,
    ocupados: 2,
    verificarDisponibilidade: function(){
        return this.quartos - this.ocupados
        
        /*
        //Pode ser feito dessa forma: 

        let res = this.quartos - this.ocupados
        console.log("Disponíveis: " + res)
        */
    }
}

console.log("Disponíveis: " + hotel.verificarDisponibilidade())

//Pode ser feito dessa forma: 
//hotel.verificarDisponibilidade()

//As duas formas irão mostrar o mesmo resultado!!!


/*
O nome do operador "." é OPERADOR DE MEMBRO
*/