# Web Delivery App - Backend

## Tecnologías Utilizadas

- **Laravel**: Framework PHP para el backend.
- **MySQL**: Base de datos relacional utilizada en el proyecto.
- **Composer**: Para la gestión de dependencias.
- **Ionic con Angular**: Usado para la parte del frontend de la aplicación.

## Instalación

### Prerrequisitos

- **PHP 8.0+**
- **Composer**
- **MySQL**
- **Node.js y NPM (para el frontend con Ionic y Angular)**

### Pasos de instalación

1. Clonar el repositorio:
   - **git clone https://github.com/joscar03-dev/web_delivery_app.git**
   - cd **web_delivery_app/backend**
   
3. Instalar las dependencias de PHP
   - composer install
   
4. Configurar el archivo .env:
   - Copiar el archivo .env.example y renombrarlo como .env.
   - Luego, configurar la conexión a la base de datos y otros parámetros necesarios.
   
5. Generar la clave de la aplicación de Laravel:
   - php artisan key:generate
   
6. Migrar las tablas a la Base de Datos
   - php artisan migrate
   
7. Opcional: sembrar datos de prueba
   - php artisan db:seed
   
8. Iniciar el servidor de desarrollo
   - php artisan serve


# Web Delivery App - Frontend
  
## Tecnologías Utilizadas

- **Ionic Framework**: Para el desarrollo de aplicaciones móviles e híbridas.
- **Angular**: Framework de frontend para la construcción de aplicaciones web.
- **CSS Puro**: Sin uso de frameworks como Bootstrap o Tailwind.
  
## Instalación

### Prerrequisitos

- **Node.js y NPM**
- **Ionic CLI** (Si aún no lo tienes instalado, ejecuta el siguiente comando):
  **npm install -g @ionic/cli**
  
### Pasos de instalacion

