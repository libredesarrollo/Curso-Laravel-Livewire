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
                    Usuarios
                @endslot

                @slot('html')

                    <x-jet-input wire:model="name" class="mt-1 block w-full" />

                    <x-jet-secondary-button wire:click="cleanFilter">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>

                    </x-jet-secondary-button>

        

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="p-3">Id</th>
                                <th class="p-3">Nombre</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $u)
                                <tr>
                                    <td class="border p-3">{{ $u->id }}</td>
                                    <td class="border p-3">{{ $u->name }}</td>
                                    <td class="border p-3">{{ $u->email }}</td>
                                    <td>
                                    <x-a class="p-1 bg-blue-600" href="{{route('user.edit',$u)}}">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                              </svg>

                                        </x-a>

                                        <x-jet-danger-button wire:click="delete({{ $u->id }})">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <p>No hay registros</p>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <br>

                    {{ $users->links() }}


                @endslot

            </x-card>



        </div>
    </div>
</div>
