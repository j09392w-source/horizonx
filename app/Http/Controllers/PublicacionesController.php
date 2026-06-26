<?php

namespace App\Http\Controllers;
use App\Models\Publicacion;

use Auth;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::latest()->with("user")->get();
        return view("home", compact("publicaciones"));
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
        $request->validate([
            'foto' => 'required',
            'descripcion' => 'required',
        ]);
        $rutaFoto = $request->file('foto')->store('uploads', 'public');
        Publicacion::create([
            'user_id'=> \Illuminate\Support\Facades\Auth::id(),
            'ruta'=> $rutaFoto,
            'descripcion'=> $request->descripcion
        ]);
        return redirect('/');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
