<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id === 1){
            $books = Book::paginate(10);
            return view('my_books.index',compact('books'));
        }
        $books = auth()->user()->books()->paginate(10,[
            'id','user_id','image_url','title','created_at'
        ]);
        return view('my_books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        $url = null;
        if ($request->hasFile('image')){
            $url = $request->file('image')->store('books/images',['disk'=>'public']);
        }
        auth()->user()->books()->create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image_url' => $url
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        abort_if(auth()->id() !==1 && $book->user_id !== auth()->id(),403,'Only can edit your books');
        return view('my_books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->fill($request->safe()->except('image'));
        if ($request->hasFile('image')){
            $url = $request->file('image')->store('books/images',['disk'=>'public']);
            if ($book->image_url){
//                if new book image added, the old image file will be removed from storage
                Storage::delete('public/'.$book->image_url);
            }
            $book->image_url = $url;
        }
        $book->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
