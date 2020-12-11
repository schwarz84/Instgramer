<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function save(Request $request) {

        // Validar datos
        $validate = $this->validate($request, [
           'image_id' => ['integer', 'required'],
           'content'  => ['string', 'required']
        ]);

        // Recogo los datos que vienen por Post
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content  = $request->input('content');

        // Asigno los valores
        $comment = new Comment();
        $comment->user_id  = $user->id;
        $comment->image_id = $image_id;
        $comment->content  = $content;

        // Guardo los valores cargados
        $comment->save();

        // Redirecciono con el mensaje de exito o no
        return redirect()->route('image.detail', ['id'=>$image_id])
                         ->with([
                            'message'=>'El comentario fue cargado existosamente!!!'
                         ]);
    }

    public function delete($id) {

        // Conseguir datos del usuario identificado
        $user = \Auth::user();

        // Conseguir el objeto del comentario
        $comment = Comment::find($id);

        // Comprobar si soy dueño de la publicacion o el dueño del comentario
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)) {

            // Elimino el ocmentario
            $comment->delete();

            return redirect()->route('image.detail', ['id' => $comment->image->id])
                             ->with([
                                'message' => 'El comentario fue eliminado existosamente!!!'
                             ]);
        }
    }

}
