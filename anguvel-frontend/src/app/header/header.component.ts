import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterLinkActive, Router } from '@angular/router'; // Import Router
import { AuthService } from '../auth/auth.service'; // Import AuthService
import { Subscription } from 'rxjs'; // Import Subscription

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [CommonModule, RouterLink, RouterLinkActive],
  templateUrl: './header.component.html',
  styleUrl: './header.component.scss'
})
export class HeaderComponent implements OnInit, OnDestroy { // Implement OnInit and OnDestroy
  appName = 'Municipalidad de Nuevo Chimbote';
  navItems = [
    { label: 'Inicio', path: '/' },
    { label: 'Trámites y Licencias', path: '/tramites-licencias' },
    { label: 'Gestión Tributaria', path: '/gestion-tributaria' },
    { label: 'Seguridad Ciudadana', path: '/seguridad-ciudadana' },
    { label: 'Reporte de Incidencias', path: '/reporte-incidencias' },
    { label: 'Consultas de Proyectos', path: '/consultas-proyectos' },
  ];

  isAuthenticated: boolean = false;
  private authSubscription: Subscription = new Subscription();

  constructor(private authService: AuthService, private router: Router) { } // Inject AuthService and Router

  ngOnInit(): void {
    this.authSubscription = this.authService.isAuthenticated$.subscribe(
      (status) => {
        this.isAuthenticated = status;
      }
    );
  }

  ngOnDestroy(): void {
    this.authSubscription.unsubscribe();
  }

  onLogout(): void {
    this.authService.logout();
  }
}
