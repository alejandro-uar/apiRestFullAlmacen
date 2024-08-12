<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Categoria;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;
Use Illuminate\Validation\Rule;

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
    public function show($id)
    {
        try{
            $categoria = Categoria::findOrFail($id)->get();
            return ApiResponse::success("Categoria obtenida exitosamente", 200, $categoria);
        }catch(ModelNotFoundException $e){
            return ApiResponse::error("Categoria no encontrada", 404);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $categoria = Categoria::findOrFail($id);
            $request->validate([
                'nombre'=>['required', Rule::unique('categorias')->ignore($categoria)]
            ]);
            $categoria->update($request->all());
            return ApiResponse::success('Categoria encontrada', 200, $categoria);
        }catch(ModelNotFoundException $e){
            return ApiResponse::error('Categoria no encontrada',404);
        }catch(Exception $e){
            return ApiResponse::error('Error: '.$e->getMessage(),422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
