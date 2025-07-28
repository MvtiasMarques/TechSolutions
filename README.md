# TechSolutions

## Description

Este es un sistema web para gestionar proyectos empresariales. Lo desarrollé usando Laravel y incluye una interfaz moderna donde puedes crear, editar, ver y eliminar proyectos. También tiene una API REST por si necesitas integrarlo con otras aplicaciones.

## Features

- Listado de proyectos con información completa
- Formularios para crear y editar proyectos
- API REST para operaciones CRUD
- Componente que muestra el valor actual de la UF
- Validación de formularios
- Diseño responsivo con Bootstrap

## Instalación

```bash
# Clonar el repositorio
git clone https://github.com/MvtiasMarques/TechSolutions.git
cd TechSolutions

# Instalar dependencias
composer install

# Configurar el archivo de entorno
cp .env.example .env
php artisan key:generate

# Configurar la base de datos en el archivo .env
# Ejecutar migraciones
php artisan migrate --seed

# Iniciar el servidor
php artisan serve
```

## Uso

Después de la instalación, ve a `http://localhost:8000/projects` para ver la lista de proyectos.

### API

La API está disponible en `/api/projects` y soporta:

- `GET /api/projects` - Ver todos los proyectos
- `POST /api/projects` - Crear proyecto
- `GET /api/projects/{id}` - Ver un proyecto
- `PUT /api/projects/{id}` - Actualizar proyecto  
- `DELETE /api/projects/{id}` - Eliminar proyecto

Ejemplo de uso:
```bash
curl -H "Accept: application/json" http://localhost:8000/api/projects
```

## Estructura del Proyecto

- **Controller**: `ProjectController` maneja tanto web como API
- **Model**: `Project` con los campos: nombre, fecha_inicio, estado, responsable, monto
- **Views**: Vistas Blade para el CRUD completo
- **Component**: `UfValue` (Livewire) para mostrar el valor de la UF

## Estados de Proyecto

- Planificación
- En Progreso  
- En Revisión
- Completado
- Pausado

El sistema incluye algunos proyectos de ejemplo para que puedas probar todas las funcionalidades.

## Tecnologías

- Laravel 8.x
- PHP 7.4+
- Bootstrap 5
- Livewire
- MySQL/SQLite

## Notas

- El componente UF consulta la API de mindicador.cl cada minuto
- Todas las operaciones incluyen validación
- El diseño es responsivo y funciona en móviles
