import {
  Component,
  Input,
  Output,
  EventEmitter,
  NgModule,
} from '@angular/core';
import { FormatoPrecioPipe } from 'src/app/compartido/pipes/formato-precio.pipe';
interface Plato {
  id: number;
  nombre: string;
  precio: number;
  descripcion: string;
  imagen: string;
}

@Component({
  selector: 'app-slider',
  templateUrl: './slider.component.html',
  styleUrls: ['./slider.component.css'],
})
export class SliderComponent {
  @Input() platosPopulares: Plato[] = [];
  @Output() platoSeleccionado = new EventEmitter<Plato>();

  onPlatoClick(plato: Plato) {
    this.platoSeleccionado.emit(plato);
  }

  currentIndex: number = 0;
  irA(index: number) {
    this.currentIndex = index;
  }

  
  get transformStyle() {
    return `translateX(-${this.currentIndex * 100}%)`;
  } 

  siguiente() {
    if (this.currentIndex < this.platosPopulares.length - 1) {
      this.currentIndex++;
    } else {
      this.currentIndex = 0;
    }
  }

  anterior() {
    if (this.currentIndex > 0) {
      this.currentIndex--;
    } else {
      this.currentIndex = this.platosPopulares.length - 1;
    }
  }
}
