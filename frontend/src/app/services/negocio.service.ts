import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Negocio } from '../components/categories-section/categories-section.component';

@Injectable({
  providedIn: 'root'
})
export class NegocioService {
  private apiUrl = 'https://deliveryapi.online/api/negocios';  // URL de la API Laravel

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
  // Obtener las categorías de un negocio por su ID
  getCategoriasByNegocio(negocioId: number): Observable<any[]> {
    const url = `${this.apiUrl}/${negocioId}/categorias`;
    return this.http.get<any[]>(url);
  }

  // Obtener los productos de una categoría por su ID
  getProductosByCategoria(categoriaId: number): Observable<any[]> {
    const url = `https://deliveryapi.online/api/categorias/${categoriaId}/productos`;
    return this.http.get<any[]>(url);
  }
  getNegociosByPage(tipoNegocioId: number, page: number, pageSize: number): Observable<any> {
    return this.http.get(`${this.apiUrl}?tipo_negocio_id=${tipoNegocioId}&page=${page}&pageSize=${pageSize}`);
  }

}
