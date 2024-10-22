import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { catchError, Observable, tap } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private apiUrl = 'http://127.0.0.1:8000/api';

  constructor(private http: HttpClient) {}

  login(email: string, password: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/login`, { email, password });
  }

  register(data: any): Observable<any> {
    return this.http.post(`${this.apiUrl}/register`, data);
  }

  logout(): Observable<any> {
    // Obtener el token del localStorage
    const token = localStorage.getItem('token');

    // Configurar el encabezado con el token si existe
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`
    });

    console.log(localStorage.getItem('token'));

    return this.http.post(`${this.apiUrl}/logout`, {});
  }

  getUser(): Observable<any> {
    return this.http.get(`${this.apiUrl}/user`);
  }
}
