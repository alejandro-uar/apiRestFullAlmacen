# Proyecto de API REST en LARAVEL
Este proyecto es una API REST desarrollada en Laravel, utilizando MySQL como sistema de gestión de base de datos. Su propósito es proporcionar información detallada sobre la mercancía de un local comercial.

## Funcionalidades
* Gestión de Productos: Permite la creación, actualización, eliminación y visualización de productos.
* Categorías: Gestión de categorías asociadas a los productos, con operaciones CRUD completas.
* Marcas: Manejo de marcas para los productos, con funciones CRUD.

La API proporciona respuestas en formato JSON, asegurando una integración fácil y eficiente con otros sistemas. Es un proyecto en constante evolución, donde se siguen incorporando mejoras y nuevas funcionalidades para ampliar sus capacidades.

## Endpoints
### Productos

- **Obtener todos los productos**
  - **Método:** `GET`
  - **Ruta:** `/api/productos`
  - **Descripción:** Devuelve una lista de todos los productos disponibles.
  - **Respuesta:**
    ```
    {
        "message": "Productos obtenidos",
        "status": 200,
        "error": false,
        "data": [{
                "id": 1,
                "nombre": "Producto 1",
                "descripcion": "Descripcion del producto 1",
                "precio": "25000.00",
                "cantidad_disponible": 10,
                "categoria_id": 1,
                "marca_id": 1,
                "created_at": "2024-08-13T20:33:44.000000Z",
                "updated_at": "2024-08-13T20:33:44.000000Z"
            }]
    }
    ```
- **Obtener un producto específico**
  - **Método:** `GET`
  - **Ruta:** `/api/productos/{id}`
  - **Descripción:** Devuelve los detalles de un producto identificado por su ID.
  - **Respuesta:**
    ```
    {
      "message": "Producto obtenido exitosamente!",
        "status": 200,
        "error": false,
        "data": [{
                "id": 1,
                "nombre": "Producto 1",
                "descripcion": "Descripcion del producto 1",
                "precio": "25000.00",
                "cantidad_disponible": 10,
                "categoria_id": 1,
                "marca_id": 1,
                "created_at": "2024-08-13T20:33:44.000000Z",
                "updated_at": "2024-08-13T20:33:44.000000Z"
            }]
    }
    ```
- **Crear un nuevo producto**
  - **Método:** `POST`
  - **Ruta:** `/api/productos`
  - **Descripción:** Crea un nuevo producto con los datos proporcionados.
  - **Cuerpo de la Solicitud:**
    ```json
    {
      "nombre": "Producto 3",
      "descripcion": "Descripción del producto 3",
      "precio": 300,
      "cantidad_disponible": 10,
      "categoria_id": 1,
      "marca_id": 1
    }
    ```
  - **Ejemplo de Respuesta:**
    ```json
    {
      "id": 3,
      "nombre": "Producto 3",
      "descripcion": "Descripción del producto 3",
      "precio": 300,
      "cantidad_disponible": 10,
      "categoria_id": 1,
      "marca_id": 1,
      "created_at": "2024-01-01T00:00:00.000000Z",
      "updated_at": "2024-01-01T00:00:00.000000Z"
    }
    ```

- **Actualizar un producto**
  - **Método:** `PUT`
  - **Ruta:** `/api/productos/{id}`
  - **Descripción:** Actualiza los detalles de un producto existente.
  - **Cuerpo de la Solicitud:**
    ```
    {
      "nombre": "Producto Actualizado",
      "descripcion": "Descripción actualizada del producto",
      "precio": 150,
      "cantidad_disponible": 10,
      "categoria_id": 1,
      "marca_id": 1
    }
    ```
  - **Respuesta:**
    ```
    {
      "id": 1,
      "nombre": "Producto Actualizado",
      "descripcion": "Descripción actualizada del producto",
      "precio": 150,
      "cantidad_disponible": 10,
      "categoria_id": 1,
      "marca_id": 1,
      "created_at": "2024-01-01T00:00:00.000000Z",
      "updated_at": "2024-01-01T00:00:00.000000Z"
    }
    ```

- **Eliminar un producto**
  - **Método:** `DELETE`
  - **Ruta:** `/api/productos/{id}`
  - **Descripción:** Elimina un producto identificado por su ID.
  - **Respuesta:**
    ```
    {
      "mensaje": "Producto eliminado con éxito"
    }
    ```
