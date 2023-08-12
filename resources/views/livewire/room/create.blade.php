<div class="p-10">
    <span class="text-4xl text-center"> Create Room </span>
    <div class= "flex-col gap-4 p-5 bg-white shadow-lg text-gray-50flex rounded-xl nt-5 max 24rem-w-sm">
        <x-ui-input label="Room" placeholder="Enter Room Number" wire:model='roomName' />

        <x-ui-inputs.number label="Room Capacity" wire:model='roomCapacity'/>

        <x-ui-textarea wire:model="description" label="Comment" placeholder="Write room description..." wire:model='roomDescription'/>

        <x-ui-button orange label="Save" wire:click='createRoom' />

    </div>
        {{-- Be like water. --}}

</div>
