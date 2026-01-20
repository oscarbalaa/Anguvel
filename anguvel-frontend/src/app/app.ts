import { Component, OnInit, inject, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
import { ApiService } from './api.service';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, CommonModule],
  templateUrl: './app.html',
  styleUrl: './app.scss'
})
export class App implements OnInit {
  protected readonly title = signal('anguvel-frontend');
  
  protected readonly data = signal<any | null>(null);
  protected readonly error = signal<any | null>(null);

  private readonly apiService = inject(ApiService);

  ngOnInit(): void {
    this.apiService.getConsultaProyectos().subscribe({
      next: (response) => {
        this.data.set(response);
        console.log('Datos de Consulta Proyectos recibidos:', response);
      },
      error: (err) => {
        this.error.set(err);
        console.error('Error al obtener datos de Consulta Proyectos:', err);
      }
    });
  }
}