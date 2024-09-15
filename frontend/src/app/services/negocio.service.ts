import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class NegocioService {
  private apiUrl = 'http://localhost:8000/api/negocios';  // URL de la API Laravel

  constructor(private http: HttpClient) {}

  // Obtener todos los negocios (con opción de filtrar por tipo)
  getNegocios(tipoNegocioId?: number): Observable<any> {
    let url = this.apiUrl;
    
    // Si se proporciona el parámetro tipoNegocioId, añadirlo a la URL como query string
    if (tipoNegocioId) {
      url += `?tipo_negocio_id=${tipoNegocioId}`;
    }
    
    return this.http.get<any>(url);
  }

  // Obtener un negocio específico
  getNegocioById(id: number): Observable<any> {
    const url = `${this.apiUrl}/${id}`;
    return this.http.get<any>(url);
  }
}
