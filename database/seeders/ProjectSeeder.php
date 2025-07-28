<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'nombre' => 'Sistema de Gestión Empresarial',
                'fecha_inicio' => '2025-01-15',
                'estado' => 'En Progreso',
                'responsable' => 'Juan Pérez Martínez',
                'monto' => 15000000
            ],
            [
                'nombre' => 'Plataforma E-commerce Tech Solutions',
                'fecha_inicio' => '2024-12-20',
                'estado' => 'Completado',
                'responsable' => 'María García López',
                'monto' => 25000000
            ],
            [
                'nombre' => 'App Móvil de Soporte Técnico',
                'fecha_inicio' => '2025-02-10',
                'estado' => 'Planificación',
                'responsable' => 'Pedro Martínez Silva',
                'monto' => 8500000
            ],
            [
                'nombre' => 'Migración de Infraestructura Cloud',
                'fecha_inicio' => '2025-01-05',
                'estado' => 'En Revisión',
                'responsable' => 'Ana Rodriguez Torres',
                'monto' => 32000000
            ],
            [
                'nombre' => 'Portal de Clientes Integrado',
                'fecha_inicio' => '2024-11-30',
                'estado' => 'Pausado',
                'responsable' => 'Carlos Fernández Ruiz',
                'monto' => 12000000
            ],
            [
                'nombre' => 'Sistema de Monitoreo Automatizado',
                'fecha_inicio' => '2025-03-01',
                'estado' => 'Planificación',
                'responsable' => 'Lucía Morales Castro',
                'monto' => 18500000
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
