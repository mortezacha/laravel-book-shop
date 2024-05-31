<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>

    <div class="p-12">
            <div class="flex">
                <h3 class="text-2xl py3 font-bold capitalize text-indigo-700">
                    my books
                </h3>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500" x-data="{
                     deleteBook(url){
                     axios.delete(url).then(function(res){
                     if(res.status == 204){
                        location.reload()
                     }
                        console.log(res)
                     }).catch(function(err){
                        console.log(err)
                     })
                     }}">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">title</th>
                    <th scope="col" class="px-6 py-3">owner</th>
                    <th scope="col" class="px-6 py-3">created at</th>
                    <th scope="col" class="px-6 py-3">actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
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
                            <button @click="deleteBook(`{{route('my_books.delete',$book)}}`)" class="font-semibold text-red-600 hover:underline"> Delete </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <div class="flex justify-center pb-3">
        {{$books->links()}}
    </div>
</x-app-layout>
