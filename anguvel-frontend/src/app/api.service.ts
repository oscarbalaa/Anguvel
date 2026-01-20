import { Injectable, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  // URL base de tu API de Laravel.
  // ¡Asegúrate de que tu servidor Laravel se esté ejecutando y sea accesible en esta URL!
  private apiUrl = 'http://127.0.0.1:8000/api'; 

  private http = inject(HttpClient);

  /**
   * Método de ejemplo para obtener datos.
   * Reemplaza 'datos' con el endpoint real de tu API.
   * @returns Un Observable con los datos de la API.
   */
  public getDatos(): Observable<any> {
    // Ejemplo de petición GET a http://127.0.0.1:8000/api/datos
    return this.http.get<any>(`${this.apiUrl}/datos`);
  }

  // Aquí puedes añadir más métodos para otras operaciones (POST, PUT, DELETE, etc.)
  // Por ejemplo:
  //
  // public crearDato(dato: any): Observable<any> {
  //   return this.http.post<any>(`${this.apiUrl}/datos`, dato);
  // }
}