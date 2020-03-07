
## Prueba tecnica desarrollador FullStack 

Se requiere construir un aplicativo en Laravel V6 con las siguientes características.
-      Manejo de sesiones (registro, login, recuperación de contraseña).
-      Marketplace básico con capacidad de listar productos, manejar inventarios, carrito de compras con validaciones. Esta versión es básica,
-      Manejar un máximo de 5 productos.
-      Usar Blade como motor de plantillas.
Se debe hacer uso de GIT como control de cambios.

El entregable es la URL del perfil público del repositorio donde se evidencie el proceso y debe tener como commit inicial el proyecto básico de Laravel recién instalado.

## Migraciones

Se establecen cuatro tablas en una base de datos para la administración de los requerimientos solicitados en la prueba técnica.
  #usuarios
  #productos
  #ordenes
  #productos_ordenes

## Sesiones de usuario

La lógica para la creación de usuarios y la administración de sesiones se implementó utilizando las utilidades que ofrece Laravel el cual crea rutas, controladores y vistas para el registro, el ingreso y la recuperación de contraseñas.

##  Marketplace

Para la creación del marketplace de máximo 5 productos por páginas, se utilizó el método "paginate" de Eloquent para enviar a la vista solo 5 productos por página, las imágenes de cada producto se alojaron utilizado el método "Storage" de Laravel que facilita el manejo de archivos.

## Carrito de compras

Para el carrito de compras se utilizaron peticiones asíncronas Ajax para realizar la actualización de sesiones de Laravel que contenían los ID de los productos de carrito a medida que el usuario selecciona los productos.

## Manejo de inventario

Para el manejo de inventario se implementó un módulo de usuario donde se presentan las opciones de modificación de inventario. Se creó un campo bool en la tabla de usuarios para asignar administradores para verificar que solo los usuarios con rol de administrador tienen permisos para realizar cambios en la información de los productos del Marketplace, adicionalmente se implementó una tabla donde se despliegan las órdenes de compra cada usuario completó en el Marketplace con su identificador y el valor total de cada orden.
