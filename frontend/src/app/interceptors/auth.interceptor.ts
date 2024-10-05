import { HttpInterceptorFn } from '@angular/common/http';

export const authInterceptor: HttpInterceptorFn = (req, next) => {
  const token = localStorage.getItem('token');

  if (token) {
    // Clonamos la solicitud para añadir el token en la cabecera
    const authReq = req.clone({
      setHeaders: {
        Authorization: `Bearer ${token}`,
      }
    });

    return next(authReq); // Pasamos la solicitud clonada con el token
  }

  return next(req); // Si no hay token, la petición pasa sin modificar
};
