<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">



            <x-card>

        


                @slot('title')
                    Crear Usuario
                @endslot

                @slot('html')

                @if ($msj)
                    {{$msj }}
                @endif


                    <form wire:submit.prevent="submit">
                        <x-jet-input type="text" wire:model="name" placeholder="Nombre" />

                        @error('name')
                            {{ $message }}
                        @enderror

                        <x-jet-input type="email" wire:model="email" placeholder="Email" />

                        @error('email')
                            {{ $message }}
                        @enderror

                        <x-jet-input type="password" wire:model="password" placeholder="Contraseña" />

                        @error('password')
                            {{ $message }}
                        @enderror

                        <x-jet-input type="file" wire:model="avatar"/>

                        @error('avatar')
                            {{ $message }}
                        @enderror

                        <x-jet-secondary-button type="submit">
                            Enviar
                        </x-jet-secondary-button>
                    </form>

                @endslot

            </x-card>



        </div>
    </div>
</div>
