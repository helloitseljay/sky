<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    use Actions;
    public $eventName;
    public $slug;
    public $eventDescription;
    public $eventStart;
    public $eventEnd;
    public $roomId;

    public $rules = [
        'eventName' => 'required',
        'eventStart' => 'required',
        'eventEnd' => 'required',
    ];

    public function create(){

        $this->validate();

        try {
            DB::beginTransaction();

            $event = new Event();
        $event->slug = Str::slug($this->eventName, '-');
        $event->name = $this->eventName;
        $event->description = $this->eventDescription;
        $event->event_start = Carbon::parse($this->eventStart)->toDateTimeString();
        $event->event_end = Carbon::parse($this->eventEnd)->toDateTimeString();
        $event->room_id = $this->roomId;

            if($event->save()){
            DB::commit();
            $this->dialog()->success(
                $title = 'Entry Saved',
                $description = 'Your event details has been saved'
            );
            } else {
            DB::rollBack();
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'Your profile was not saved'

            );
            }
         } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

    }
    public function render()
    {
        return view('livewire.event.create');
    }
}
