<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Validation\Rule;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class Edit extends Component
{
    use Actions;
    public $eventName;
    public $eventDescription;
    public $eventStart;
    public $eventEnd;
    public $event;

    public function mount(Event $event){
        // dd($event);
        $this->event = $event; //select * from user where id= user
        $this->eventName  = $event->name;
        $this->eventDescription = $event->description;
        $this->eventStart = $event->event_start;
        $this->eventEnd = $event->event_end;

    }
    public function update($id){

        $validated = Validator::make(
            [
                'eventName' =>$this->eventName,
                'eventDescription' =>$this->eventDescription,
                'eventStart' =>$this->eventStart,
                'eventEnd'=>$this->eventEnd,

            ],
            [
                'eventName' => 'required',
                'eventDescription' => 'required',
                'eventStart' => 'required',
                'eventEnd' => 'required',
                'event' => [

                    Rule::unique('events', 'id'),
                ]
            ],
        )->validate();

        try{
            DB::beginTransaction();

            $room = Event::find($id);
            $room->name = $this->eventName;
            $room->description = $this->eventDescription;
            $room->event_start = $this->eventStart;
            $room->event_end = $this->eventEnd;

            if($room->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Event date query saved",
                    $description = 'Your event was successfully saved'
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
            dd($th->getMessage());
        }
    }

    public function saveRoom(){

    }


    public function render()
    {
        return view('livewire.event.edit');
    }
}
