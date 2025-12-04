<x-app-layout>

    <x-container class="mt-8">

        @livewire('course-status', [
                'course' => $course,
                'lessons' => $lessons,
                'lesson' => $lesson,
            ])

</x-container>

</x-app-layout>
