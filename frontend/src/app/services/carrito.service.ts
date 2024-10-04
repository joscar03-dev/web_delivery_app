import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root',
})
export class CarritoService {
  private apiUrl = 'http://localhost:8000/api/carrito';

  constructor(private http: HttpClient, private authService: AuthService) {}

  obtenerCarrito(): Observable<any> {
    return this.http.get(`${this.apiUrl}`);
  }

  agregarProducto(producto: { productoId: number; cantidad: number; precio: number }): Observable<any> {
    // Obtenemos el token desde el AuthService
    const token = this.authService.getToken();
    const headers = new HttpHeaders().set('Authorization', `Bearer ${token}`);

    console.log(this.authService.getToken());
    // Enviamos la solicitud con el token JWT en la cabecera
    return this.http.post(`${this.apiUrl}/add`, producto, { headers });
  }

  eliminarProducto(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/remove/${id}`);
  }
}
