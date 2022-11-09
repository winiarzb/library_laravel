<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Book::where('id', $id)->exists()){
            $article = Book::find($id);
            $article->title = $request->title;
            $article->publisher = $request->publisher;
            $article->pages = $request->pages;

            $article->save();

            return response()->json([
                'message' => 'record updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Book::where('id', $id)->exists()) {
            $article = Book::find($id);
            $article->delete();

            return response()->json([
                'message' => "Book deleted"
            ], 404);
        } else {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
    }
}
