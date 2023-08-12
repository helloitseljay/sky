<div class="p-10">
    <span class="text-4xl text-center"> Create an Event </span>
    <div class= "flex flex-col gap-4 p-5 text-black bg-white shadow-lg rounded-xl nt-5 max 24rem-w-sm">
        <x-ui-input label="Room" placeholder="Enter Room" wire:model='eventName' />

        <x-ui-textarea wire:model="description" label="Comment" placeholder="Write event details..." wire:model='eventDescription'/>

        <x-ui-datetime-picker label="Event Start" placeholder="When is the Event" wire:model="event_start" />

        <x-ui-datetime-picker label="Event End" placeholder="Event will end on" wire:model="event_end" />

        <x-ui-select label="Event Room" wire:model.defer="roomId" placeholder="Select some user" :async-data="route('api.room.references')" option-label="name"  option-value="id" />


        <x-ui-button orange label="Save" wire:click='create' />

    </div>

        {{-- Be like water. --}}

</div>
