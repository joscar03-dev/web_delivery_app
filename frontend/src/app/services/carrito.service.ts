import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root',
})
export class CarritoService {
  private apiUrl = 'http://127.0.0.1:8000/api';

  constructor(private http: HttpClient) {}

  addToCart(productId: number, quantity: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/cart/add`, {
      product_id: productId,
      quantity,
    });
  }

  getCart(): Observable<any> {
    return this.http.get(`${this.apiUrl}/cart`);
  }

  removeFromCart(itemId: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/cart/remove`, { item_id: itemId });
  }
}
