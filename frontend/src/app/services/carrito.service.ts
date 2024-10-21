import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root',
})
export class CarritoService {
  private apiUrl = 'https://apidelivery.up.railway.app/api';

  constructor(private http: HttpClient) {}

  addToCart(productoId: number, cantidad: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/cart/add`, {
      producto_id: productoId,
      cantidad,
    });
  }

  getCart(): Observable<any> {
    return this.http.get(`${this.apiUrl}/cart`);
  }

  removeFromCart(itemId: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/cart/remove`, { item_id: itemId });
  }
}
