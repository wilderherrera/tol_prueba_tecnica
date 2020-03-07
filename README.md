
## Prueba tecnica desarrollador FullStack 

Se requiere construir un aplicativo en Laravel V6 con las siguientes características.
-      Manejo de sesiones (registro, login, recuperación de contraseña).
-      Marketplace básico con capacidad de listar productos, manejar inventarios, carrito de compras con validaciones. Esta versión es básica,
-      Manejar un máximo de 5 productos.
-      Usar Blade como motor de plantillas.
Se debe hacer uso de GIT como control de cambios.

El entregable es la URL del perfil público del repositorio donde se evidencie el proceso y debe tener como commit inicial el proyecto básico de Laravel recién instalado.

## Migraciones

Se establecen cuatro tablas en una base de datos para la administración de los requerimientos solicitados en la prueba tecnica.
  #usuarios
  #productos
  #ordenes
  #productos_ordenes

## Sessiones de usuario

La logica par la creacion de usuarios y la administracion de sesiones se implementó utilizando las utilidades que ofrece laravel el cual crea rutas, controladores y vistas para el registro, el ingreso y la recuperación de contraseñas.

##  Marketplace

Para la creación del marketplace de maximo 5 productos por paginas, se utilizo el metodo "paginate" de eloquent para enviar a la vista solo 5 productos por pagina, las imagenes de cada producto se alojaron utilizado el metodo "Storage" de laravel que facilita el manejo de archivos.

## Carrito de compras

Para el carrito de compras se utilizaron peticiones asincronas Ajax  para realizar la actualizacion de sessiones de laravel que contenian los ID de los productos de carrito a medida que el usuario selecciona los productos.
