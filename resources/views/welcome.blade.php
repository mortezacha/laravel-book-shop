<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row grid grid-cols-3 gap-1 flex-wrap sm:justify-center items-center m-10 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        @foreach($books as $book)
            <div class="sm:max-w-md m-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-2xs mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="px-1 py-2 w-full">
                                <img class="w-full h-52" src="{{$book->full_image_url}}" alt="">
                            </div>
                            <div>
                                <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{$book->title}}
                                </h5>
                                <p class="h-12 my-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{$book->summary}}
                                </p>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center">
        {{$books->link()}}
    </div>


</x-guest-layout>
