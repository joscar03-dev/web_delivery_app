import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class CarritoService {
  private apiUrl = 'http://localhost:8000/api/carrito';

  constructor(private http: HttpClient) {}

  obtenerCarrito(): Observable<any> {
    return this.http.get(`${this.apiUrl}`);
  }

  agregarProducto(producto: { productoId: number; cantidad: number; precio: number }): Observable<any> {
    return this.http.post(`${this.apiUrl}/add`, producto);
  }

  eliminarProducto(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/remove/${id}`);
  }
}
