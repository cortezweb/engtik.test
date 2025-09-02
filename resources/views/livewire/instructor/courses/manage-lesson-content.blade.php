<div>
    {{-- Video --}}
    @if ($editVideo)
        <div>
            Estar por editar el video
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
