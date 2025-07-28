<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class UfValue extends Component
{
    public $ufValue;

    public function mount()
    {
        $this->fetchUfValue();
    }

    public function fetchUfValue()
    {
        try {
            $response = Http::get('https://mindicador.cl/api/uf');
            if ($response->successful()) {
                $this->ufValue = $response->json()['serie'][0]['valor'];
            } else {
                $this->ufValue = 'Error al obtener el valor';
            }
        } catch (\Exception $e) {
            $this->ufValue = 'Error de conexión';
        }
    }

    public function render()
    {
        return view('livewire.uf-value');
    }
}
