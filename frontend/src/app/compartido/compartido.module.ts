import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormatoPrecioPipe } from './pipes/formato-precio.pipe';
import { ModalDetallePlatoComponent } from './componentes/modal-detalle-plato/modal-detalle-plato.component';
import { EfectoHoverDirective } from './directivas/efecto-hover.directive';
import { ModalPedidoComponent } from './componentes/modal-pedido/modal-pedido.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    FormatoPrecioPipe,
    ModalDetallePlatoComponent,
    EfectoHoverDirective,
    ModalPedidoComponent,
    ModalPedidoComponent
  ],
  imports: [
    CommonModule,
    FormsModule
  ],
  exports: [
    FormatoPrecioPipe,
    ModalDetallePlatoComponent,
    ModalPedidoComponent
    
  ]
})
export class CompartidoModule { }
