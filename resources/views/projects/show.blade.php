@extends('layouts.app')

@section('title', 'Detalles del Proyecto')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Detalles del Proyecto</h1>
    <div>
        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Información del Proyecto</h5>
            </div>
            <div class="card-body">
                <h4 class="card-title text-primary">{{ $project->nombre }}</h4>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="fw-bold text-muted">ID del Proyecto:</label>
                            <p class="mb-0">#{{ $project->id }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold text-muted">Fecha de Inicio:</label>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold text-muted">Responsable:</label>
                            <p class="mb-0">{{ $project->responsable }}</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="fw-bold text-muted">Estado:</label>
                            <p class="mb-0">
                                @php
                                    $badgeClass = 'bg-light text-dark'; // default
                                    if ($project->estado === 'Completado') {
                                        $badgeClass = 'bg-success';
                                    } elseif ($project->estado === 'En Progreso') {
                                        $badgeClass = 'bg-primary';
                                    } elseif ($project->estado === 'Planificación') {
                                        $badgeClass = 'bg-info';
                                    } elseif ($project->estado === 'En Revisión') {
                                        $badgeClass = 'bg-warning';
                                    } elseif ($project->estado === 'Pausado') {
                                        $badgeClass = 'bg-secondary';
                                    }
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $project->estado }}</span>
                            </p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold text-muted">Monto del Proyecto:</label>
                            <p class="mb-0 fs-5 text-success">
                                <strong>${{ number_format($project->monto, 0, ',', '.') }} CLP</strong>
                            </p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold text-muted">Fecha de Creación:</label>
                            <p class="mb-0">{{ $project->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Acciones</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar Proyecto
                    </a>
                    
                    <form id="delete-form" action="{{ route('projects.destroy', $project) }}" method="POST" 
                          onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" id="delete-btn">
                            <i class="fas fa-trash"></i> Eliminar Proyecto
                        </button>
                    </form>
                    
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-list"></i> Volver a la Lista
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Estadísticas</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="mb-2">
                        <small class="text-muted">Días desde inicio</small>
                        <div class="fs-4 fw-bold text-primary">
                            {{ \Carbon\Carbon::parse($project->fecha_inicio)->diffInDays(now()) }}
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <small class="text-muted">Última actualización</small>
                        <div class="fs-6">
                            {{ $project->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(event) {
    event.preventDefault();
    
    if (confirm('¿Estás seguro de que quieres eliminar este proyecto?\n\nEsta acción no se puede deshacer.')) {
        const deleteBtn = document.getElementById('delete-btn');
        const originalText = deleteBtn.innerHTML;
        
        // Mostrar indicador de carga
        deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
        deleteBtn.disabled = true;
        
        // Enviar el formulario
        setTimeout(() => {
            document.getElementById('delete-form').submit();
        }, 500);
    }
    
    return false;
}
</script>
@endsection
