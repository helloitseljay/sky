<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.user-table-button',

          ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("first_name")
                ->searchable ()
                ->sortable(),
             Column::make("middle_name")
                ->searchable ()
                ->sortable(),
             Column::make("last_name")
                ->searchable ()
                ->sortable(),
            Column::make("Email", "email")
            ->searchable ()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            LinkColumn::make('Actions')
                ->title(fn()=>'Edit')
                ->location(fn($row)=> route('user.edit',$row->id))
                ->attributes(fn($row)=>[
                    'class' => 'text-white bg-black p-3 rounded'
                ]),

        ];
    }
}
