<div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="col-span-1  lg:col-span-2">


            @if ($current->platform == 1)
                <video class="w-full aspect-video" controls>
                    <source src="{{Storage::url($current->video_path)}}" type="video/mp4">
                </video>
            @else

            <iframe class="w-full aspect-video"
            src="https://www.youtube.com/embed/{{$current->video_path}}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen></iframe>

            @endif




            <h1 class="text-2xl font-bold text-gray-800 mt-4">
                {{$lessons->pluck('id')->search($current->id)+1}}. {{$current->name}}
            </h1>

            @if ($current->description)
                <p class="mt-2 text-gray-600">
                    {{$current->description}}
                </p>
            @endif


            @auth
                <div class= "flex items-center space-x-2">
                    <x-toggle wire:model="completed" label="Marcar esta unidad Culminada"/>
                </div>

            @endauth


            <div class="bg-white shadow-xl rounded-lg px-6 py-4 mt-6">
                <div class="flex justify-between">
                    <button wire:click="previousLesson()" class="font-bold">
                        Tema Anterior
                    </button>

                    <button wire:click="nextLesson()" class="font-bold">
                        Tema Siguiente
                    </button>
                </div>

            </div>

        </div>

        <aside class="col-span-1">
                <div class="card">
                    <h1 class="text-2xl font-bold leading-8 text-center text-gray-800 mt-4">
                        <a class="hover:text-blue-600" href="{{route('courses.show', $course)}}">
                            {{$course->title}}
                        </a>
                    </h1>

                    <div class="flex items-center">
                        <figure>
                            <img class="w-12 h-12 object-center rounded-full" src="{{$course->teacher->profile_photo_url}}" alt="">
                        </figure>

                        <div class="flex-1">
                            <p>
                                {{$course->teacher->name}}
                            </p>
                        </div>



                    </div>

                {{-- Avance --}}

                <div class="mt-2">
                    <p class="text-gray-600 text-sm">
                        {{$advance}}% Completo
                    </p>

                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div
                            class="bg-blue-500 h-full shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center"
                            style="width:{{ $advance }}%">
                        </div>
                        </div>
                    </div>
                </div>

                {{-- secciones --}}
                @foreach ($sections as $section)
                    <li x-data="{ open: '{{$section['id'] == $current->section_id}}' }" class="mb-4">
                        <button x-on:click="open = !open" class="text-left flex justify-between">
                            <span>
                                {{$section['name']}}
                            </span>

                            <i class="mt-1 fas"  x-bind:class="open ? 'fa-angle-up' : 'fa-angle-down'"></i>
                        </button>

                        <ul class="space-y-1 mt-2" x-show="open" x-cloak>
                            @foreach ($section['lessons'] as $lesson)
                            <li >
                                <a href="{{route('courses.status', [$course, $lesson['slug']])}}" class="w-full flex">
                                    <i class="fa-solid {{$lesson['id'] == $current->id ? 'fa-circle-dot' : 'fa-circle' }}  mt-1 mr-2 {{ $open_lessons->where('lesson_id', $lesson['id'])->where('user_id', auth()->id())->where('completed', 1)->count() ? 'text-yellow-500' : '' }}"></i>

                                    <span>
                                        {{$lessons->pluck('id')->search($lesson['id']) + 1 }}. {{$lesson['name']}}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>


                    </li>
                @endforeach
                </div>
        </aside>
    </div>
</div>
