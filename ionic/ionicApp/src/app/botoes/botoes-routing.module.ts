import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { BotoesPage } from './botoes.page';

const routes: Routes = [
  {
    path: '',
    component: BotoesPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class BotoesPageRoutingModule {}
