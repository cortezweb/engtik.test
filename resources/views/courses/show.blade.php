<x-app-layout>
    <x-container class="mt-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="col-span-1 lg:col-span-2 order-2 lg:order-1">

                {{-- Portada --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-semibold mb-1">
                        {{ $course->title }}
                    </h1>
                    <p class="mb-2">
                        {{$course->summary}}
                    </p>

                    <figure>
                        <img class="w-full aspect-video object-cover object-center" src="{{$course->image}}" alt="">
                    </figure>

                </div>
                {{-- Objetivos --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Objetivos del curso
                    </h2>
                    <div class="bg-white rounded-lg shadow p-6">
                        <ul class="grid  grid-cols-1 lg:grid-cols-2 gap-4 text-gray-800">
                            @foreach ($course->goals as $goal)
                                <li class="flex space-x-4">
                                    <i class="fa-regular fa-circle-check text-lg"></i>
                                    <p>
                                        {{$goal->name}}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Temario --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Temario del curso
                    </h2>
                    <div class="bg-white rounded-lg shadow">
                        <ul class="space-y-4">
                            @foreach ($course->sections as $section)
                                <li x-data="{
                                    open: false
                                }
                                ">
                                    <div class="bg-white rounded-lg">

                                        <button  x-on:click="open = !open" class="flex w-full p-4 text-left bg-gray-50 border-b">
                                            <span class="text-xl font-semibold">
                                                {{$section->name}}
                                            </span>

                                            <span class="ml-auto">
                                                {{$section->lessons->count()}} clases
                                            </span>

                                        </button>

                                        <div class="p-4" x-show="open" x-cloak>
                                                <ul>
                                                    @foreach ($section->lessons as $lesson)
                                                        <li>
                                                            <a href="" class="flex">
                                                                <i class="far fa-play-circle text-blue-500 mt-0.5 mr-2"></i>

                                                                <span class="font-semibold ml-2 text-gray-600 hover:text-blue-800 text-sm">
                                                                    {{$lesson->name}}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Requisitos --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Requisitos del curso
                    </h2>
                    <ul class="list-disc list-inside text-gray-800">
                        @foreach ($course->requirements as $requirement)
                            <li>
                                {{$requirement->name}}
                            </li>
                        @endforeach

                    </ul>
                </div>

                {{-- Description --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Descripción del curso
                    </h2>
                    <div class="text-gray-800">
                        {!! $course->description !!}

                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:order-2 order-1">
                {{-- Sidebar --}}
                 {{-- Precio e inscripcion --}}
            <div class="mb-8 lg:sticky lg:top-20">
                <div class="bg-white rounded-lg shadow p-6 mb-6">


                @can('enrolled', $course)


                    <p class="flex items-center mb-3 text-gray-700">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-semibold text-center">
                            Adquirido el Curso:
                            <strong>
                                {{ optional($course->students()->where('user_id', auth()->id())->first()?->pivot)->created_at ? $course->students()->where('user_id', auth()->id())->first()->pivot->created_at->format('d/m/Y') : '' }}
                            </strong>
                        </span>
                    </p>


                        <a href="{{route('courses.status', $course)}}"
                           class="w-full uppercase block text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg shadow transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                            Continuar con el curso
                        </a>
                @else

                        <p class="font-semibold mb-2 text-2xl text-center ">
                            @if ($course->price->value == 0)
                                <span class="text-green-600">
                                    Gratis
                                </span>

                            @else
                            <span class="text-gray-700">
                                {{number_format($course->price->value, 2)}} USD
                            </span>
                        @endif
                    </p>


                        @livewire('course-enrolled', ['course' => $course])
                @endcan



                </div>

            {{-- Metas --}}
                <h2 class="text-2xl font-semibold mb-4">
                    Metas del curso
                </h2>
                <ul class="space-y-1">
                    <li>
                        <i class="far fa-calendar-alt w-6 mr-2 text-blue-600"></i>Ultima actualización: {{$course->updated_at->format('d/m/Y')}}
                    </li>
                    <li>
                        <i class="far fa-clock inline-block w-6 mr-2 text-blue-600"></i>Duración: {{$course->duration}} horas
                    </li>

                    <li>
                        <i class="fas fa-chart-line inline-block w-6 mr-2 text-blue-600"></i>Nivel: {{$course->level->name}}
                    </li>

                    <li>
                        <i class="fas fa-star inline-block w-6 mr-2 text-yellow-400"></i>calificaciones: 5 {{$course->rating}}
                    </li>

                    <li>
                        <i class="fas fa-infinity inline-block w-6 mr-2 text-blue-600"></i>Aceso de por vida
                    </li>

                    <li>
                        <i class="fas fa-chalkboard-user w-6 mr-2 text-blue-600"></i>Prof: {{$course->teacher->name}}
                    </li>



                </ul>

        </div>
    </x-container>
</x-app-layout>
