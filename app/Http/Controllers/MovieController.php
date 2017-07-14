<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Session;
use Validator;
use Storage;

class MovieController extends Controller
{
    private $pageSize = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movies = Movie::paginate($this->pageSize);

        // Pagination overflow
        if($movies->total() && $movies->currentPage() > $movies->lastPage()) {
            $request->session()->reflash();
            return redirect()->route('movies.index', ['page' => $movies->lastPage()]);
        }

        Session::put('full_url_page', $request->fullUrl());
        Session::put('last_page', $movies->lastPage());
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'synopsis' => 'required',
            'image' => 'image|mimes:jpeg,jpg|max:2048',
        ])->validate();        


        // Upload image
        if($request->hasFile('image')) {
            $request['poster'] = $request->file('image')->store('public');                 
        } 

        // Create Slug
        $request['slug'] = $this->createSlug($request->title);       
        
        $movie = Movie::create($request->all());

        $notification = array(
            'message' => 'The movie "'.$movie->title.'" has been created in the database', 
            'alert-type' => 'success'
        );
        Session::flash('toastr', $notification);

        // Jumt to index last page
        return redirect()->route('movies.index', ['page' => Session::get('last_page')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'synopsis' => 'required',
            'image' => 'image|mimes:jpeg,jpg|max:2048'
        ])->validate();

        // Upload image        
        if($request->hasFile('image')) {            
            // Remove old image && set poster data
            $this->removePosterImage($movie->poster);
            $request['poster'] = $request->file('image')->store('public');            
        }

        // Regenerate Slug if title has change
        if($movie->title != $request->title ) {
            $request['slug'] = $this->createSlug($request->title);
        }
        
        if($movie->fill($request->all())->save() ){
            $notification = array(
                'message' => 'The movie "'.$movie->title.'" has been updated in the database', 
                'alert-type' => 'success'
            );
            Session::flash('toastr', $notification);
        };

        return redirect(Session::get('full_url_page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $title = $movie->title;
        
        // Remove image & data
        $this->removePosterImage($movie->poster);
        $movie->delete();
       
        $notification = array(
            'message' => 'The movie "'.$title.'" has been deleted from the database', 
            'alert-type' => 'success'
        );
        Session::flash('toastr', $notification);

        return redirect()->back();

    }

    // CUSTOM METHODS

    private function createSlug($title) {
        
        $slug = str_slug($title);
        $count = Movie::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
        
    }

    private function removePosterImage($poster) {
        if(Storage::exists($poster) && $poster != 'public/default.jpg') {
            Storage::delete($poster);
        }
    }

}
