<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ApiController extends Controller
{
    public function index(){
        $libros = Books ::with('author')->get();
        return response()->json($libros);
    }

    public function store(Request $request){
        try{
            $request->validate([
                'title' => 'required|string',
                'author' => 'required|string',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer',
                'pages' => 'required|integer',
                'curso' => 'required|string',
                'asignatura' => 'required|string',

            ]); 

            $books = new Books();
            $books->title = $request->input('title');
            $books->author = $request->input('author');
            $books->author_id = $request->input('author_id');
            $books->published_year = $request->input('published_year');
            $books->pages = $request->input('pages');
            $books->curso = $request->input('curso');
            $books->asignatura = $request->input('asignatura');
            $books->save();

            return response()->json([$books, 201]);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Error', 'message' => $e->getMessage()], 500);
        }
        
    }
    
    public function destroy($id){
        $book = Books::find($id);

        if(!$book){
            return response()->json(['message' => 'El libro no esta'],404);
        }else{
            $book->delete();
        }

        return response()->json(['message' => 'Libro eliminado'],200);
    }


    public function update(Request $request, $id){
        try {
            $book = Books::find($id);
    
            if (!$book) {
                return response()->json(['message' => 'El libro no existe'], 404);
            }
    
            $request->validate([
                'title' => 'required|string|max:255',
                'author_id' => 'required|integer|max:255',
            ]);
    
            $book->update([
                'title' => $request->title,
                'author_id' => $request->author_id,
            ]);
    
            return response()->json($book);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el libro: ' . $e->getMessage()], 500);
        }
    }

    /*public function update(Request $request, $id)
    {
        try {
            // Busca el libro por su ID
            $books = Books::findOrFail($id);

            // Actualiza los campos del libro con los datos de la solicitud
            $books->update($request->all());

            // Devuelve una respuesta con el libro actualizado
            return response()->json($books);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el libro: ' . $e->getMessage()], 500);
        }
    }*/
}