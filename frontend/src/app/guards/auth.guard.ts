import { CanActivateFn, Router } from '@angular/router';

export const authGuard: CanActivateFn = (route, state) => {
  const token = localStorage.getItem('token');
  
  if (token) {
    return true; // Permitir acceso si el token está presente (usuario autenticado)
  } else {
    const router = new Router(); // Crear una instancia de Router para redirigir
    router.navigate(['/login']); // Redirigir a la página de login si no está autenticado
    return false; // No permitir acceso
  }
};