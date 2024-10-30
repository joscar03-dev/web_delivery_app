import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
  standalone: true,
  imports: [IonicModule],
})
export class HeaderComponent {
  userLocation: string = '';

  constructor() {}

  getCurrentLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          this.userLocation = `Latitud: ${lat}, Longitud: ${lng}`;
        },
        (error) => {
          console.error('Error obteniendo la ubicación', error);
          this.userLocation = 'No se pudo obtener la ubicación';
        }
      );
    } else {
      this.userLocation = 'Geolocalización no soportada por el navegador';
    }
  }
}
