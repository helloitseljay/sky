  <div class="p-10">
            <span class="text-4xl text-center"> Edit Event </span>
            <div class= "flex flex-col gap-4 p-5 bg-white shadow-lg text-gray-50 rounded-xl nt-5 max 24rem-w-sm">

                <x-ui-input label="Room" placeholder="Enter Room Number" wire:model='roomName' />

                <x-ui-inputs.number label="Name of Event" wire:model='eventName'/>

                <x-ui-textarea wire:model="description" label="Comment" placeholder="Write event details..." wire:model='eventDescription'/>

                <x-ui-datetime-picker label="Event Start" placeholder="When is the Event" wire:model.defer="normalPicker" />

                <x-ui-datetime-picker label="Event End" placeholder="Event will end on" wire:model.defer="normalPicker" />

                <x-ui-input label="Room ID" placeholder="Enter Room ID" wire:model='roomId' />




                <x-ui-button orange label="Save" wire:click='update({{$event->id}})' />

            </div>
                {{-- Be like water. --}}

        </div>
