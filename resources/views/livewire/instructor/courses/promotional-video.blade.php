<div>
    <h1 class="text-2xl font-semibold">
        Video Promocional del Curso
    </h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
            <video class="aspect-video w-full object-cover" controls>
                <source src="{{Storage::url($course->video_path)}}">
                Tu navegador no soporta el elemento de video.
            </video>
            @else
                <figure>
                    <img  class="w-full aspect-video object-cover" src="{{$course->image}}" alt="{{$course->title}}">
                </figure>
            @endif
        </div>
        <div class="col-span-1">
           <form wire:submit="save">
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere doloremque ut, nam, eveniet deleniti doloribus delectus perspiciatis odio adipisci qui animi ad facilis maxime illum id esse. Beatae, ut iste.</p>

                    <x-progress-indicators wire:model="video"/>

                        <div class="flex justify-end mt-4">
                            <x-button>
                                Subir Video
                            </x-button>
                        </div>
            </form>

        </div>
    </div>

</div>
