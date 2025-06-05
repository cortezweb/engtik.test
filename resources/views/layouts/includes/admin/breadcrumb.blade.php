@if (count($breadcrumb) > 0)
<!-- Breadcrumb -->
<nav class="justify-between px-4 py-3 mb-2 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">


    @foreach ($breadcrumb as $item)
    <li>
    <div class="flex items-center">

        @if ($loop->first)

        @else

        @endif

        @isset($item['url'])
        <a href="{{ $item['url'] }}"
        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{$item['name']}}</a>
        <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        @else



        @endisset

        </div>
    </li>
  {{-- <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ $item['url'] }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">develop</a>
      </div>
    </li> --}}





    @endforeach

  </ol>

</nav>

@endif

