<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Paciente;

class PacienteTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Gatos', Paciente::query()->where('type', 'gato')->count()),
            Card::make('Perros', Paciente::query()->where('type', 'perro')->count()),
            Card::make('Conejos', Paciente::query()->where('type', 'conejo')->count()),
        ];
    }
}
