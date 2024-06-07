<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex sm:justify-center items-center m-10">
        <div class="flex ring rounded-[30px] overflow-clip h-80 w-full max-w-[600px] bg-white">
            <div class="left w-1/2 h-full">
                <img class="h-80 object-cover" src="{{$book->full_image_url}}"
                     alt="">
            </div>
            <div class="right w-1/2 flex flex-col gap-4 p-4">
                <div class="top">
                    <h1 class="text-2xl text-blue-600 font-bold">
                        {{$book->title}}
                    </h1>
                    <p class="text-gray-500">
                    <span class="text-2xl font-bold text-gray-700">
                        author:
                    </span>
                        {{$book->user->name}}
                        <span>
                           - {{$book->created_at->diffForHumans()}}
                        </span>
                    </p>
                </div>
                <div class="buttons flex gap-3">
                    <button data-popover-target="popover-default" type="button" class="text-gray-500">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><path fill="{{false? 'red':'white' }}" stroke-width="2" stroke="currentColor"  d="M15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326C31 40 44 30 44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8"/></svg>
                    </button>

                    <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-12 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div class="px-3 py-2">
                            153
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
                <div class="info">
                    <div>
                        Summary:
                    </div>
                    <div class="flex text-gray-700 text-sm flex-col gap-3">
                        {{$book->summary}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
