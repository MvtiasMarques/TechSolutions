@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="text-center">
    <div class="hero-section py-5 mb-5">
        <div class="tech-gradient p-5 rounded-4 text-white">
            <h1 class="display-4 fw-bold mb-3">
                <i class="fas fa-rocket me-3"></i>Tech Solutions
            </h1>
            <p class="lead mb-4">Sistema de Gestión de Proyectos</p>
            <p class="mb-4">Moderniza tu gestión de proyectos con nuestra plataforma integral</p>
            <a href="{{ route('projects.index') }}" class="btn btn-light btn-lg">
                <i class="fas fa-list me-2"></i>Ver Proyectos
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="text-primary mb-3">
                        <i class="fas fa-project-diagram fa-3x"></i>
                    </div>
                    <h5 class="card-title">Gestión de Proyectos</h5>
                    <p class="card-text">Especialistas en planificación, desarrollo e implementación de proyectos informáticos diseñados para optimizar y transformar las operaciones de tu empresa.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="text-primary mb-3">
                        <i class="fas fa-map-marker-alt fa-3x"></i>
                    </div>
                    <h5 class="card-title">Cobertura Nacional</h5>
                    <p class="card-text">Presencia en las principales ciudades de Chile y aliado para empresas de otros países que buscan un partner en Chile.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="text-primary mb-3">
                        <i class="fas fa-user-tie fa-3x"></i>
                    </div>
                    <h5 class="card-title">Profesionales Expertos</h5>
                    <p class="card-text">Contarás con el respaldo de un equipo de profesionales disponibles para entregar las soluciones que tu empresa necesita.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header tech-gradient text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        ¿Qué es una red de cableado estructurado?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Es un sistema compuesto por una serie de elementos físicos: cables, conectores, ductos y dispositivos centralizadores. Su finalidad es permitir la comunicación de voz y/o datos entre diferentes dispositivos interconectados.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        ¿Para qué sirve un mantenimiento informático?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        El mantenimiento informático garantiza el óptimo funcionamiento de tus sistemas, previene fallas, mejora el rendimiento y extiende la vida útil de tu infraestructura tecnológica.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        ¿Cuándo se justifica instalar un cableado estructurado?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Se justifica cuando se requiere una infraestructura de red confiable, escalable y organizada que permita el crecimiento futuro y el mantenimiento eficiente de las comunicaciones de la empresa.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hero-section {
        margin-top: -20px;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #495057;
    }
</style>
@endsection
