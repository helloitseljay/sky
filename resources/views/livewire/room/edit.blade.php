  <div class="p-10">
            <span class="text-4xl text-center"> Edit Room </span>
            <div class= "flex flex-col gap-4 p-5 text-black bg-white shadow-lg rounded-xl nt-5 max 24rem-w-sm">

                <x-ui-input label="Room Name" placeholder="Edit Room Name" wire:model='roomName' />

                <x-ui-inputs.number label="Edit Room capacity" wire:model='roomCapacity'/>

                <x-ui-input label="Room Description" placeholder="Modify room description" wire:model='roomDescription' />

                <x-ui-button orange label="Save" wire:click='update({{$room->id}})' />

            </div>


</div>
