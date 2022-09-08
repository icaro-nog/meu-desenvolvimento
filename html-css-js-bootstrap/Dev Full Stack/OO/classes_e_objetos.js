//Notação Literal
/*
const hotel = {
    quartos: 20,
    ocupados: 2,
    piscinas: 4,
    verificarDisponibilidade: function(){
        return this.quartos - this.ocupados
    }
}

console.log("Disponíveis: " + hotel.verificarDisponibilidade())
delete hotel.piscinas
console.log("Piscinas: " + hotel.piscinas)
*/
/*

//Notação de construtor (objeto em branco)
const hotel = new Object()
hotel.quartos = 20
hotel.ocupados = 15
hotel.piscinas = 3
hotel.verificarDisponibilidade = function(){
        let res = this.quartos - this.ocupados
        return res
}

hotel.quartos = 25//Alterando a quantidade de quartos por FORA do objeto
console.log("Quartos disponíveis: " + hotel.verificarDisponibilidade())

*/

//Criando Classes (mais simples)
class Hotel {

    //No método construtor, conseguimos configurar cor, quantidade de quartos, piscinas, etc
    constructor() {
        this.quartos = 25
        this.ocupados = 20
        this.piscinas = 5
    }

    verificarDisponibilidade() {
        let res = this.quartos - this.ocupados
        return res
    }
}

//new Hotel() para armazenarmos a classe Hotel no objeto const hotel, assim GERANDO o objeto
const hotel = new Hotel()
console.log("Quartos do hotel: " + hotel.quartos)
console.log("Quartos OCUPADOS do hotel: " + hotel.verificarDisponibilidade())