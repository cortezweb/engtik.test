<x-app-layout>
    <x-container width="5xl">
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            @forelse ($courses as $course)
                <li class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                    <a href="{{route('courses.status', $course)}}" class="flex-1 flex flex-col">
                        <figure>
                            <img src="{{ $course->image}}" class="aspect-video w-full object-center object-cover" alt="">
                        </figure>
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <p class="truncate text-lg font-bold text-gray-800 mb-2">{{ $course->title }}</p>
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-sm text-gray-500">Instructor: {{ $course->teacher->name ?? 'N/A' }}</span>
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">{{ $course->level->name ?? 'Nivel' }}</span>
                            </div>
                            <a href="{{route('courses.status', $course)}}" class="mt-4 inline-block bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-blue-700 transition">Ver curso</a>
                        </div>
                    </a>
                </li>
            @empty
                <li class="col-span-4 flex flex-col items-center justify-center py-16">
                    <img src="/img/empty-courses.svg" alt="Sin cursos" class="w-32 mb-6 opacity-70">
                    <p class="text-gray-700 text-xl font-semibold mb-2">No tienes ningún curso inscrito.</p>
                    <a href="{{ route('courses.index') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Explorar cursos</a>
                </li>
            @endforelse
        </ul>
    </x-container>
</x-app-layout>
