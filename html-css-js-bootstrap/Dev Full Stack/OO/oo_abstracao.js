//Pilar da Abstração - trazer os objetos do mundo real ao mundo da programação
/*
Modelo, Entidade, Identidade, Características e Ações
*/

class Carro {

    constructor() {
        this.marca = "chevrolet"
        this.modelo = "prisma"
        this.cor = "vermelho"
        this.placa = "IXB - 1855"
    }
    ligar() {
        this.estado = true
    }
}

const carro = new Carro()
console.log("Carro 1 é da marca: " + carro.marca)

const carro2 = new Carro()
carro2.marca = "volkswagen"
console.log("Carro 2 é da marca: " + carro2.marca)

const carro3 = new Carro()
console.log("O carro está ligado? " + carro3.estado)