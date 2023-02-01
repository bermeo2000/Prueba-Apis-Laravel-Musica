<?php

namespace App\Http\Controllers;

use App\Models\musicas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MusicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $musicas = musicas::where('estado', 1)->get();
        return response()->json($musicas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* guardar */   
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'title_short' => 'required|string|max:255',
            'preview' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'cover_small' => 'required|string|max:255',
        ]);

        $musicas = musicas::create([
            'title' => $validateData['title'],
            'title_short' => $validateData['title_short'],
            'preview' => $validateData['preview'],
            'duration' => $validateData['duration'],
            'cover_small' => $validateData['cover_small'],
            'estado' => 1
        ]);

        return response()->json(['message' => 'Musica registrada.'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\musicas  $musicas
     * @return \Illuminate\Http\Response
     */
 

    public function show($id)
    {
        //
        $musicas = musicas::find($id);
        if(is_null($musicas)){
            return response()->json(['message' => ' musicas no encontrado'], 404);
        }
        return response()->json($musicas, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\musicas  $musicas
     * @return \Illuminate\Http\Response
     */
    public function edit(musicas $musicas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\musicas  $musicas
     * @return \Illuminate\Http\Response
     */
       /* actualizar */   
    public function update(Request $request, $id)
    {
        //
        $musicas = musicas::find($id);
        if(is_null($musicas)){
            return response()->json(['message' => 'musicas no encontrado'], 404);
        }
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'title_short' => 'required|string|max:255',
            'preview' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'cover_small' => 'required|string|max:255',
       
        ]);       
        $musicas->title = $validateData['title'];
        $musicas->title_short = $validateData['title_short'];
        $musicas->preview = $validateData['preview'];
        $musicas->duration = $validateData['duration'];
        $musicas->cover_small = $validateData['cover_small'];

        $musicas->save();

        return response()->json(['message' => 'musicas actualizado', 201]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\musicas  $musicas
     * @return \Illuminate\Http\Response
     */

     /* eliminar */
    public function destroy($id)
    {
        $musicas=musicas::find($id);
        if (is_null($musicas)) {
            return response()->json(['message' => 'musicas no encontrada'], 404);
        }
        $musicas->estado=0;
        $musicas->save();
        return response()->json(['message'=>'musicas eliminada']);
    }
}
