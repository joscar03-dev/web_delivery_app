import { CommonModule } from '@angular/common';
import { Component, CUSTOM_ELEMENTS_SCHEMA, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-categories-section',
  templateUrl: './categories-section.component.html',
  styleUrls: ['./categories-section.component.scss'],
  standalone: true,
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  imports: [
    IonicModule,
    RouterModule,
    CommonModule
  ]
})
export class CategoriesSectionComponent  {
  categories = [
    { id: 'food', name: 'Comida', icon: 'restaurant-outline' },
    { id: 'liquor', name: 'Licor', icon: 'wine-outline' },
    { id: 'stores', name: 'Tiendas', icon: 'storefront-outline' },
    { id: 'services', name: 'Servicios', icon: 'construct-outline' },
  ];
}
