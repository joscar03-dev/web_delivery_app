import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { AuthService } from 'src/app/services/auth.service';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
  standalone: true,
  imports: [IonicModule, FormsModule, CommonModule], 
})
export class RegisterPage {
  form = {
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  };

  registerError: string = '';

  constructor(private authService: AuthService, private router: Router) {}

  register() {
    this.authService.register(this.form).subscribe(
      response => {
        // Guardar el token en localStorage
        localStorage.setItem('token', response.access_token);
        // Redirigir al home u otra página
        this.router.navigate(['/home']);
      },
      error => {
        this.registerError = 'Error al registrar el usuario. Por favor, verifica los datos ingresados.';
      }
    );
  }
}
