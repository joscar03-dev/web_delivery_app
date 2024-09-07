import { Component, EventEmitter, Input, Output } from '@angular/core';
interface Plato {
  id: number;
  nombre: string;
  precio: number;
  descripcion: string;
  imagen: string;
}
@Component({
  selector: 'app-modal-detalle-plato',
  templateUrl: './modal-detalle-plato.component.html',
  styleUrls: ['./modal-detalle-plato.component.css']
})
export class ModalDetallePlatoComponent {
  @Input() plato!: Plato;
  @Output() cerrarModal = new EventEmitter<void>();

  onClose() {
    this.cerrarModal.emit(); // Emitimos un evento para cerrar el modal
  }
}
