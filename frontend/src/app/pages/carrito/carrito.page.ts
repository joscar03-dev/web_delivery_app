import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { CarritoService } from '../../services/carrito.service';
import { HttpClientModule } from '@angular/common/http';
import { CartItem } from '../../models/cart-item.model';
@Component({
  selector: 'app-carrito',
  templateUrl: './carrito.page.html',
  styleUrls: ['./carrito.page.scss'],
  standalone: true,  // Aquí declaramos que este es un componente standalone
  imports: [IonicModule, CommonModule, HttpClientModule]  // Importamos HttpClient y otros módulos necesarios
})
export class CarritoPage implements OnInit {
  itemsCarrito: CartItem[] = [];
  total = 0;

  constructor(private carritoService: CarritoService) {}

  ngOnInit() {
    this.cargarCarrito();
  }

  cargarCarrito() {
    this.carritoService.obtenerCarrito().subscribe(
      (data) => {
        this.itemsCarrito = data.items;
        this.calcularTotal();
      },
      (error) => {
        console.error('Error al cargar el carrito', error);
      }
    );
  }

  calcularTotal() {
    this.total = this.itemsCarrito.reduce((acc, item) => acc + item.precio_unitario * item.cantidad, 0);
  }

  eliminarProducto(id: number) {
    this.carritoService.eliminarProducto(id).subscribe(() => {
      this.cargarCarrito();
    });
  }
}
