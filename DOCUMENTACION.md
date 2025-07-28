# Sistema de Gestión de Proyectos - Tech Solutions

## Descripción del Proyecto

Este es un sistema de gestión de proyectos desarrollado con Laravel que cumple con todos los requerimientos especificados para la evaluación. La aplicación permite gestionar proyectos con funcionalidades completas de CRUD (Crear, Leer, Actualizar, Eliminar) tanto a través de interfaz web como API REST.

## Características Implementadas

### ✅ 1. Rutas API Completas
- **GET /api/projects** - Listar todos los proyectos
- **POST /api/projects** - Agregar nuevo proyecto
- **GET /api/projects/{id}** - Obtener proyecto por ID
- **PUT/PATCH /api/projects/{id}** - Actualizar proyecto por ID
- **DELETE /api/projects/{id}** - Eliminar proyecto por ID

### ✅ 2. Controlador ProjectController
- **index()** - Lista todos los proyectos (web + API)
- **create()** - Muestra formulario de creación
- **store()** - Crea un nuevo proyecto (web + API)
- **show()** - Muestra un proyecto específico (web + API)
- **edit()** - Muestra formulario de edición
- **update()** - Actualiza un proyecto (web + API)
- **destroy()** - Elimina un proyecto (web + API)

### ✅ 3. Modelo Project
Campos implementados:
- **id** - Identificador único
- **nombre** - Nombre del proyecto
- **fecha_inicio** - Fecha de inicio
- **estado** - Estado del proyecto
- **responsable** - Responsable del proyecto
- **monto** - Monto en pesos chilenos

### ✅ 4. Vistas Completas con Estilos
- **projects/index.blade.php** - Lista de proyectos con funcionalidad AJAX
- **projects/create.blade.php** - Formulario de creación mejorado
- **projects/show.blade.php** - Vista detallada del proyecto
- **projects/edit.blade.php** - Formulario de edición
- **welcome.blade.php** - Página principal con diseño inspirado en Tech Solutions

### ✅ 5. Componente Reutilizable UF
- **UfValue (Livewire)** - Consume API externa de mindicador.cl
- Actualización automática cada 60 segundos
- Manejo de errores de conexión
- Interfaz flotante en la esquina inferior derecha

## Tecnologías Utilizadas

- **Laravel 8.x** - Framework PHP
- **PHP 7.4+** - Lenguaje de programación
- **MySQL/SQLite** - Base de datos
- **Livewire** - Componente reactivo para UF
- **Bootstrap 5** - Framework CSS
- **Font Awesome** - Iconos
- **Composer** - Gestor de dependencias

## Instalación y Configuración

### Prerrequisitos
- PHP 7.4 o superior
- Composer
- Laragon (recomendado para Windows)

### Pasos de Instalación

1. **Clonar/Configurar el proyecto**
   ```bash
   cd "c:\Users\USUARIO\Documents\Proyecto 1"
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar base de datos**
   ```bash
   # Crear archivo .env (copiar de .env.example)
   cp .env.example .env
   
   # Generar clave de aplicación
   php artisan key:generate
   ```

4. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Iniciar servidor**
   ```bash
   php artisan serve --port=8001
   ```

## Uso de la Aplicación

### Interfaz Web
- **Página Principal**: http://127.0.0.1:8001/
- **Lista de Proyectos**: http://127.0.0.1:8001/projects
- **Crear Proyecto**: http://127.0.0.1:8001/projects/create

### API REST

#### Listar Proyectos
```bash
GET /api/projects
```

#### Crear Proyecto
```bash
POST /api/projects
Content-Type: application/json

{
    "nombre": "Nuevo Proyecto",
    "fecha_inicio": "2025-07-28",
    "estado": "Planificación",
    "responsable": "Juan Pérez",
    "monto": 1500000
}
```

#### Obtener Proyecto por ID
```bash
GET /api/projects/{id}
```

#### Actualizar Proyecto
```bash
PUT /api/projects/{id}
Content-Type: application/json

{
    "nombre": "Proyecto Actualizado",
    "fecha_inicio": "2025-07-29",
    "estado": "En Progreso",
    "responsable": "María García",
    "monto": 2000000
}
```

#### Eliminar Proyecto
```bash
DELETE /api/projects/{id}
```

## Características Destacadas

### 🎨 Diseño Profesional
- Diseño inspirado en Tech Solutions
- Interfaz responsive con Bootstrap 5
- Gradientes y estilos modernos
- Navegación intuitiva

### 🔄 Funcionalidad AJAX
- Lista de proyectos carga dinámicamente
- Eliminación sin recarga de página
- Actualizaciones en tiempo real

### 📊 Componente UF
- Valor actual de la UF desde API externa
- Actualización automática
- Botón de actualización manual
- Manejo robusto de errores

### 🛡️ Validaciones
- Validación tanto en cliente como servidor
- Mensajes de error informativos
- Campos obligatorios claramente marcados

### 🎯 Estados de Proyecto
- Planificación
- En Progreso
- En Revisión
- Completado
- Pausado

## Datos de Prueba

El sistema incluye 6 proyectos de ejemplo con datos realistas:
1. Sistema de Gestión Empresarial
2. Plataforma E-commerce Tech Solutions
3. App Móvil de Soporte Técnico
4. Migración de Infraestructura Cloud
5. Portal de Clientes Integrado
6. Sistema de Monitoreo Automatizado

## Cumplimiento de Requerimientos

✅ **Rutas API**: Todas implementadas y funcionales  
✅ **Controladores**: Métodos completos con lógica web y API  
✅ **Modelos**: Project con todos los campos requeridos  
✅ **Vistas**: 5 vistas completamente funcionales con estilos  
✅ **Componente UF**: Componente Livewire que consume API externa  

## Contacto

Para consultas sobre el proyecto:
- Email: contacto@techsolutiongroups.com
- Teléfono: (+56) 9 8401 0588

---

**Desarrollado para Tech Solutions - Sistema de Gestión de Proyectos**
