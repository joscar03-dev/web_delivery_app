import { CommonModule } from '@angular/common';
import { Component, CUSTOM_ELEMENTS_SCHEMA, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { IonicModule } from '@ionic/angular';
import { NegocioService } from 'src/app/services/negocio.service';
import { TiposNegociosService } from 'src/app/services/tipos-negocios.service';

export interface Negocio {
  id: number;
  nombre: string;
  imagen: string | null;
  telefono: string;
  email: string;
  hora_apertura: string;
  hora_cierre: string;
  estado: string; // 'Abierto' o 'Cerrado'
  // Otras propiedades que devuelva tu API
  platos?: Plato[];
}
export interface Plato {
  id: number;
  nombre: string;
  descripcion: string;
  precio: string;
  imagen: string;
}

@Component({
  selector: 'app-categories-section',
  templateUrl: './categories-section.component.html',
  styleUrls: ['./categories-section.component.scss'],
  standalone: true,
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  imports: [
    IonicModule,
    RouterModule,
    CommonModule, 
    RouterModule
  ]
})
/* export class CategoriesSectionComponent implements OnInit {
  tiposNegocios: any[] = [];

  constructor(private tiposNegociosService: TiposNegociosService) {}

  ngOnInit() {
    this.loadTiposNegocios();
  }

  loadTiposNegocios() {
    this.tiposNegociosService.getTiposNegocios().subscribe(
      (data) => {
        this.tiposNegocios = data;
      },
      (error) => {
        console.error('Error al cargar los tipos de negocios:', error);
      }
    );
  }
  getIcon(nombre: string): string {
    switch (nombre.toLowerCase()) {
      case 'comida':
        return 'restaurant';
      case 'licor':
        return 'wine';
      case 'tiendas':
        return 'cart';
      case 'servicios':
        return 'construct';
      default:
        return 'help-circle';
    }
  }
} */
  export class CategoriesSectionComponent implements OnInit {
    tiposNegocios: any[] = [];
    negocios: any[] = [];
  
    constructor(
      private tiposNegociosService: TiposNegociosService,
      private negociosService: NegocioService
    ) {}
  
    ngOnInit() {
      this.loadTiposNegocios(); // Carga las categorías al inicio
      this.loadNegociosAbiertos();
    }
  
    loadTiposNegocios() {
      this.tiposNegociosService.getTiposNegocios().subscribe(
        (data) => {
          this.tiposNegocios = data;
        },
        (error) => {
          console.error('Error al cargar los tipos de negocios:', error);
        }
      );
    }
    getIcon(nombre: string): string {
      switch (nombre.toLowerCase()) {
        case 'comida':
          return 'restaurant';
        case 'licor':
          return 'wine';
        case 'tiendas':
          return 'cart';
        case 'servicios':
          return 'construct';
        default:
          return 'help-circle';
      }
    }
  
    // Este método se ejecuta cuando se selecciona una categoría
    onCategoriaClick(tipoNegocioId: number) {
      this.negociosService.getNegocios(tipoNegocioId).subscribe(
        (data) => {
          this.negocios = data; // Asignar los negocios filtrados a la variable negocios
          console.log('Negocios filtrados:', data);
        },
        (error) => {
          console.error('Error al cargar los negocios:', error);
        }
      );
    }

    loadNegociosAbiertos() {
      this.negociosService.getNegocios().subscribe(
        (data) => {
          
          // Filtrar solo los negocios abiertos
          this.negocios = data.filter(negocios => negocios.estado === 'Abierto');
          
        },
        (error) => {
          console.error('Error al cargar los negocios abiertos:', error);
        }
      );
    }
  }