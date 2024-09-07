import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

interface Plato {
  id: number;
  nombre: string;
  descripcion: string;
  precio: number;
  imagen: string;
  categoria_id: number;
  
}
@Injectable({
  providedIn: 'root',
})
export class PlatoService {
  private urlPlatos = 'http://127.0.0.1:8000/api/platos';

  constructor(private http: HttpClient) {}

  //obtener platos
  getPlatos(): Observable<Plato[]> {
    return this.http.get<Plato[]>(this.urlPlatos);
  }

  // Método para actualizar un plato
  /* updatePlato(plato: Plato): Observable<Plato> {
    return this.http.put<Plato>(`${this.urlPlatos}/${plato.id}`, plato);
  } */
}
