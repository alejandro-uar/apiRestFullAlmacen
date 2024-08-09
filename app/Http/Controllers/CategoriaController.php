<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        try{
            $categorias = Categoria::all();
            return ApiResponse::success('Lista de categorias', 200, $categorias);
        }catch(Exception $e){
            return ApiResponse::error($e->getMessage(), 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try{
            $request->validate([
                'nombre' => 'required|unique:categorias'
            ]); 
            $categoria = Categoria::create($request->all());
            return ApiResponse::success("Categoria creada exitosamente",201,$categoria);
        }catch(ValidationException $e){
            return ApiResponse::error("Error de validacion", 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
