<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>

    <div class="p-12">
            <div class="flex">
                <a href="{{route('my_books.create')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 capitalize">Add Book</a>

            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500" >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">title</th>
                    <th scope="col" class="px-6 py-3">owner</th>
                    <th scope="col" class="px-6 py-3">created at</th>
                    <th scope="col" class="px-6 py-3">actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($books as $book)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex space-x-3">
                            <img src="{{$book->full_image_url}}" class="w-10 h-10" alt="{{$book->title}}">
                            <h1 class="my-2 text-center font-semibold">
                                <a href="#" class="font-medium hover:underline text-blue-600">
                                    {{$book->title}}
                                </a>
                            </h1>
                        </th>
                        <td class="px-6 py-4">
                            {{$book->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$book->created_at->diffForHumans()}}
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{route('my_books.edit',$book)}}" class="font-semibold text-blue-600 hover:underline"> Edit </a>
                            <button data-modal-target="delete-modal-{{$book->id}}" data-modal-toggle="delete-modal-{{$book->id}}" class="font-semibold text-red-600 hover:underline"> Delete </button>
                        </td>
                    </tr>

                    <div id="delete-modal-{{$book->id}}" tabindex="-1" x-data="{
                     deleteBook(url){
                     axios.delete(url).then(function(res){
                     if(res.status == 204){
                        location.reload()
                     }
                        console.log(res)
                     }).catch(function(err){
                        console.log(err)
                     })
                     }}"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{$book->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                    <button @click="deleteBook(`{{route('my_books.delete',$book)}}`)" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="delete-modal-{{$book->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                @empty
                    <tr class="bg-white border-b">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No books found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
    </div>

    <div class="flex justify-center pb-3">
        {{$books->links()}}
    </div>
</x-app-layout>
