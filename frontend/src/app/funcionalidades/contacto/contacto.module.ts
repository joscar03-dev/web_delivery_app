import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ContactoRoutingModule } from './contacto-routing.module';
import { FormularioContactoComponent } from './formulario-contacto/formulario-contacto.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [
    FormularioContactoComponent
  ],
  imports: [
    CommonModule,
    ContactoRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  exports: [
    FormularioContactoComponent
  ]
})
export class ContactoModule { }
