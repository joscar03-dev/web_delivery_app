import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';


import { MenuRoutingModule } from './menu-routing.module';
import { SliderComponent } from './componentes/slider/slider.component';
import { ListaMenuComponent } from './componentes/lista-menu/lista-menu.component';
import { CompartidoModule } from 'src/app/compartido/compartido.module';


@NgModule({
  declarations: [
    SliderComponent,
    ListaMenuComponent,
    SliderComponent
  ],
  imports: [
    CommonModule,
    MenuRoutingModule,
    CompartidoModule,
    FormsModule,
  ],
  exports: [
      SliderComponent,
      ListaMenuComponent
    ]
})
export class MenuModule { }
