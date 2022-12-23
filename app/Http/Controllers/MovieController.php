<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    //

    public function index()
    {
        $movies = Movie::all();
        return $movies;
    }
    public function show($id)
    {
        $movies = Movie::find($id);
        return $movies;  
    }

    public function create(Request $request)
    {
        try{
            $request->validate([
                'name'=>'string|required',
                'release_date'=>'date|required',
                'actors'=>'string|required',
                'description'=>'string|required',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' =>$th->getMessage()],400);
        }
        $movie = Movie::create([
            'name'=>$request->name,
            'release_date'=>$request->release_date,
            'actors'=>$request->actors,
            'description'=>$request->description,
        ]);
        return 'pelicula agregada correctamente';
    }

    public function update(Request $request,$id)
    {
        try{
            $request->validate([
                'name'=>'string',
                'release_date'=>'timestamp',
                'actors'=>'string',
                'description'=>'string',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' =>$th->getMessage()],400);
        }
        $movie = Movie::find($id)->update([
            'name'=>$request->name,
            'release_date'=>$request->release_date,
            'actors'=>$request->actors,
            'description'=>$request->description,
        ]);

        return 'Datos de peliccula actualizados correctamente';
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return 'Se elimino correctamente la pelicula';
    }
}
