<div class="space-y-4">
    {{-- Video --}}

    <div>
        @if ($editVideo)
            <div x-data="{
                platform: @entangle('platform'),
            }">
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
                <div>
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

                <div class="flex justify-end space-x-2 mt-4">
                    <x-danger-button wire:click="$set('editVideo', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button class="ml-2" wire:click="saveVideo">
                        Actualizar
                    </x-button>
                </div>
            </div>


        @else
                <div>
                    <h2 class="font-semibold text-lg mb-1">
                        Video del curso
                    </h2>

                    @if ($lesson->is_processed)

                        <div>

                            <div class="md:flex md:items-center mb-2">
                                <img src="{{$lesson->image}}" alt="{{$lesson->name}}"
                                class="w-full md:w-20 aspect-video object-cover object-center rounded-lg">
                                <p class="text-sm truncate md:flex-1 md:ml-4">
                                    {{$lesson->video_original_name ?? 'Lección sin video'}}
                                    <br>
                                </p>
                            </div>

                            <x-button wire:click="$set('editVideo', true)" class="mt-2">
                                Video
                            </x-button>

                        </div>

                    @else

                    <div>
                        <table class="table-auto w-full">

                            <thead class="border-b border-gray-200">
                                <tr class="font-bold">
                                    <td class="px-4 py-2">
                                        Nombre del archivos
                                    </td>
                                    <td class="px-4 py-2">
                                        Tipo
                                    </td>
                                    <td class="px-4 py-2">
                                        Estado
                                    </td>
                                    <td class="px-4 py-2">
                                        Fecha
                                    </td>


                                </tr>
                            </thead>

                            <tbody class="boder-b boder-gray-200" >
                                <tr>
                                    <td class="px-4 py-2">
                                        {{$lesson->video_original_name}}
                                    </td>
                                    <td class="px-4 py-2">
                                        Video
                                    </td>
                                    <td class="px-4 py-2">
                                        Procesando
                                    </td>
                                    <td class="px-4 py-2">
                                        {{$lesson->created_at->format('d/m/Y')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <p class="mt-2">El video esta procesando...</p>

                    </div>

                    @endif




                </div>
        @endif
    </div>
    <hr>

    {{-- Description --}}

    <div>
        <h2 class="font-semibold text-lg mb-1 mt-4">
            Description del curso
        </h2>

        @if ($editDescription)
            <form action="" wire:submit="saveDescription">
                <div x-data="{
                    content: @entangle('description'),
                }"
                x-init="
                ClassicEditor
                    .create($refs.editor)
                    .then(editor=> {
                        if (content){
                            editor.setData(content);
                        }

                        editor.model.document.on('change:data', () => {
                            content = editor.getData();

                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
                        ">
                <x-textarea x-ref="editor" wire:model="description">{{$description}} </x-textarea>
                </div>

                <div class="flex justify-end mt-4 ">
                    <x-button>
                        Actualizar
                    </x-button>
                </div>

            </form>
        @else

        <div class="text-gray-600 ckeditor mb-2">
            {!! $lesson->description ?? 'Aun se ha escrito ninguna description' !!}
        </div>

        <x-button wire:click="$set('editDescription', true)">
            Description
        </x-button>




        @endif


    </div>

</div>
