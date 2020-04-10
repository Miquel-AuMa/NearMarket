# NearMarket
#hackpeum2020

La idea es crear una aplicación para la reserva de productos en tiendas locales.

## Tecnologias

- Frontend con VUE
- Backend con PHP

## Roles

En la aplicación te podrás registrar como Tienda o como Usuario:

- Tienda
  - Gestión de su información
  - Gestión de productos
  - Gestión de pedidos

- Usuario
  - Gestión de su información
  - Gestión de sus pedidos

## "Casos de uso"

1. Búsqueda: en la pantalla principal tendremos dos opciones:

 - Buscar por dirección
  - Donde obtendremos un listado de tiendas cercanas a esa localización

- Buscar por producto
  - Nos saldrá un listado de tiendas cerca de nuestra propia dirección que tengan este producto
  - Podremos filtrar por otra localización que no sea la nuestra
  
2. Tienda: una vez dentro de la tienda seleccionada podremos hacer el pedido

- Listado de productos con su cantidad de la tienda

3. Gestión pedido usuario: el usuario tendrá un listado de pedidos para poder gestionar

4. Gestión pedidos tienda: la tienda tendrá un listado de pedidos de varios usuarios a gestionar

## Entidades

Bases de datos relacional

- Usuario
  - Teléfono para validar (unique)
  - Nombre - string
  - Apellidos - string
  - Password - argon2
  - Dirección
    - Linea 1 - string
    - Localidad - string
    - Código postal - string (numeric)

- Tienda
  - Tipo Tienda - fk
  - Teléfono - string (unique)
  - Password - argon2
  - Dirección
    - Linea 1 - string
    - Localidad - string
    - Código postal - string (numeric)
  - Reparto - bool
  - Foto - url - string  
  - Horario
    [
        { apertura: 08:00, cierra: 15:00 },
        { apertura: 16:00, cierra: 20:00 }
    ]

- Producto (p.ej. Pan Bimbo Familiar)
  - Categoria - fk - belongsTo
  - Tienda - fk - belongsTo
  - Nombre - string
  - Descripción - string
  - Peso fijo - string (numeric/alpha) (p.ej. 200g)
  - Precio unidad - float
  - Disponibilidad - bool
  - Caducidad - optional - date  
  - Imagen - optional - url - string

- Categoría (p.ej. Pan)
  - Nombre (unique)
  - Descripción - string/text

- Tipo tienda
  - Nombre (unique) - string
  - Descripción - text
  - Categorias disponibles?

- Pedido
  - Usuario - fk
  - Reparto - bool
  - Fecha/Hora solicitud - datetime
  - Estado - string (enum - en aplicación)
  - Fecha/hora recogida - datetime
  - Anotaciones - String

- Líneas pedido
  - Producto - fk
  - Pedido - fk  
  - Cantidad - int