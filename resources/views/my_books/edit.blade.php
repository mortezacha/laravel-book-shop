<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-10">
        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{route('my_books.update',$book)}}" method="post" enctype="multipart/form-data">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Book</h5>
                <div>
                    Owner:
                    {{$book->user->name}}
                </div>
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" value="{{$book->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                @error('title')
                <p class="text-red-600">
                    {{$message}}
                </p>
                @enderror

                @if($book->image_url)
                <div class="block mb-2 mx-auto font-medium text-gray-900 dark:text-white">
                    <img class="h-auto max-w-xs w-1/2 mx-auto" src="{{$book->full_image_url}}" alt="{{$book->title}}">
                </div>
                <div class="flex w-full justify-center" x-data="{
                     deleteImage(url){
                     axios.delete(url).then(function(res){
                     if(res.status == 204){
                        location.reload()
                     }
                        console.log(res)
                     }).catch(function(err){
                        console.log(err)
                     })
                     }}">
                    <button type="button" @click="deleteImage(`{{route('my_books.delete_image',$book)}}`)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</button>
                </div>
                @endif
                <div>
                    <label  for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image(optional)</label>
                    <input name="image" aria-describedby="file_input_help" id="file_input" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or GIF.</div>
                    @error('image')
                    <p class="text-red-600">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Summary(optional)</label>
                    <textarea name="summary" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Summary...">{{$book->summary}}</textarea>
                    @error('message')
                    <p class="text-red-600">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
