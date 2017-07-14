<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class apiMovieController extends Controller
{
    public function movies()
    {
    	$movies = Movie::orderBy('id','asc')->get();

    	if($movies) {
	    	return response()->json([
	    		"status" => "success",
	    		"movies" => $movies
			], 200);
		} else {
			return response()->json(['message' => 'Database Linka Movies is empty.'],403);	
		}	
    }

    public function movie(Request $request)
    {
    	$movie = Movie::where('slug', $request->slug)->first();
        
        $previus_movie = Movie::where('id', '<', $movie->id)->orderBy('id','desc')->first();
        $next_movie = Movie::where('id', '>', $movie->id)->orderBy('id','asc')->first();
        $previus_movie_slug = $previus_movie ? $previus_movie->slug : null;
        $next_movie_slug = $next_movie ? $next_movie->slug : null;

        if($movie) {
    		return response()->json([
	    		"status" => "success",
	    		"movie" => $movie,
                "previus" => $previus_movie_slug,
                "next" => $next_movie_slug
			], 200);
    	} else {
    		return response()->json(['message' => 'Movie not found.'],403);
    	}

    }

}
