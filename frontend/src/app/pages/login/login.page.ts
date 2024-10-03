import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
  standalone: true,
  imports: [IonicModule, FormsModule],  // Importar FormsModule
})
export class LoginPage {
  form = {
    email: '',
    password: ''
  };

  constructor(private authService: AuthService, private router: Router) {}

  login() {
    console.log('Botón de login presionado');
    console.log(this.form);
    this.authService.login(this.form).subscribe(
      response => {
        localStorage.setItem('token', response.access_token);
        this.router.navigate(['/home']);
      },
      error => {
        console.error('Error al iniciar sesión', error);
      }
    );

    this.router.navigate(['/login']);
  }
}
