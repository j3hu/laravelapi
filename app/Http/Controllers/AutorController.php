<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autores;

class AutorController extends Controller
{
    public function getAllAutores() {
        $autores = Autores::get()->toJson(JSON_PRETTY_PRINT);
        return response($autores, 200);
      }

      public function getAutor($id) {
        if (Autores::where('id', $id)->exists()) {
          $autor = Autores::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($autor, 200);
        } else {
          return response()->json([
            "message" => "Autor no encontrado"
          ], 404);
        }
      }

      public function createAutor(Request $request) {
        $autor = new Autores;
        $autor->nombres = $request->nombres;
        $autor->apellidos = $request->apellidos;
        $autor->pais = $request->pais;
        $autor->save();

        return response()->json([
          "message" => " Registro de autor creado"
        ], 201);
      }

      public function updateAutor(Request $request, $id) {
        if (Autores::where('id', $id)->exists()) {
          $autor = Autores::find($id);

          $autor->nombres = is_null($request->nombres) ? $autor->nombres : $autor->nombres;
          $autor->apellidos = is_null($request->apellidos) ? $autor->apellidos : $autor->apellidos;
          $autor->pais = is_null($request->pais) ? $autor->pais : $autor->pais;
          $autor->save();

          return response()->json([
            "message" => "Registro actualizado exitosamente"
          ], 200);
        } else {
          return response()->json([
            "message" => "autor no encontrado"
          ], 404);
        }
      }

      public function deleteAutor ($id) {
        if(Autores::where('id', $id)->exists()) {
          $autor = Autores::find($id);
          $autor->delete();

          return response()->json([
            "message" => "Registro Borrado"
          ], 202);
        } else {
          return response()->json([
            "message" => "Autor no encontrado"
          ], 404);
        }
      }
}
