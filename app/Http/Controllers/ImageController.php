<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Image;
use App\Comment;
use App\Like;

use Illuminate\Http\Response;

class ImageController extends Controller {

    public function __construct(){

        $this->middleware('auth');
    }

    public function create() {

        return view('image.create');
    }

    public function save(Request $request) {


        //Conseguir usuario identificado
        $user = \Auth::user();
        $id   = $user->id;

        // Validacion
        $validate = $this->validate($request, [
            'image_path'  => ['required', 'image'],
            'description' => ['required']
        ]);

        // Recoger los datos que viene por Post
        $image_path  = $request->file('image_path');
        $description = $request->input('description');

        // Tomar los datos y actulizar la Base de datos
        $image = new Image();
        $image->user_id = $id;

            // Subo el ficher on la Image
            if ($image_path) {
                $image_path_name = time() . $image_path->getClientOriginalName();

                Storage::disk('images')->put($image_path_name, File::get($image_path));

                // FInalmente tomo los datos para actualizar de la Image
                $image->image_path = $image_path_name;

            }

        $image->description = $description;

        // Ejecutamos la consulta para que se grabe en la base de datos
        $image->save();

        // redireccion al inicio con mensaje confirmando
        return redirect()->route('home')
                         ->with(['message' => 'Imagen subida correctamente']);

    }

    public function getImages($filename) {

        $file = Storage::disk('images')->get($filename);
        // var_dump($filename);
        // die();

        return new Response($file, 200);
    }

    public function detail($id) {

        $image = Image::find($id);

        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function delete($id) {

        // Consigo las variables
        $user     = \Auth::user();
        $image    = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes    = Like::where('image_id', $id)->get();

        if($user && $user->id == $image->user_id)
            // Borrar comentarios

            if($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            // Borrar Likes

            if($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }


            // Borrar storage donde esta la imagen

            Storage::disk('images')->delete($image->image_path);

            // Borrar Imagen

            if($image) {
                $image->delete();
            }

            // Redireciono a la pagina principal con el mensaje
            return redirect()->route('home')
                             ->with(['message' => 'Imagen Eliminada Exitosamente']);
    }

    public function edit($id) {

        $user = \Auth::user();
        $image = Image::find($id);

        if($image && $user && $image->user_id == $user->id){
            return view('image.edit', [
            'image' => $image
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request) {

        // Validamos que sea una imagen nomas

        $validate = $this->validate($request, [
            'image_path' => ['image']
        ]);

        // Obtenermos los datos
        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // conseguir el objeto
        $image = Image::find($image_id);

        // Guardo los nuevos datos y en el storage
        $image->description = $description;

        // Guardar en el storage
        if ($image_path) {

            $image_path_name = time() . $image_path->getClientOriginalName();

            Storage::disk('images')->put($image_path_name,File::get($image_path));

            $image->image_path = $image_path_name;
        }

        // Actualizar objeto
        $image->update();

        return redirect()->route('home')
                         ->with(['message' => 'Imagen actualizada exitosamente']);

    }

}
