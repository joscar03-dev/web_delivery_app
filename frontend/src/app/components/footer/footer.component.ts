import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Router, RouterModule } from '@angular/router';
import { IonicModule } from '@ionic/angular';
import { AuthService } from 'src/app/services/auth.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule, CommonModule],
})
export class FooterComponent {
  public alertButtons = [
    {
      text: 'No',
      cssClass: 'alert-button-cancel',
      handler: () => {
        console.log('Alert canceled');
      },
    },
    {
      text: 'Yes',
      cssClass: 'alert-button-confirm',
      handler: () => {
        this.authService.logout().subscribe({
          next: () => {
            localStorage.removeItem('token');
            this.router.navigate(['/home']);
          },
          error: (err) => {
            console.error('Error al cerrar sesión', err);
          },
        });
      },
    },
  ];
  constructor(
    private authService: AuthService,
    private router: Router,
    private alertController: AlertController
  ) {}

  isAuthenticated(): boolean {
    const token = localStorage.getItem('token');
    return token !== null && token !== 'undefined' && token !== '';
  }

  /* logout() {
    this.authService.logout().subscribe({
      next: () => {
        localStorage.removeItem('token'); // Elimina el token
        this.router.navigate(['/home']);  // Redirige a la página de inicio
      },
      error: (err) => {
        console.error('Error al cerrar sesión', err);
      }
    });
  } */
  /* async logout() {
    const token = localStorage.getItem('token');
    if (!token || token === 'undefined') {
      console.error('No se puede cerrar sesión porque no estás autenticado');
      return;
    }
    const alert = await this.alertController.create({
      header: 'Cerrar Sesión',
      message: '¿Estás seguro de que quieres cerrar sesión?',
      buttons: [
        {
          text: 'Cancelar',
          role: 'cancel',
          cssClass: 'secondary',
        },
        {
          text: 'Sí',
          handler: () => {
            this.authService.logout().subscribe({
              next: () => {
                localStorage.removeItem('token');
                this.router.navigate(['/home']);
              },
              error: (err) => {
                console.error('Error al cerrar sesión', err);
              },
            });
          },
        },
      ],
    });

    await alert.present();
  } */

  shouldDisplayFooter(): boolean {
    const hiddenRoutes = ['/login', '/register'];
    return !hiddenRoutes.includes(this.router.url);
  }
}
