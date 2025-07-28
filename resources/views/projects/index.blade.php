@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Proyectos</h1>
        <div>
            <a href="/projects/create" class="btn btn-primary">Agregar Proyecto</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="projects-list">
        @if($projects->count() > 0)
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->nombre }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Responsable: {{ $project->responsable }}</h6>
                                <p class="card-text">
                                    <strong>ID:</strong> {{ $project->id }}<br>
                                    <strong>Estado:</strong> <span class="badge bg-info">{{ $project->estado }}</span><br>
                                    <strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') }}<br>
                                    <strong>Monto:</strong> ${{ number_format($project->monto, 0, ',', '.') }}
                                </p>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarProyecto({{ $project->id }})">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">No hay proyectos para mostrar.</div>
        @endif
    </div>

    <!-- Botón para refrescar dinámicamente -->
    <div class="text-center mt-3">
        <button class="btn btn-outline-primary" onclick="fetchProjectsAjax()">
            <i class="fas fa-sync-alt"></i> Actualizar Lista
        </button>
    </div>
@endsection

@push('scripts')
<script>
    console.log('Script cargado correctamente');

    // Función simple para eliminar proyecto
    function eliminarProyecto(id) {
        console.log('eliminarProyecto llamada con ID:', id);
        
        if (confirm('¿Estás seguro de que quieres eliminar este proyecto?')) {
            console.log('Confirmado, eliminando proyecto ID:', id);
            
            // Mostrar un alert de que se está procesando
            alert('Eliminando proyecto... Por favor espera.');
            
            // Usar formulario tradicional que siempre funciona
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/projects/' + id;
            form.style.display = 'none';
            
            // Obtener token CSRF
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            form.innerHTML = 
                '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                '<input type="hidden" name="_method" value="DELETE">';
            
            document.body.appendChild(form);
            form.submit();
        } else {
            console.log('Usuario canceló la eliminación');
        }
    }

    // Función para actualizar la lista usando AJAX
    function fetchProjectsAjax() {
        console.log('Actualizando proyectos vía AJAX...');
        
        // Mostrar indicador de carga
        const projectsList = document.getElementById('projects-list');
        const originalContent = projectsList.innerHTML;
        projectsList.innerHTML = 
            '<div class="text-center">' +
                '<div class="spinner-border text-primary" role="status">' +
                    '<span class="visually-hidden">Cargando...</span>' +
                '</div>' +
                '<p class="mt-2">Actualizando proyectos...</p>' +
            '</div>';

        fetch('/api/projects', {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            console.log('Respuesta AJAX recibida:', response);
            if (!response.ok) {
                throw new Error('HTTP error! status: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos AJAX recibidos:', data);
            
            if (!data || data.length === 0) {
                projectsList.innerHTML = '<div class="alert alert-info">No hay proyectos para mostrar.</div>';
                return;
            }
            
            let projectsHtml = '<div class="row">';
            data.forEach(project => {
                projectsHtml += 
                    '<div class="col-md-6 mb-3">' +
                        '<div class="card h-100">' +
                            '<div class="card-body">' +
                                '<h5 class="card-title">' + escapeHtml(project.nombre) + '</h5>' +
                                '<h6 class="card-subtitle mb-2 text-muted">Responsable: ' + escapeHtml(project.responsable) + '</h6>' +
                                '<p class="card-text">' +
                                    '<strong>ID:</strong> ' + project.id + '<br>' +
                                    '<strong>Estado:</strong> <span class="badge bg-info">' + escapeHtml(project.estado) + '</span><br>' +
                                    '<strong>Fecha de Inicio:</strong> ' + formatDate(project.fecha_inicio) + '<br>' +
                                    '<strong>Monto:</strong> $' + formatNumber(project.monto) +
                                '</p>' +
                                '<div class="btn-group" role="group">' +
                                    '<a href="/projects/' + project.id + '" class="btn btn-sm btn-info">Ver</a>' +
                                    '<a href="/projects/' + project.id + '/edit" class="btn btn-sm btn-warning">Editar</a>' +
                                    '<button class="btn btn-sm btn-danger" onclick="eliminarProyecto(' + project.id + ')">Eliminar</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
            });
            projectsHtml += '</div>';
            projectsList.innerHTML = projectsHtml;
            
            showMessage('Lista actualizada correctamente', 'success');
        })
        .catch(error => {
            console.error('Error al actualizar proyectos:', error);
            projectsList.innerHTML = originalContent;
            showMessage('Error al actualizar: ' + error.message, 'error');
        });
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('es-ES');
    }

    function formatNumber(number) {
        return new Intl.NumberFormat('es-ES').format(number);
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function showMessage(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert ' + alertClass + ' alert-dismissible fade show';
        alertDiv.innerHTML = 
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        
        const container = document.querySelector('.container') || document.body;
        const firstChild = container.firstElementChild;
        container.insertBefore(alertDiv, firstChild);
        
        setTimeout(function() {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }

    // Debug: verificar que las funciones están disponibles
    console.log('Funciones disponibles:', {
        eliminarProyecto: typeof eliminarProyecto,
        fetchProjectsAjax: typeof fetchProjectsAjax
    });

    // Hacer funciones globales
    window.eliminarProyecto = eliminarProyecto;
    window.fetchProjectsAjax = fetchProjectsAjax;
</script>
@endpush
