<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{
    use Actions;
    public $roomName;
    public $roomCapacity;
    public $roomDescription;

    public $rules = [

        'roomName' => 'required',
        'roomCapacity' => 'required',
        'roomDescription' => 'required',

    ];

    public function createRoom()
    {
        $this->validate();

        $room = new Room();
        $room->slug = $this->roomName;
        $room->name = $this->roomName;
        $room->capacity = $this->roomCapacity;
        $room->description = $this->roomDescription;


        if($room->save()){
            DB::commit();
            $this->dialog()->success(
                $title = 'Entry Saved',
                $description = 'Your room details has been saved'
            );
        } else {
            DB::rollBack();
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'Your profile was not saved'
            );
        }
    }


    public function render()
    {
        return view('livewire.room.create');
    }
}
