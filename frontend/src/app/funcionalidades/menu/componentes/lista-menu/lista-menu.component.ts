import { Component, OnInit } from '@angular/core';
import { PlatoService } from '../../../../nucleo/servicios/plato.service';

interface Plato {
  id: number;
  nombre: string;
  precio: number;
  imagen: string;
  descripcion: string;
}

@Component({
  selector: 'app-lista-menu',
  templateUrl: './lista-menu.component.html',
  styleUrls: ['./lista-menu.component.css'],
})
export class ListaMenuComponent implements OnInit {
  platosPopulares: Plato[] = [];

  constructor(private platoService: PlatoService) {}

  ngOnInit(): void {
    // Llamar al servicio para obtener los platos de la API
    this.platoService.getPlatos().subscribe(
      (data) => {
        this.platosPopulares = data;  // Guardar los datos recibidos en la variable
      },
      (error) => {
        console.error('Error al obtener los platos:', error);
      }
    );
  }

  platos: Plato[] = [];
  platoSeleccionado: Plato | null = null;
  modalVisible: boolean = false;
  modalParaPedidoVisible: boolean = false;

  // Variables para el pedido
  direccion: string = '';
  cantidad: number = 1;
  total: number = 0;
  conCuantoPaga: number = 0;
  metodoPago: string = 'yape';

  mostrarDetallesPlato(plato: Plato) {
    this.cerrarModal(); // Cierra cualquier otro modal
    this.platoSeleccionado = plato;
    this.modalVisible = true; // Abre el modal de detalles
  }

  seleccionarPlato(plato: Plato): void {
    this.cerrarModal(); // Cierra cualquier otro modal
    this.platoSeleccionado = plato;
    this.modalParaPedidoVisible = true; // Abre el modal para hacer pedido
    this.cantidad = 1;
    this.calcularTotal();
  }

  calcularTotal(): void {
    if (this.platoSeleccionado) {
      this.total = this.platoSeleccionado.precio * this.cantidad;
    }
  }

  cerrarModal(): void {
    this.modalVisible = false;
    this.modalParaPedidoVisible = false;
    this.platoSeleccionado = null;
    this.direccion = '';
    this.cantidad = 1;
    this.total = 0;
    this.conCuantoPaga = 0;
    this.metodoPago = 'yape';
  }

  hacerPedido(): void {
    if (
      !this.direccion ||
      !this.cantidad ||
      this.total <= 0 ||
      this.conCuantoPaga <= 0
    ) {
      alert('Por favor, completa todos los campos.');
      return;
    }

    console.log('Pedido:', {
      plato: this.platoSeleccionado,
      direccion: this.direccion,
      cantidad: this.cantidad,
      total: this.total,
      conCuantoPaga: this.conCuantoPaga,
      metodoPago: this.metodoPago,
    });

    this.cerrarModal();
  }
}
