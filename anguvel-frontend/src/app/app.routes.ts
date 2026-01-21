import { Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { TramitesLicenciasComponent } from './pages/tramites-licencias/tramites-licencias.component';
import { GestionTributariaComponent } from './pages/gestion-tributaria/gestion-tributaria.component';
import { SeguridadCiudadanaComponent } from './pages/seguridad-ciudadana/seguridad-ciudadana.component';
import { ReporteIncidenciasComponent } from './pages/reporte-incidencias/reporte-incidencias.component';
import { ConsultasProyectosComponent } from './pages/consultas-proyectos/consultas-proyectos.component';
import { UsuariosComponent } from './pages/usuarios/usuarios.component';
import { PreguntasFrecuentesComponent } from './pages/preguntas-frecuentes/preguntas-frecuentes.component';
import { MapaSitioComponent } from './pages/mapa-sitio/mapa-sitio.component';
import { PoliticaPrivacidadComponent } from './pages/politica-privacidad/politica-privacidad.component';
import { LoginComponent } from './auth/login/login.component'; // Import the LoginComponent
import { RegisterComponent } from './auth/register/register.component'; // Import the RegisterComponent
import { authGuard } from './auth/auth.guard'; // Import the AuthGuard


export const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'login', component: LoginComponent }, // Add the login route
  { path: 'register', component: RegisterComponent }, // Add the register route
  { path: 'tramites-licencias', component: TramitesLicenciasComponent, canActivate: [authGuard] }, // Protected route
  { path: 'gestion-tributaria', component: GestionTributariaComponent, canActivate: [authGuard] }, // Protected route
  { path: 'seguridad-ciudadana', component: SeguridadCiudadanaComponent, canActivate: [authGuard] }, // Protected route
  { path: 'reporte-incidencias', component: ReporteIncidenciasComponent, canActivate: [authGuard] }, // Protected route
  { path: 'consultas-proyectos', component: ConsultasProyectosComponent, canActivate: [authGuard] }, // Protected route
  { path: 'usuarios', component: UsuariosComponent, canActivate: [authGuard] }, // Protected route
  { path: 'preguntas-frecuentes', component: PreguntasFrecuentesComponent }, // Not protected, public info
  { path: 'mapa-sitio', component: MapaSitioComponent }, // Not protected, public info
  { path: 'politica-privacidad', component: PoliticaPrivacidadComponent }, // Not protected, public info
  { path: '**', redirectTo: '' } // Redirect any unknown paths to home
];