<x-instructor-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Cursos
        </h2>
    </x-slot>


<x-container class="mt-12">
    <div class="md:flex md:justify-end mb-4">
        <a href="{{route('instructor.courses.create')}}" class="btn btn-red block w-full md:w-auto text-center">
            Crear Curso
        </a>
    </div>

    <ul>
        @forelse ($courses as $course)

        <li class="bg-white rounded-lg shadow-lg overflow-hidden mb-2">
            <a href="{{ route('instructor.courses.edit', $course)}}" class="md:flex">
                <figure class="flex-shrink-0">
                    <img src="{{$course->image}}"
                    class="w-full md:w-36 aspect-video md:aspect-square object-cover object-center">
                </figure>

             <div class="flex-1">
                <div class="py-4 px-8">
                <div class="grid md:grid-cols-9">
                    <div class="md:col-span-3">
                            <h1 class="text-lg font-bold">
                                {{$course->title}}
                            </h1>

                        @switch($course->status->name)
                            @case('BORRADOR')
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                {{$course->status->name}}
                            </span>
                                @break
                            @case('PENDIENTE')
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                                {{$course->status->name}}
                            </span></span>

                                @break
                            @case('PUBLICADO')
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                {{$course->status->name}}
                            </span></span>

                                @break
                            @default

                        @endswitch

                        </div>
                        <div class="hidden md:block col-span-2">
                            <p class="text-sm font-bold">
                                 100 USD
                            </p>
                            <p class="mb-1 text-sm">
                                Ganado todo el Mes
                            </p>
                            <p class="text-sm font-bold">
                                1000 USS
                            </p>
                            <P class="text-sm">
                                Ganado en total
                            </P>
                        </div>

                        <div class="hidden md:block col-span-2">
                            <p>
                                50
                            </p>
                            <p class="text-sm">
                                Inscripciones este mes
                            </p>
                        </div>

                        <div class="hidden md:block col-span-2">
                            <div class="flex justify-end">
                                <p class="mr-3">
                                    5
                                </p>
                                <ul class="text-xs space-x-1 flex items-center">
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                </ul>
                            </div>
                        </div>
                </div>
             </div>

            </div>

        </li>

        @empty
        <li class="bg-white rounded-lg shadow-lg overflow-hidden mb-2">
            <div class="flex justify-between items-center p-4">
                <p class="text-gray-500 text-center">No tienes cursos creados</p>

                <a href="{{route('instructor.courses.create')}}" class="btn btn-blue block w-full md:w-auto text-center">
                    Crea tu curso
                </a>
            </div>

        @endforelse
    </ul>
</x-container>



</x-instructor-layout>
