<div>
    <x-container class="py-12">
        <div class="grid grid-cols-4 gap-6">
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
                                    <x-checkbox value="{{ $category->id }}" />
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
                                    <x-checkbox value="{{ $level->id }}" />
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
                                <x-checkbox value="free" />
                                Gratis
                            </label>
                        </li>
                        <li>
                            <label>
                                <x-checkbox value="premium" />
                                Premium
                            </label>
                        </li>
                </div>


            </aside>

            <div class="col-span-3">

            </div>
        </div>
    </x-container>
</div>
