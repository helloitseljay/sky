<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;
    public $roomName;
    public $roomCapacity;
    public $roomDescription;
    public $roomId;
    public $status;
    public $room;

    public function mount(Room $room){
        // dd($room);
        $this->room = $room; //select * from user where id= user
        $this->roomId  = $room->id;
        $this->roomName = $room->name;
        $this->roomCapacity = $room->capacity;
        $this->roomDescription = $room->description;
        $this->status = $room->is_active;
    }
    public function update($id){

        $validated = Validator::make(
            [

                'roomName' =>$this->roomName,
                'roomCapacity' =>$this->roomCapacity,
                'roomDescription' =>$this->roomDescription,

            ],
            [
                'roomName' => 'required',
                'roomCapacity' => 'required',
                'roomDescription' => 'required',
                'roomId' => [

                    Rule::unique('rooms', 'id'),
                ]
            ],
        )->validate();

        try{
            DB::beginTransaction();

            $room = Room::find($id);
            $room->name = $this->roomName;
            $room->capacity = $this->roomCapacity;
            $room->description = $this->roomDescription;
            $room->is_active = $this->status;

            if($room->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Profile Saved",
                    $description = 'Your profile was successfully saved'
                );
            }else{
                DB::rollback();
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description = 'Your profile was not saved'
                );
            }

        }catch(\Throwable $th){
            DB::rollBack();

        }
    }

    public function saveRoom(){

    }

    public function render()
    {
        return view('livewire.room.edit');
    }
}
