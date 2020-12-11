<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;

class LikeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = \Auth::user();
        $like = Like::where('user_id', $user->id)->orderby('id', 'desc')
                                                 ->paginate(5);

        return view('like.index', [
            'likes' => $like
        ] );
    }

    public function like($image_id){

        // COnseguir datos del usuario
        $user = \Auth::user();


        // COndicion de si existe el like y no duplicarlo
        $if_like = Like::where('user_id', $user->id)->where('image_id', $image_id)->count();

        if ($if_like == 0) {
            $like = new Like();
            $like->user_id  = $user->id;
            $like->image_id = (int) $image_id;

            $like->save();


            // TOdvia no se bien por que
            return response()->json([
                'like' => $like,
                'message' => "afirmativo"
            ]);
        } else {
            return response()->json([
                'message' => 'EL like ya existe'
            ]);
        }
    }

    public function dislike($image_id) {

        // COnseguir datos del usuario
        $user = \Auth::user();


        // COndicion de si existe el like y no duplicarlo
        $like = Like::where('user_id', $user->id)->where('image_id', $image_id)->first();

        if ($like) {

            $like->delete();

            // TOdvia no se bien por que
            return response()->json([
                'like' => $like,
                'message' => "negativo"
            ]);
        } else {
            return response()->json([
                'message' => 'EL like no existe'
            ]);
        }
    }


}
