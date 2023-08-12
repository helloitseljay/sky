<div class="p-10">
    <span class="text-4xl text-center"> Create User </span>
    <div class= "flex flex-col gap-4 p-5 text-white bg-white shadow-lg rounded-xl nt-5 max 24rem-w-sm">
        <x-ui-input label="First Name" placeholder="First name" wire:model='firstName' />

        <x-ui-input label="Middle Name" placeholder="Middle name" wire:model='middleName' />

        <x-ui-input label="Last Name" placeholder="Last name" wire:model='lastName'/>

        <x-ui-input label="Email Address" placeholder="Email Address" wire:model="email" />

        <x-ui-inputs.password label="Password" placeholder="Password" wire:model='password' />

        <x-ui-inputs.password label="Confirm Password" placeholder="Confirm Password" wire:model='password_confirmation' />

        <x-ui-button orange label="Save" wire:click='create' />

    </div>
        {{-- Be like water. --}}

</div>
