import { Component, OnInit } from '@angular/core';
import { RouterModule } from '@angular/router';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-featured-products',
  templateUrl: './featured-products.component.html',
  styleUrls: ['./featured-products.component.scss'],
  standalone: true,
  imports: [
    IonicModule,
    RouterModule
  ]
})
export class FeaturedProductsComponent {
  featuredProducts = [
    { id: 1, name: 'Producto 1', description: 'Descripción del producto 1', price: 10.99, image: 'assets/product1.jpg' },
    { id: 2, name: 'Producto 2', description: 'Descripción del producto 2', price: 15.99, image: 'assets/product2.jpg' },
    // Añade más productos según sea necesario
  ];
}
