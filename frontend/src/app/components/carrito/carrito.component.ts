import { Component, OnInit } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CarritoService } from 'src/app/services/carrito.service';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-carrito',
  templateUrl: './carrito.component.html',
  styleUrls: ['./carrito.component.scss'],
  standalone: true, // Componente independiente
  imports: [RouterModule, CommonModule, IonicModule], // Importar el módulo de rutas
})
export class CarritoComponent implements OnInit {
  cartItems: any[] = [];

  constructor(private cartService: CarritoService) {}

  ngOnInit() {
    this.loadCart();
  }

  loadCart() {
    this.cartService.getCart().subscribe({
      next: (res) => {
        this.cartItems = res.items;
      },
      error: (err) => {
        console.error(err);
      },
    });
  }

  removeFromCart(itemId: number) {
    this.cartService.removeFromCart(itemId).subscribe({
      next: () => {
        this.loadCart(); // Recargar el carrito después de eliminar
      },
      error: (err) => {
        console.error(err);
      },
    });
  }

  // Obtener la cantidad total de productos en el carrito
  getTotalQuantity(): number {
    return this.cartItems.reduce((total, item) => total + item.cantidad, 0);
  }

  // Obtener el monto total a pagar
  getTotalAmount(): number {
    return this.cartItems.reduce((sum, item) => {
      const totalPorProducto = item.cantidad * item.precio_unitario;
      return sum + totalPorProducto;
    }, 0);
  }
}

