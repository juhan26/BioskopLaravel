<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieAbout;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movieAbout = Movie::all();

        return view('movies.home', compact('movieAbout'));
        // $movieR = Movie::with('booking')->get();
        // $movie = Movie::all();
        // return view('movies.home', compact('movie', 'movieR'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $message = [
            'name.required' => 'nama harus diisi',
            'poster_url.required' => 'poster url harus diisi',
            'poster_url.mimes' => 'gambar harus berformat png, jpg, svg, jpeg',
        ];

        $request->validate([
            'name' => 'required',
            'poster_url' => 'required|mimes:png,jpg,svg,jpeg',
        ], $message);


        $imagePath = $request->file('poster_url')->store('posters', 'public');

        $movie = new Movie([
            'name' => $request->name,
            'poster_url' => $request->$imagePath,
        ]);



        $movie->save();
        return redirect()->route('movies.home')->with('success', 'movie stored succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MovieAbout $movieAbout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieAbout $movieAbout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovieAbout $movieAbout)
    {

      $request->validate([
        'name' => 'required|max:10',
        'poster_url' => 'required|mimes:png,jpg,jpeg',
      ]);

    if ($request->hasFile('poster_url')) {
        Storage::disk('public')->delete($movieAbout->poster_url);
        $imagePath = $request->file('poster_url')->store('posters', 'public');
        $movieAbout->poster_url = $imagePath;
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieAbout $movieAbout)
    {
        try {
            $movieAbout->delete();
            return redirect()->route('movie.home')->with('success', 'success to delete');
        } catch (Exception $e) {
            if ($e->getCode() === "23000") {

                return redirect()->route('movie.home')->with('error', 'failed to delete karena ada data yang terkait');
            }
            return redirect()->route('movie.home')->with('error', 'failed to delete');
        }
    }
}
