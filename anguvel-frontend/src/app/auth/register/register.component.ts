import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent {
  userData = {
    name: '',
    email: '',
    password: '',
    password_confirmation: '' // For password confirmation
  };
  errorMessage: string | null = null;

  constructor(private authService: AuthService, private router: Router) { }

  onRegister(): void {
    if (this.userData.password !== this.userData.password_confirmation) {
      this.errorMessage = 'Passwords do not match.';
      return;
    }

    this.authService.register(this.userData).subscribe({
      next: () => {
        this.router.navigate(['/login']); // Redirect to login page after successful registration
      },
      error: (err) => {
        this.errorMessage = err.error?.message || 'Registration failed. Please try again.';
      }
    });
  }
}
