import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Router, RouterModule } from '@angular/router';
import { IonicModule } from '@ionic/angular';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss'],
  standalone: true,
  imports: [
    IonicModule, 
    RouterModule,
    CommonModule,
    
    
  ]
})
export class FooterComponent {
  constructor(private authService: AuthService, private router: Router) {}

  // Verifica si el usuario está autenticado
  isAuthenticated(): boolean {
    return !!localStorage.getItem('token');
  }

  // Método para cerrar sesión
  logout() {
    this.authService.logout().subscribe({
      next: () => {
        localStorage.removeItem('token'); // Elimina el token
        this.router.navigate(['/home']);  // Redirige a la página de inicio
      },
      error: (err) => {
        console.error('Error al cerrar sesión', err);
      }
    });
  }

  shouldDisplayFooter(): boolean {
    const hiddenRoutes = ['/login', '/register'];
    return !hiddenRoutes.includes(this.router.url);
  }
}
