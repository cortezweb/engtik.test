<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Curso: {{$course->title}}
        </h2>
    </x-slot>


    <x-instructor.course-sidebar :course="$course">
        <form action="{{route('instructor.courses.update', $course)}}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <p class="text-2xl font-semibold">
                            información del curso
                        </p>

                        <hr class="mt-2 mb-6">

                        <x-validation-errors class="mb-4"/>

                        <div class="mb-4">
                            <x-label value="Título del curso" class="mb-1"/>
                            <x-input type="text"  class="w-full" value="{{old('title',$course->title)}}" name="title" />
                        </div>

                        @empty($course->published_at)

                        <div class="mb-4">
                            <x-label value="Slug del curso" class="mb-1"/>
                            <x-input type="text"  class="w-full" value="{{old('slug',$course->slug)}}" name="slug" />
                        </div>

                        @endempty

                        <div class="mb-4">
                            <x-label value="Resumen del curso" class="mb-1"/>
                            <x-textarea class="w-full" name="summary">{{old('summary',$course->summary)}}</x-textarea>
                        </div>

                        <div class="mb-4 ckeditor">
                            <x-label value="Descripción del curso" class="mb-1"/>
                            <x-textarea id="editor" class="w-full" name="description">{{old('description',$course->description)}}</x-textarea>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <x-label class="mb-1">
                                    Categorías
                                </x-label>

                                <x-select class="w-full"
                                name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            @selected(old('category_id', $course->category_id) == $category->id)>
                                            {{$category->name}}
                                        </option>

                                    @endforeach
                                </x-select>
                            </div>

                            <div>
                                <x-label class="mb-1">
                                    Niveles
                                </x-label>

                                <x-select
                                class="w-full"
                                name="level_id">
                                    @foreach ($levels as $level)
                                        <option value="{{$level->id}}"
                                            @selected(old('level_id', $course->level_id) == $level->id)>
                                            {{$level->name}}
                                        </option>

                                    @endforeach
                                </x-select>
                            </div>

                            <div>
                                <x-label class="mb-1">
                                    Precios
                                </x-label>

                                <x-select
                                class="w-full"
                                name="price_id">
                                    @foreach ($prices as $price)
                                        <option value="{{$price->id}}"
                                            @selected(old('price_id', $course->price_id) == $price->id)>
                                            @if ($price->value == 0)
                                                Gratis
                                            @else
                                                {{$price->value}} US$ (nivel {{$loop->index}})
                                            @endif
                                        </option>
                                    @endforeach
                                </x-select>

                            </div>

                        </div>

                        <div>
                            <p class="text-2xl font-semibold mb-2">
                                Imagen del curso
                            </p>

                            <div class="grid md:grid-cols-2 gap-4">
                                <figure>
                                    <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{$course->image}}" alt="">
                                </figure>

                                <div>
                                    <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime exercitationem quaerat excepturi aliquam fugiat odit vel quis velit eaque, iusto veniam laborum animi, modi commodi, aperiam accusamus omnis eligendi in.</p>

                                <label>
                                    <span class="btn btn-blue md:hidden cursor-pointer">
                                        Seleccionar imagen
                                    </span>
                                    <input class="hidden md:block"
                                    type="file"
                                    accept="image/*"
                                    name="image"
                                    onchange="preview_image(event, '#imgPreview')"
                                    >
                                </label>

                        <div class="flex md:justify-end mt-4">
                            <x-button>
                            Actualizar imagen
                            </x-button>
                        </div>
                                </div>

                            </div>


                        </div>
        </form>
    </x-instructor.course-sidebar>








    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
         .create(document.querySelector('#editor'))
         .catch(error => {

         })
    </script>
    @endpush

</x-instructor-layout>
