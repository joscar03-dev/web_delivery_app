import { Component, CUSTOM_ELEMENTS_SCHEMA, OnInit } from '@angular/core';
import { register } from 'swiper/element/bundle';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { NegocioService } from 'src/app/services/negocio.service';
import { HttpClientModule } from '@angular/common/http';



register();

@Component({
  selector: 'app-featured-carousel',
  templateUrl: './featured-carousel.component.html',
  styleUrls: ['./featured-carousel.component.scss'],
  standalone: true,
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  imports: [IonicModule, CommonModule, HttpClientModule], // Solo si estás usando standalone components
})
export class FeaturedCarouselComponent implements OnInit {
  featuredItems: any[] = [];
  
  constructor(private negocioService: NegocioService) {}

  ngOnInit() {
    this.loadNegocios();
  }

  // Cargar los negocios desde la API
  loadNegocios() {
    this.negocioService.getNegocios().subscribe(
      (data) => {
        this.featuredItems = data.data; // Accede al array 'data' de la respuesta estandarizada
      },
      (error) => {
        console.error('Error al cargar los negocios:', error);
      }
    );
  }
}
