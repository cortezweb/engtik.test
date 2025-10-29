<x-app-layout>
    <x-container class="py-20 flex flex-col items-center justify-center min-h-[70vh]">
        <div class="bg-white rounded-lg shadow-lg pt-24 pb-12 py-8 text-center max-w-xl w-full">
            <svg class="mx-auto mb-6 w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="text-3xl font-bold mb-4 text-green-600">¡Gracias por tu compra!</h1>
            <p class="text-gray-700 mb-6">Tu pago se ha procesado correctamente.<br>En breve recibirás acceso a tus cursos adquiridos.</p>
            <a href="{{ route('courses.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition">Ir a mis cursos</a>
        </div>
    </x-container>
</x-app-layout>
