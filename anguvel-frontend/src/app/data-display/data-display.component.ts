import { Component, OnInit, inject, PLATFORM_ID, Inject } from '@angular/core';
import { CommonModule, isPlatformBrowser } from '@angular/common'; // Importante para SSR
import { ApiService } from '../api.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-data-display',
  standalone: true,
  imports: [CommonModule, FormsModule], // HttpClientModule ya no es necesario aquí si usas provideHttpClient
  templateUrl: './data-display.component.html',
  styleUrl: './data-display.component.scss'
})
export class DataDisplayComponent implements OnInit {
  private apiService = inject(ApiService);
  // Inyectamos el ID de la plataforma para saber si estamos en el navegador
  private platformId = inject(PLATFORM_ID);

  resources: string[] = [
    'usuarios',
    'consulta_proyectos',
    'gestion_tributaria_pagos',
    'reporte_incidencias',
    'seguridad_ciudadana',
    'tramites_licencias'
  ];
  
  selectedResource: string = this.resources[0];
  data: any[] = [];
  loading: boolean = false;
  error: string | null = null;

  ngOnInit(): void {
    // ESTO ES CLAVE: Solo ejecuta la carga inicial si estamos en el cliente (browser)
    if (isPlatformBrowser(this.platformId)) {
      this.fetchData();
    }
  }

  fetchData(): void {
    this.loading = true;
    this.error = null;
    this.data = []; // Limpiamos datos anteriores al cambiar

    this.apiService.getAll(this.selectedResource).subscribe({
      next: (response: any) => {
        // Validación de datos: Laravel suele enviar { data: [] } o []
        if (Array.isArray(response)) {
          this.data = response;
        } else if (response && response.data && Array.isArray(response.data)) {
          this.data = response.data;
        } else {
          this.data = [];
        }
        
        this.loading = false;
        console.log('Datos cargados para:', this.selectedResource, this.data);
      },
      error: (err) => {
        console.error('Error fetching data:', err);
        this.error = `Error: No se pudo conectar con el recurso "${this.selectedResource}".`;
        this.loading = false;
      }
    });
  }
}