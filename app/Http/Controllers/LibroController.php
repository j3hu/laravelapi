<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;

class LibroController extends Controller
{
    public function getAllLibros() {
        $libros = Libros::get()->toJson(JSON_PRETTY_PRINT);
        return response($libros, 200);
      }

      public function getLibro($id) {
        if (Libros::where('id', $id)->exists()) {
          $libro = Libros::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($libro, 200);
        } else {
          return response()->json([
            "message" => "Libro no encontrado"
          ], 404);
        }
      }

      public function createLibro(Request $request) {
        $libro = new Libros;
        $libro->isbn = $request->isbn;
        $libro->titulo = $request->titulo;
        $libro->id_autor = $request->id_autor;
        $libro->precio = $request->precio;
        $libro->save();

        return response()->json([
          "message" => " Registro de libro creado"
        ], 201);
      }

      public function updateLibro(Request $request, $id) {
        if (Libros::where('id', $id)->exists()) {
          $libro = Libros::find($id);

          $libro->isbn = is_null($request->isbn) ? $libro->isbn : $libro->isbn;
          $libro->titulo = is_null($request->titulo) ? $libro->titulo : $libro->titulo;
          $libro->id_autor = is_null($request->id_autor) ? $libro->id_autor : $libro->id_autor;
          $libro->precio = is_null($request->precio) ? $libro->precio : $libro->precio;
          $libro->save();

          return response()->json([
            "message" => "Registro actualizado exitosamente"
          ], 200);
        } else {
          return response()->json([
            "message" => "libro no encontrado"
          ], 404);
        }
      }

      public function deleteLibro ($id) {
        if(Libros::where('id', $id)->exists()) {
          $libro = Libros::find($id);
          $libro->delete();

          return response()->json([
            "message" => "Registro Borrado"
          ], 202);
        } else {
          return response()->json([
            "message" => "libro no encontrado"
          ], 404);
        }
}
}
