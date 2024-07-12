<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Index returns the home page.
     *
     * @param Request $request
     * @return View
     */

     public function create(): View
     {
         return view('movies.create');
     }
     
    public function index(Request $request): View
    {
        $title = request()->input('search');
        $sort = request()->input('sort');

        $movies = Movie::filter($title, $sort)
            ->latest()
            ->paginate(8);

        return view('movies.home', compact('movies'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255|unique:movies,title',
        'description' => 'required|string',
        'poster_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'release_date' => 'required|date',
        'genre' => 'required|string|max:255',
        'age_rating' => 'required|string|max:10',
        'ticket_price' => 'required|numeric|min:0',
    ]);

    $imagePath = $request->file('poster_url')->store('posters', 'public');
    
    $movie = new Movie([
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'poster_url' => $imagePath,
        'release_date' => $request->get('release_date'),
        'genre' => $request->get('genre'),
        'age_rating' => $request->get('age_rating'),
        'ticket_price' => $request->get('ticket_price'),
    ]);
    
    // dd($imagePath);
    $movie->save();

    return redirect()->route('home')->with('success', 'Movie created successfully.');
}


    /**
     * Show returns the movie detail page.
     *
     * @param Movie $movie
     * @return View
     */
    public function show(Movie $movie): View
    {
        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');

        $movie = $movie->loadDatesForCurrentWeek();
        // dd($movie->dates);

        return view('movies.show', compact('movie', 'currentDate', 'currentTime'));
    }

    public function edit(Movie $movie)
{
    return view('movies.edit', compact('movie'));
}

public function update(Request $request, Movie $movie)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'poster_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // contoh validasi untuk gambar
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    if ($request->hasFile('poster_url')) {
        Storage::disk('public')->delete($movie->poster_url); //buat ngehapus image sebelumnya
        $posterPath = $request->file('poster_url')->store('posters', 'public');
        $movie->poster_url = $posterPath;
    }

    $movie->title = $request->title;
    $movie->description = $request->description;


    $movie->save();

    return redirect()->route('movies.index', $movie->id)->with('success', 'Movie updated successfully.');
}


    public function destroy(Movie $movie)
{
    $movie->delete();

    return redirect()->route('home')->with('success', 'Movie deleted successfully.');
}

}
