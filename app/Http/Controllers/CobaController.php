<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use Exception;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coba = Coba::with('category');
        return view('coba.index', compact('category'));
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
        Coba::create($request->all());
        return redirect()->route('coba.index')->with('success', 'Berhasil menambahkan data coba');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coba $coba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coba $coba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coba $coba)
    {
        // $coba->update($request->all());
        // return redirect()->route('coba.index')->with('success', 'Berhasil mengubah data coba');

        $message = [
            'name.required' => 'nama tidak boleh kosong',
            'poster_url.required' => 'gambar tidak boleh kosong',
        ];

        $request->validate([
            'name' => 'required',
            'poster_url' => 'required|mimes:jpg,png,jpeg'
        ], $message);

        if ($request->hasFile('poster_url')) {
            Storage::disk('public')->delete($coba->poster_url);
            $gambar = $request->file('poster_url')->store('posters', 'public');
            $coba->poster_url = $gambar;
        }
        return redirect()->route('coba.index')->with('success', 'Berhasil mengupdate gambar');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coba $coba)
    {
        try {
            $coba->delete();
            return redirect()->route('coba.index')->with('Berhasil menghapus data');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000'){
                return redirect()->route('coba.index')->with('Gagal menghapus data karena ada data yang terkait');
            }
            return redirect()->route('coba.index')->with('Gagal menghapus data');

        }
    }
}
