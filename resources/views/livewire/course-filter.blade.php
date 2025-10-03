<div>
    <x-container class="mt-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <aside class="col-span-1">
                {{-- ordenar por --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold mb-4">
                        Ordenar por:
                    </p>

                    <x-select>
                        <option value="published_at">
                            Más recientes
                        </option>
                        <option value="students_count">
                            Más alumnos
                        </option>
                        <option value="rating">
                            Mejor calificados
                        </option>
                    </x-select>
                </div>

                {{-- Filtrar por categorias --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold">
                        Categorias
                    </p>

                    <ul class="space-y-1">
                        @foreach ($categories as $category)
                            <li>
                                <label>
                                    <x-checkbox wire:model.live="selectedCategories" value="{{ $category->id }}" />
                                    {{ $category->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>

                </div>

                {{-- Filtrar por niveles --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold mb-4">
                        Niveles
                    </p>

                    <ul class="space-y-1">
                        @foreach ($levels as $level)
                            <li>
                                <label>
                                    <x-checkbox wire:model.live="selectedLevels"  value="{{ $level->id }}" />
                                    {{ $level->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="text-lg font-semibold mb-4">
                        Precios
                    </p>


                    <ul class="space-y-1">
                        <li>
                            <label>
                                <x-checkbox wire:model.live="selectedPrices" value="free" />
                                Gratis
                            </label>
                        </li>
                        <li>
                            <label>
                                <x-checkbox wire:model.live="selectedPrices" value="premium" />
                                Premium
                            </label>
                        </li>
                </div>


            </aside>

            <div class="col-span-3 lg:col-span-3">
                {{-- Buscador --}}
                <div class="mb-12">
                    <x-input wire:model.live="search" placeholder="¿Qué curso buscas?" class="w-full" />
                </div>

                {{-- Listado de cursos --}}

                <ul class="space-y-4">
                    @foreach ($courses as $course)
                    {{-- <li wire:key="course-{{$course->id}}" class="mb-6"> --}}
                        <li class="mb-6">
                           <a href="{{route('courses.show', $course)}}" class="block sm:flex w-full">
                                <figure>
                                    <img class="w-full sm:w-64 aspect-video object-cover object-center " src="{{$course->image}}" alt="">
                                </figure>

                            <div class="sm:ml-4 mt-2 sm:mt-0 flex-1">
                                <h3 class="text-xl font-semibold">
                                    {{$course->title}}
                                </h3>


                            <p class="text-sm text-gray-600">
                                {{$course->summary}}
                            </p>

                            <p class="text-sm text-gray-500 mb-1" >
                               Prof: {{$course->teacher->name}}
                            </p>
                            <div class="flex items-center">
                                <ul class="text-xs flex space-x-1 mb-1">
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                </ul>

                                <span class="text-sm text-gray-500 font-semibold ml-1">
                                    (5)
                                </span>

                            </div>

                            <p class="font-semibold mb-2">
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

                             </div>
                           </a>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-6">
                    {{$courses->links()}}
                </div>

            </div>
        </div>
    </x-container>
</div>
