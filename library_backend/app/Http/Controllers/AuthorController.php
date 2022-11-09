<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Display Author by name filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function findAuthorByName($name)
    {
        return BookResource::collection(
            Author::where('name', 'LIKE', "%{$name}%")
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Author::find($id);
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
        if(Author::where('id', $id)->exists()){
            $article = Author::find($id);
            $article->title = $request->title;
            $article->publisher = $request->publisher;
            $article->pages = $request->pages;

            $article->save();

            return response()->json([
                'message' => 'record updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Author not found'
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
        if (Author::where('id', $id)->exists()) {
            $article = Author::find($id);
            $article->delete();

            return response()->json([
                'message' => "Author deleted"
            ], 404);
        } else {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }
    }
}
