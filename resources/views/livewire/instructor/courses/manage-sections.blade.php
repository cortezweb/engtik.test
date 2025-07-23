<div>
    {{--Listar Section--}}

    <ul class="mb-6 space-y-6">
        @foreach ($sections as $section)
            <li>
                <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4 mb-4">
                    <div class="md:flex md:items-center">
                    <h1 class="md:flex-1 truncate">
                        Seccion{{$section->position}}:
                        <br class="md:hidden">
                        <span class="font-semibold">
                            {{ $section->name }}
                        </span>
                    </h1>

                    <div class="space-x-3 md:shrink-0 md:ml-4">
                        <button>
                            <i class="fas fa-edit hover:text-indigo-600"></i>
                        </button>

                        <button>
                            <i class="fas fa-trash-alt hover:text-red-600"></i>
                        </button>
                    </div>

                </div>


            </div>
            </li>


        @endforeach
    </ul>

    {{--Crear Section --}}
    <form wire:submit="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nuevo Sección
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la Section"/>

            <x-input-error for="name" class="mt-2"/>


            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar Section
                </x-button>

            </div>
        </div>
    </form>


</div>
