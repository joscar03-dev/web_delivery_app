import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { 
    path: '', redirectTo: '/slider', pathMatch: 'full' 
  },
  { 
    path: 'menu', loadChildren: () => import('./funcionalidades/menu/menu.module').then(m => m.MenuModule)
  },
  { 
    path: 'contacto', loadChildren: () => import('./funcionalidades/contacto/contacto.module').then(m => m.ContactoModule)
  },
  { 
    path: 'slider', redirectTo: '/menu/slider', pathMatch: 'full'
  },

];

@NgModule({
  imports: [RouterModule.forRoot(routes, {anchorScrolling: 'enabled' })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
