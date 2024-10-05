import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
  standalone: true,
  imports: [CommonModule, FormsModule, IonicModule]
})

export class RegisterComponent {
  name: string = '';
  email: string = '';
  password: string = '';
  passwordConfirmation: string = '';

  constructor(private authService: AuthService) {}

  register() {
    const data = {
      name: this.name,
      email: this.email,
      password: this.password,
      password_confirmation: this.passwordConfirmation,
    };

    this.authService.register(data).subscribe({
      next: (res) => {
        console.log('Registro exitoso');
        // Redirigir o realizar alguna acción post-registro
      },
      error: (err) => {
        console.error(err);
      },
    });
  }
}
