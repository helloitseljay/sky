<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Event;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class EventTables extends DataTableComponent
{
    protected $model = Event::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.room-buttons.events-table-buttons',

        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Event", "Event")
                ->searchable(),
            Column::make("Event Start", "Event Start")
                ->sortable(),
            Column::make("Event End", "Event End")
                ->sortable(),
                LinkColumn::make('Actions')
                ->title(fn()=>'Edit')
                ->location(fn($row)=> route('event.edit',$row->id))
                ->attributes(fn($row)=>[
                    'class' => 'text-white bg-black p-3 rounded'
                ]),
        ];
    }
}
