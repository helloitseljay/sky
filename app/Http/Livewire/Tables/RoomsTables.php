<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Room;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class RoomsTables extends DataTableComponent
{
    protected $model = Room::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.room-buttons.rooms-table-buttons',
        ]);
        }

    public function columns(): array
    {
        return [
            Column::make("Room", "id")
                ->searchable(),
            Column::make("Room Capacity", "capacity")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            LinkColumn::make('Actions')
                ->title(fn()=>'Edit')
                // ->location(fn($row)=> dd($row))
                ->location(fn($row)=> route('room.edit',$row->id))
                ->attributes(fn($row)=>[
                    'class' => 'text-white bg-black p-3 rounded'
                ]),
        ];
    }
}
