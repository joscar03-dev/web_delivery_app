import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TiposNegociosService {

  private apiUrl = 'https://apidelivery.up.railway.app/api/tipos-negocios';

  constructor(private http: HttpClient) {}

  getTiposNegocios(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }
}
