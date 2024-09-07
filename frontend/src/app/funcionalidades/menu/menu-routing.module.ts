import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { SliderComponent } from './componentes/slider/slider.component';
import { ListaMenuComponent } from './componentes/lista-menu/lista-menu.component';

const routes: Routes = [
  {path: 'slide', component: SliderComponent},
  {path: 'lista-menu', component: ListaMenuComponent},

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MenuRoutingModule { }
