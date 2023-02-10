import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  constructor(private navegacao: NavController) {}

  public pesquisa: String = ""
  public resultado: String = ""
  public titulo: String = "Meu primeiro App"
  public imagemRandomica: String = "https://source.unsplash.com/random/100x100"
  public imagemLocal: String = "../assets/icone-celular.png"

  recuperar() {
    this.resultado = this.pesquisa
  }

  abrirBotoes() {
    this.navegacao.navigateForward('botoes')
  }

  abrirLista() {
    this.navegacao.navigateForward('lista')
  }
  

  public atualiza(): void {
    this.titulo = "Texto alterado"
  }

  public acao(): void {
    this.titulo = "Botão clicado"
  }

}
