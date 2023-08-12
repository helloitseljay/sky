<div class="p-10">
    <span class="text-4xl text-center"> Edit User </span>
    <div class= "flex flex-col gap-4 p-5 text-gray-500 bg-white shadow-lg rounded-xl nt-5 max 24rem-w-sm">
        <x-ui-input label="First Name" placeholder="First name" wire:model='firstName' />

        <x-ui-input label="Middle Name" placeholder="Middle name" wire:model='middleName' />

        <x-ui-input label="Last Name" placeholder="Last name" wire:model='lastName' />

        <x-ui-input label="Email Address" placeholder="Email Address" wire:model="email" />


        <x-ui-button orange label="Save" wire:click='update({{$user->id}})' />

    </div>
        {{-- Be like water. --}}

</div>
