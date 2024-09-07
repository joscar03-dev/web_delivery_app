import { Component, Input, Output, EventEmitter } from '@angular/core';

interface Plato {
  id: number;
  nombre: string;
  precio: number;
  imagen: string;
  descripcion: string;
}

@Component({
  selector: 'app-modal-pedido',
  templateUrl: './modal-pedido.component.html',
  styleUrls: ['./modal-pedido.component.css']
})
export class ModalPedidoComponent {
  @Input() platoSeleccionado: Plato | null = null;
  @Input() cantidad: number = 1;
  @Input() direccion: string = '';
  @Input() total: number = 0;
  @Input() conCuantoPaga: number = 0;
  @Input() metodoPago: string = 'yape';
  @Output() cerrarModal: EventEmitter<void> = new EventEmitter<void>();
  @Output() hacerPedido: EventEmitter<void> = new EventEmitter<void>();

  calcularTotal(): void {
    if (this.platoSeleccionado) {
      this.total = this.platoSeleccionado.precio * this.cantidad;
    }
  }

  onCerrarModal(): void {
    this.cerrarModal.emit();
  }

  onHacerPedido(): void {
    this.hacerPedido.emit();
  }
}
