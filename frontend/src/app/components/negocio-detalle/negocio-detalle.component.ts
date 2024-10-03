import { Component, OnInit } from '@angular/core';
import { NegocioService } from '../../services/negocio.service';
import { ActivatedRoute, RouterModule } from '@angular/router';
import { Negocio } from '../categories-section/categories-section.component';
import { IonicModule, ToastController  } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { CarritoService } from 'src/app/services/carrito.service';
import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { AuthInterceptorService } from 'src/app/services/auth-interceptor.service';

@Component({
  selector: 'app-negocio-detalle',
  templateUrl: './negocio-detalle.component.html',
  styleUrls: ['./negocio-detalle.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, RouterModule],
  providers: [
    NegocioService, 
    CarritoService,
    {
      provide: HTTP_INTERCEPTORS,  // Aquí registras el interceptor
      useClass: AuthInterceptorService,
      multi: true
    }

  ],
})
export class NegocioDetalleComponent implements OnInit {
  negocio: Negocio | undefined;
  categorias: any[] = []; // Para almacenar las categorías del negocio
  productos: any[] = []; // Para almacenar los productos de la categoría seleccionada
  categoriaSeleccionada: number | null = null; // Para identificar la categoría seleccionada
  cantidades: { [productoId: number]: number } = {};
  constructor(
    private route: ActivatedRoute,
    private negocioService: NegocioService,
    private carritoService: CarritoService,
    private router: RouterModule,  // Para redireccionar al carrito
    private toastController: ToastController,

  ) {}

  ngOnInit() {
    const id = this.route.snapshot.paramMap.get('id');

    if (id) {
      this.loadNegocio(parseInt(id, 10));
      this.loadCategorias(parseInt(id, 10));
    }
  }

  loadNegocio(id: number) {
    this.negocioService.getNegocioById(id).subscribe(
      (data: Negocio) => {
        console.log('se carga el dato?:', id);
        this.negocio = data;
      },
      (error) => {
        console.error('Error al cargar los detalles de negocio', error);
      }
    );
  }

  loadCategorias(negocioId: number) {
    this.negocioService.getCategoriasByNegocio(negocioId).subscribe(
      (data: any) => {
        this.categorias = data;
      },
      (error) => {
        console.error('Error al cargar las categorías', error);
      }
    );
  }

  loadProductos(categoriaId: number) {
    this.categoriaSeleccionada = categoriaId;
    this.negocioService.getProductosByCategoria(categoriaId).subscribe(
      (data: any) => {
        this.productos = data;
      },
      (error) => {
        console.error('Error al cargar los productos de la categoria', error);
      }
    );
  }

    // Incrementar la cantidad del producto seleccionado
    incrementarCantidad(productoId: number) {
      if (!this.cantidades[productoId]) {
        this.cantidades[productoId] = 1;
      } else {
        this.cantidades[productoId]++;
      }
    }
  
    // Decrementar la cantidad del producto seleccionado
    decrementarCantidad(productoId: number) {
      if (this.cantidades[productoId] > 0) {
        this.cantidades[productoId]--;
      }
    }

    agregarAlCarrito(productoId: number, precio: number) {
      const cantidad = this.cantidades[productoId] || 1;  // Si no se ha seleccionado, por defecto es 1
  
      const producto = {
        productoId,
        cantidad,
        precio,
      };
  
      this.carritoService.agregarProducto(producto).subscribe(
        async () => {
          const toast = await this.toastController.create({
            message: 'Producto agregado al carrito',
            duration: 2000,
            color: 'success'
          });
          toast.present();
        },
        async (error) => {
          const toast = await this.toastController.create({
            message: 'Error al agregar producto al carrito',
            duration: 2000,
            color: 'danger'
          });
          toast.present();
          console.error('Error al agregar producto al carrito', error);
        }
      );
    }
}
