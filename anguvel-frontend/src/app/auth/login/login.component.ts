import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  credentials = {
    nombre: '',
    password: ''
  };
  errorMessage: string | null = null;

  constructor(private authService: AuthService, private router: Router) { }

  onLogin(): void {
    this.authService.login(this.credentials).subscribe({
      next: () => {
        this.router.navigate(['/']); // Redirect to home or dashboard on successful login
      },
      error: (err) => {
        this.errorMessage = err.error?.message || 'Fallo al iniciar por favor verifique sus datos.';
      }
    });
  }
}
