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
                        {{ $msj }}
                    @endif

                    <form wire:submit.prevent="submit" class="max-w-screen-md m-auto">

                        <input type="hidden" name="user_id" value="{{ $userId }}">

                        <x-jet-label>Usuario</x-jet-label>
                        <x-jet-input type="text" class="w-full" wire:model.defer="name" placeholder="Nombre" />

                        @error('name')
                            {{ $message }}
                        @enderror

                        <x-jet-label class="mt-2">Email</x-jet-label>
                        <x-jet-input class="w-full" type="email" wire:model="email" placeholder="Email" />

                        @error('email')
                            {{ $message }}
                        @enderror

                        <x-jet-label class="mt-2">Password</x-jet-label>
                        <x-jet-input class="w-full" type="password" wire:model="password" placeholder="Contraseña" />

                        @error('password')
                            {{ $message }}
                        @enderror

                        <x-jet-label class="mt-2">Avatar</x-jet-label>
                        <x-jet-input class="w-full" type="file" wire:model="avatar" />

                        @error('avatar')
                            {{ $message }}
                        @enderror

                        <x-jet-secondary-button class="mt-2" type="submit">
                            Enviar
                        </x-jet-secondary-button>
                    </form>

                    <x-jet-secondary-button class="mt-2" wire:click="$emit('refreshData')">
                        Limpiar Form
                    </x-jet-secondary-button>

                @endslot

            </x-card>



        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    window.onload = function() {

        Livewire.on('userSave', (msj) => {
            Swal.fire(msj)
        })
    }

</script>
