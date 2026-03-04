<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'url' => '#',
    ],
    [
        'name' => 'Proyectos',
    ]
]">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="card">
            <div class="flex" >
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

            <div class="ml-4" >
                <p class="text-lg font-semibold" >
                    Bienvenido, {{ auth()->user()->name }}
                </p>

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="text-sm text-gray-500 hover:text-gray-700">
                    Cerrar Sesión
                </button>

            </form>
            </div>

            </div>
        </div>

        <div class="card">
            <div class="flex flex-col items-center justify-center h-full">
                <p class="text-2xl font-semibold">
                    Coders Free
                </p>
            </div>
        </div>
    </div>




</x-admin-layout>
