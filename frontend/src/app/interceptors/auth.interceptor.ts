import { HttpInterceptorFn } from '@angular/common/http';

export const authInterceptor: HttpInterceptorFn = (req, next) => {
  const token = localStorage.getItem('token'); // Obtenemos el token de localStorage

  if (token) {
    // Clonamos la petición para añadir el token en la cabecera Authorization
    const authReq = req.clone({
      setHeaders: {
        Authorization: `Bearer ${token}`
      }
    });

    // Pasamos la petición clonada con el token
    return next(authReq);
  }

  // Si no hay token, pasamos la petición original
  return next(req);
};
