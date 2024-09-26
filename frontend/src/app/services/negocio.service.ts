import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Negocio } from '../components/categories-section/categories-section.component';

@Injectable({
  providedIn: 'root'
})
export class NegocioService {
  private apiUrl = 'http://localhost:8000/api/negocios';  // URL de la API Laravel

  constructor(private http: HttpClient) {}

  // Obtener todos los negocios (con opción de filtrar por tipo)
  getNegocios(tipoNegocioId?: number): Observable<Negocio[]> {
    let url = this.apiUrl;
    
    // Si se proporciona el parámetro tipoNegocioId, añadirlo a la URL como query string
    if (tipoNegocioId) {
      url += `?tipo_negocio_id=${tipoNegocioId}`;
    }
    
    return this.http.get<Negocio[]>(url)
  }

  // Obtener un negocio específico
  getNegocioById(id: number): Observable<any> {
    const url = `${this.apiUrl}/${id}`;
    return this.http.get<Negocio[]>(url)
  }

  // Obtener las categorías de un negocio
  getCategoriasByNegocio(negocioId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/negocios/${negocioId}/categorias`);
  }

  // Obtener los productos de una categoría
  getProductosByCategoria(categoriaId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/categorias/${categoriaId}/productos`);
  }
}
