import { Component, OnInit } from '@angular/core';
import { CarritoService } from 'src/app/services/carrito.service';

@Component({
  selector: 'app-carrito',
  templateUrl: './carrito.component.html',
  styleUrls: ['./carrito.component.scss'],
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
}
