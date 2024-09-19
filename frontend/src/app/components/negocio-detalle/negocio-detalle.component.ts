import { Component, OnInit } from '@angular/core';
import { NegocioService } from '../../services/negocio.service';
import { ActivatedRoute, RouterModule } from '@angular/router';
import { Negocio } from '../categories-section/categories-section.component';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-negocio-detalle',
  templateUrl: './negocio-detalle.component.html',
  styleUrls: ['./negocio-detalle.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, RouterModule],
  providers: [NegocioService],
})
export class NegocioDetalleComponent implements OnInit {
  negocio: Negocio | undefined;
  constructor(
    private route: ActivatedRoute,
    private negocioService: NegocioService
  ) {}

  ngOnInit() {
    const id = this.route.snapshot.paramMap.get('id');

    if (id) {
      this.loadNegocio(parseInt(id, 10));
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
}
