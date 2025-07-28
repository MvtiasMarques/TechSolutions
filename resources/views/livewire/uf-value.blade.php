<div wire:poll.60s="fetchUfValue" class="text-center">
    @if($ufValue && is_numeric($ufValue))
        <div>
            <small class="text-muted d-block">Valor UF hoy</small>
            <strong class="text-primary">${{ number_format($ufValue, 2, ',', '.') }}</strong>
        </div>
    @else
        <div>
            <small class="text-muted d-block">Valor UF</small>
            <small class="text-danger">{{ $ufValue ?? 'Cargando...' }}</small>
        </div>
    @endif
    <div class="mt-1">
        <button wire:click="fetchUfValue" class="btn btn-sm btn-outline-primary" title="Actualizar">
            <i class="fas fa-sync-alt"></i>
        </button>
    </div>
</div>
