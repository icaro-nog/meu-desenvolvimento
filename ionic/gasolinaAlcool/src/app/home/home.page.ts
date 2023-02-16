import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  constructor() {}

  public resultado: string = "Resultado"
  public precoAlcool: string = ""
  public precoGasolina: string = ""

  calcular(){

    // Validar se os campos foram preenchidos
    if( this.precoAlcool && this.precoGasolina ){
      var pAlcool = parseFloat(this.precoGasolina)
      var pGasolina = parseFloat(this.precoAlcool)

      var res = pAlcool/pGasolina
      if(res >= 0.7){
        this.resultado = "Melhor utilizar Gasolina"
      }else{
        this.resultado = "Melhor utilizar Álcool"
      }
      
    }else{
      this.resultado = "Não preenchido"
    }

  }

}
