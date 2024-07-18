<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Studio;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Index returns the home page.
     *
     * @param Request $request
     * @return View
     */

     public function create()
    {
        $studios = Studio::select(DB::raw('MIN(id) as id, name'))
        ->groupBy('name')
        ->get();
        $existingStudioIds = Movie::pluck('studio_id')->toArray();

        return view('movies.create', compact('studios', 'existingStudioIds'));
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
        'studio_id' => 'required|string|max:255',
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
        'studio_id' => $request->get('studio_id'),
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

    
        $dates = Date::all();
        $showtimes = Showtime::all();

        // $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        // $currentTime = now('Asia/Jakarta')->format('H:i:s');

        // $movie = $movie->loadDatesForCurrentWeek();
        // dd($movie->dates);

        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
{
    return view('movies.edit', compact('movie'));
}

public function update(Request $request, Movie $movie)
{

    $customMessages = [
        '*.required' => 'Field :attribute wajib diisi.',
        '*.string' => 'Field :attribute harus berupa string.',
        '*.max' => 'Field :attribute tidak boleh lebih dari :max karakter.',
        '*.image' => 'Field :attribute harus berupa gambar.',
        '*.mimes' => 'Field :attribute harus memiliki tipe: :values.',
    ];

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'poster_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],$customMessages);

    if ($request->hasFile('poster_url')) {
        Storage::disk('public')->delete($movie->poster_url); //buat ngehapus image sebelumnya
        $posterPath = $request->file('poster_url')->store('posters', 'public');
        $movie->poster_url = $posterPath;
    }

    $movie->update($request->all());

    return redirect()->route('movies.index', $movie->id)->with('success', 'Movie updated successfully.');
}

    public function destroy(Movie $movie)
{
    try {
        $movie->delete();    
        return redirect()->route('home')->with('success', 'Movie deleted successfully.');
    } catch (Exception $e) {
        return redirect()->route('home')->with('error', 'Movie failed to delete.');
        
    }
}

}