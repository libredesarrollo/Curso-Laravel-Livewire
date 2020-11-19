<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            <x-card>
                @slot('title')
                    Usuarios
                @endslot

                @slot('html')
                    <livewire:users-list></livewire:users-list>
                @endslot

            </x-card>



        </div>
    </div>
</x-app-layout>
