<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Producto;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductoController extends Controller
{
    public function index()
    {
        try{
            return ApiResponse::success('Productos obtenidos', 200, Producto::all());
        }catch(Exception $e){
            return ApiResponse::error('Error al obtener los productos '.$e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre'=>'required|unique:productos',
                'precio'=>'required|numeric|between:0,999999.99', 
                'cantidad_disponible'=>'required|integer',
                'categoria_id'=>'required|exists:categorias,id',
                'marca_id'=>'required|exists:marcas,id',
            ]);
            $producto = Producto::create($request->all());
            return ApiResponse::success('Producto creado exitosamente',201,$producto);
        }catch(ValidationException $e){
            $errors = $e->validator->errors()->toArray();
            return ApiResponse::error('Errores de validacion '.$e->getMessage(), 422, $errors);
        }
    }

    public function show($id)
    {
        try{
            $producto = Producto::findOrFail($id);
            return ApiResponse::success('Producto obtenido exitosamente!', 200, $producto);
        }catch(ModelNotFoundException $e){
            return ApiResponse::error('Producto no encontrado',404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
