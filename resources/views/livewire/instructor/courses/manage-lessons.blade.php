<div>

    <div x-data="{
        destroyLesson(lessonId) {
                Swal.fire({
            title: 'Estas Seguro?',
            text: 'No podras revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, borralo!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {

                @this.call('destroy', lessonId);
            }
            });
        }

    }"
    x-init="
    new Sortable($refs.lessons, {
                group: 'lessons',
                animation: 150,
                handle: '.handle-lesson',
                ghostClass: 'blue-background-class',
                store: {
                    set: (sortable) => {

                    Livewire.dispatch('sortLessons',
                    {
                        sorts: sortable.toArray(),
                        sectionId: {{$section->id}}
                    })
                    }
                }
            });"

    class="mb-6">

        <ul class="space-y-4" x-ref="lessons">
            {{-- Listar Lecciones --}}
            @foreach ($lessons as $lesson)

                <li wire:key="lesson-{{ $lesson->id }}" data-id="{{$lesson->id}}">
                    {{-- Editar y Mostrar Lecciones --}}
                    <div class="bg-white rounded-lg shadow-lg px-6 py-4">
                    @if ($lessonEdit['id'] == $lesson->id)

                        <form wire:submit="update">
                            <div class="flex items-center space-x-2">
                                <x-label>
                                    Lección:
                                </x-label>

                                    <x-input wire:model="lessonEdit.name" class="flex-1"/>
                            </div>

                            <div class="flex justify-end mt-4">
                                <div class="space-x-2">
                                    <x-danger-button wire:click="$set('lessonEdit.id', null)">
                                        Cancelar
                                    </x-danger-button>

                                    <x-button class="ml-2">
                                        Actualizar
                                    </x-button>
                                </div>



                            </div>

                        </form>

                       @else

                        <div x-data="{
                            open: true
                        }">
                            <div class="md:flex md:items-center">

                                <h1 class="md:flex-1 truncate cursor-move handle-lesson">
                                <i class="fas fa-play-circle text-blue-500"></i>
                                Lección {{$orderLessons->search($lesson->id) + 1}}:
                                {{$lesson->name }}
                                </h1>

                                <div class="space-x-3 md:shrink-0 md:ml-4">
                                        <button wire:click="edit({{$lesson->id}})">
                                            <i class="fas fa-edit hover:text-indigo-600"></i>
                                        </button>

                                        <button x-on:click="destroyLesson({{$lesson->id}})">
                                            <i class="fas fa-trash-alt hover:text-red-600"></i>
                                        </button>

                                        <button x-on:click="open = !open">
                                            <i class="fas hover:text-blue-600"
                                            :class="{
                                                'fa-chevron-up': open,
                                                'fa-chevron-down': !open,
                                            }"></i>
                                        </button>
                                </div>
                            </div>

                        <div x-show="open" x-cloak class="mt-4">
                            @livewire('instructor.courses.manage-lesson-content', ['lesson' => $lesson],
                             key('section-'. $section->id . '-lesson-' . $lesson->id))
                        </div>

                     </div>
                        @endif
                    </div>
                </li>
            @endforeach

        </ul>
    </div>



    {{-- Creacion --}}

    <div x-data="
        {
        open: @entangle('lessonCreate.open'),
        platform: @entangle('lessonCreate.platform'),
        }">

        <div x-on:click="open = !open"
            class="h-6 w-12 -ml-4 bg-indigo-200 hover:bg-indigo-300 flex items-center justify-center cursor-pointer"
            style="clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 0 51%, 0% 0%);">

            <i class="-ml-2 text-sm fas fa-plus transition duration-300"
                :class="{
                    'transform rotate-45': open,
                    'transform rotate-0': !open
                }"></i>
        </div>

        <form
            wire:submit="store"
            class="mt-4 bg-white rounded-lg shadow-lg p-6"
            x-show="open" x-cloak>
            <div class="p-6">
                <div class="mb-2">
                    <x-input
                    wire:model="lessonCreate.name"
                    placeholder="Nombre de la lección"
                    class="w-full"/>
                    <x-input-error for="lessonCreate.name" />
                </div>
                <div>
                    <x-label class="mb-2">
                        Plataformas
                    </x-label>

                <div class="md:flex md:items-center md:space-x-4 mb-2 space-y-4 md:space-y-0">
                        <div class="md:flex md:items-center md:space-x-4 space-y-4 md:space-y-0">
                            <button type="button"
                            class="inline-flex flex-col justify-center items-center w-full md:w-20 h-24 border rounded"
                            :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                            x-on:click="platform = 1">
                                <i class="fas fa-video text-2xl"></i>
                                <span class="text-sm mt-2">
                                    Video
                                </span>
                            </button>

                            <button type="button"
                            class="inline-flex flex-col justify-center items-center w-full md:w-20 h-24 border rounded"
                            :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                            x-on:click="platform = 2">
                                <i class="fab fa-youtube text-2xl"></i>
                                <span class="text-sm mt-2">
                                    YouTube
                                </span>
                            </button>
                        </div>

                        <p>
                            Primero selecciona la plataforma y luego sube el video o coloca el enlace de YouTube.
                        </p>

                </div>

                    <div class="mt-2" x-show="platform == 1" x-cloak>
                                    <x-label>
                                        Video
                                    </x-label>

                                <x-progress-indicators wire:model="video"/>
                    </div>

                    <div class="mt-2" x-show="platform == 2" x-cloak>
                                <x-label>
                                    Enlace de YouTube
                                </x-label>

                            <x-input
                                wire:model="url"
                                placeholder="inserta el enlace de YouTube"
                                class="w-full"/>
                    </div>

                </div>
            </div>

            <div class="flex justify-end px-6 py-4 bg-gray-100">
                <x-danger-button  x-on:click="open = false">
                    Cancelar
                </x-danger-button>

                <x-button class="ml-2">
                    Guardar
                </x-button>

            </div>

        </form>


    </div>
</div>
