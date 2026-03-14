# Sistema de Gestión de Mascotas (Laravel)

## Descripción
Este proyecto es una aplicación web desarrollada con **Laravel** que permite administrar usuarios y sus mascotas mediante operaciones CRUD.

El sistema incluye autenticación básica para un administrador y dos módulos principales:

- Usuarios
- Mascotas

Cada mascota está asociada a un usuario (dueño) mediante una relación en la base de datos.

---

## Tecnologías utilizadas

- PHP 8
- Laravel 12
- MySQL
- Blade (motor de plantillas de Laravel)
- XAMPP / Apache
- Git

---

## Estructura del proyecto

```
app/
├─ Http/Controllers/
│ ├─ AuthController.php
│ ├─ UsuarioController.php
│ └─ MascotaController.php
│
└─ Models/
├─ Usuario.php
└─ Mascota.php

resources/views/
├─ login.blade.php
├─ panel.blade.php
├─ usuarios/
└─ mascotas/

routes/
└─ web.php
```

---

## Funcionalidades

### Autenticación
- Inicio de sesión de administrador
- Cierre de sesión
- Protección básica de acceso al panel

### Módulo de Usuarios
**Permite administrar usuarios del sistema.**

Operaciones disponibles:

- Crear usuario
- Listar usuarios
- Editar usuario
- Eliminar usuario

### Módulo de Mascotas
**Permite administrar mascotas registradas.**

Operaciones disponibles:

- Crear mascota
- Listar mascotas
- Editar mascota
- Eliminar mascota

Cada mascota se relaciona con un usuario mediante el campo:
usuario_id

---

## Base de datos

### Tabla: usuarios

- id
- nombre
- email
- password

### Tabla: mascotas

- id
- nombre
- tipo
- edad
- usuario_id

Relación:
Mascota pertenece a Usuario


Implementada en el modelo:

```php
public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id');
}
```

---

## Instalación

1. **Clonar repositorio**
   ```bash
   git clone <URL_DEL_REPOSITORIO>
    ```
2. **Entrar al proyecto**
   cd nombre-del-proyecto

3. **Instalar dependencias**
   composer install
   
4. **Configurar archivo .env**
    Ajusta los datos de la base de datos según tu entorno.

5. **Ejecutar servidor**
   php artisan serve

6. **Abrir en el navegador**
   http://127.0.0.1:8000

---

## Autor




