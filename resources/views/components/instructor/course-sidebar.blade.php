@props(['course'])

@php
    $links = [
        [
        'name' => 'Información del curso',
        'url' => route('instructor.courses.edit', $course),
        'active' => request()->routeIs('instructor.courses.edit', $course),
        ],

        [
        'name' => 'Video promocional',
        'url' => route('instructor.courses.video', $course),
        'active' => request()->routeIs('instructor.courses.video', $course),
        ],

        [
        'name' => 'Metas del curso',
        'url' => route('instructor.courses.goals', $course),
        'active' => request()->routeIs('instructor.courses.goals', $course),
        ],

        [
        'name' => 'Requisitos del curso',
        'url' => route('instructor.courses.requirements', $course),
        'active' => request()->routeIs('instructor.courses.requirements', $course),
        ],



        // Add more links as needed
    ];
@endphp
<x-container class="py-8">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <aside class="col-span-1">
                <h1 class="font-bold text-2xl mb-4">
                    Edicion del curso
                </h1>
                <nav>
                    <ul class="space-y-2">
                        @foreach ($links as $link)
                        <li class="border-l-4 {{ $link['active'] ? 'border-indigo-400' : 'border-transparent' }} pl-3">
                            <a href="{{ $link['url'] }}" class="text-gray-600 hover:text-blue-500">
                                {{ $link['name'] }}
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </nav>
            </aside>

            <div class="col-span-1 lg:col-span-4">
                <div class="card">
                    {{ $slot }}
                </div>

            </div>
    </div>
</x-container>
