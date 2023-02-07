<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    //CREACIÓN DE MÉTODOS DE CRUD//

    //GET ALL CATEGORIAS//
    public function getCategorias()
    {
        $categorias = DB::select('CALL sp_listarCategorias');
        return $categorias;
    }

    //GET CATEGORIA//
    public function getCategoria($id)
    {
        $data = DB::select('CALL sp_buscarCategoria(?)', array($id));

        if(empty($data))
        {
            return response() -> json(['message' => 'Registro No Encontrado', 'Code' => 404], 404);
        }

        return response() -> json(['datos' => $data, 'Code' => 200], 200);
    }

    //CREATE CATEGORIA//
    public function createCategoria(Request $request)
    {
        $nombreCategoria = $request;
        $nombre = $nombreCategoria -> nombreCategoria;

        if(is_null($nombre) || $nombre = '')
        {
            return response() -> json(['message' => 'Ingrese Datos para Registrar', 'Code' => 404], 404);
        }

        $data = DB::select('CALL sp_crearCategoria(?)', array($nombreCategoria -> nombreCategoria));
        return response() -> json(['message' => 'Categoría Registrada Correctamente', 'Code' => 200], 200);
    }

    //UPDATE CATEGORIA//
    public function updateCategoria(Request $request, $id)
    {
        $nombreCategoria = $request;
        $nombre = $nombreCategoria -> nombreCategoria;

        if(is_null($nombre) || $nombre = '')
        {
            return response() -> json(['message' => 'Ingrese Datos para Modificar', 'Code' => 404], 404);
        }

        $data = DB::select('CALL sp_modificarCategoria(?,?)', array($id, $nombreCategoria -> nombreCategoria));
        return response() -> json(['message' => 'Categoría Modificada Correctamente', 'Code' => 200], 200);
    }
}
