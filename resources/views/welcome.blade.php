<x-app-layout>
    {{-- Portada --}}
    <figure class="mb-20" >
        <img class="w-full aspect-[1/1]  md:aspect-[3/1] object-cover object-center" src="{{asset('img/welcome/banner1.jpg')}}" alt="">
    </figure>
    {{-- Contenido --}}
    <section class="mb-20">
        <x-container>
        <h1 class="text-center text-3xl md:text-4xl font-bold mb-6">
            Contenido
        </h1>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <li>
                <a href="">
                    <img class="aspect-video object-cover object-center rounded-lg" src="{{asset('img/welcome/drones.jpg')}}" alt="">
                </a>
                <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                    <a href="">
                        Curso online
                    </a>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga natus beatae itaque blanditiis illo expedita possimus. Dolorum hic veniam iusto. Perspiciatis eaque cumque explicabo suscipit deserunt odio voluptatem expedita quasi.</p>
            </li>
            <li>
                <a href="">
                    <img class="aspect-video object-cover object-center rounded-lg" src="{{asset('img/welcome/hardware.jpg')}}" alt="">
                </a>
                <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                    <a href="">
                        Curso online
                    </a>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga natus beatae itaque blanditiis illo expedita possimus. Dolorum hic veniam iusto. Perspiciatis eaque cumque explicabo suscipit deserunt odio voluptatem expedita quasi.</p>
            </li>
            <li>
                <a href="">
                    <img class="aspect-video object-cover object-center rounded-lg" src="{{asset('img/welcome/mobile.jpg')}}" alt="">
                </a>
                <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                    <a href="">
                        Curso online
                    </a>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga natus beatae itaque blanditiis illo expedita possimus. Dolorum hic veniam iusto. Perspiciatis eaque cumque explicabo suscipit deserunt odio voluptatem expedita quasi.</p>
            </li>
            <li>
                <a href="">
                    <img class="aspect-video object-cover object-center rounded-lg" src="{{asset('img/welcome/asesorias.jpg')}}" alt="">
                </a>
                <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                    <a href="">
                        Curso online
                    </a>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga natus beatae itaque blanditiis illo expedita possimus. Dolorum hic veniam iusto. Perspiciatis eaque cumque explicabo suscipit deserunt odio voluptatem expedita quasi.</p>
            </li>


        </ul>


        </h1>
        </x-container>
    </section>

    {{-- Cursos --}}
    <section>
        <x-container>
            <h1 class="text-2xl font-semibold text-center mb-8">ULTIMOS CURSOS</h1>

        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($courses as $course)
                <li>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <figure>
                            <img class="w-full aspect-video object-cover object-center" src="{{$course->image}}" alt="{{$course->title}}">
                        </figure>

                    <div class="px-6 pt-4 pb-5">
                        <h1 class="line-clamp-2 text-lg leading-5 min-h-[42px] mb-1">
                            <a href="{{route('courses.show', $course)}}">
                                {{$course->title}}
                            </a>
                        </h1>

                    <p class="text-gray-500 text-sm mb-1">
                        Prof: {{$course->teacher->name}}
                    </p>

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

                    <a href="{{route('courses.show', $course)}}">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Más información
                        </button>
                    </a>
                    </div>
                </div>
                </li>
            @endforeach
        </ul>
        </x-container>
    </section>

</x-app-layout>
