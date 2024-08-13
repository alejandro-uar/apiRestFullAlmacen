<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MarcaController extends Controller
{
   
    public function index()
    {
        try{
            $marcas = Marca::all();
            return ApiResponse::success('Lista de marcas', 200, $marcas) ;
        }catch(Exception $e){
            return ApiResponse::error('Error al obtener la lista de marcas: '.$e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required|unique:marcas'
            ]);
            $marca = Marca::create($request->all());
            return ApiResponse::success('Marca creada exitosamente', 201, $marca);
        }catch(ValidationException $e){
            return ApiResponse::error('Error de validacion', 422);
        }
    }

    public function show(Marca $marca)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $marca = Marca::findOrFail($id);
            $request->validate([
                'nombre'=>['required',Rule::unique('marcas')->ignore($marca)]
            ]);
            $marca->update($request->all());
            return ApiResponse::success('Marca actualizada con exito!', 200, $marca);
        }catch(ModelNotFoundException $e){
            return ApiResponse::error('Marca no encontrada', 404);
        }catch(Exception $e){
            return ApiResponse::error('Error: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
