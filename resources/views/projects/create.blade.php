@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Crear Nuevo Proyecto</h1>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Volver a la lista</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Por favor corrige los siguientes errores:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Información del Proyecto</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Proyecto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
                               placeholder="Ingresa el nombre del proyecto" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                               id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" 
                               min="1900-01-01" max="2100-12-31" required>
                        @error('fecha_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Fecha debe estar entre 1900 y 2100</div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                            <option value="">Selecciona un estado</option>
                            <option value="Planificación" {{ old('estado') == 'Planificación' ? 'selected' : '' }}>Planificación</option>
                            <option value="En Progreso" {{ old('estado') == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="En Revisión" {{ old('estado') == 'En Revisión' ? 'selected' : '' }}>En Revisión</option>
                            <option value="Completado" {{ old('estado') == 'Completado' ? 'selected' : '' }}>Completado</option>
                            <option value="Pausado" {{ old('estado') == 'Pausado' ? 'selected' : '' }}>Pausado</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="responsable" class="form-label">Responsable <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('responsable') is-invalid @enderror" 
                               id="responsable" name="responsable" value="{{ old('responsable') }}" 
                               placeholder="Nombre del responsable" required>
                        @error('responsable')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="monto" class="form-label">Monto (CLP) <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control @error('monto') is-invalid @enderror" 
                           id="monto" name="monto" value="{{ old('monto') }}" 
                           placeholder="0" min="0" max="999999999999" required>
                    @error('monto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-text">Ingresa el monto en pesos chilenos (máximo: $999.999.999.999)</div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('projects.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Proyecto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
