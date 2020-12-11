@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @include('includes.message')

                <div class="card pub_image">


                    <a href="{{route('profile', [$image->user->id])}}" class="show-image">
                        <div class="card-header">
                            @if($image->user->image)
                                <img src="{{url('user/avatar/'. $image->user->image )}}" class="imageConfig perfil" class="">
                            @endif

                            <span class="cursiva">{{"@" . $image->user->nick }}</span> <span class="gris">{{$image->user->name }} {{$image->user->surname}}</span>

                        </div>
                    </a>

                    <div class="card-body">

                        <div class="image_container">
                            <img src="{{route('image.file', ['filename' => $image->image_path])}}" alt="">
                        </div>

                        <div class="likes">

                        </div>

                        <div class="description">
                            <div class="gris">
                                {{$image->user->nick}}
                                <span>{{ " | " .  \FormatTime::LongTimeFilter($image->created_at)}}</span>
                            </div>
                            <div class="comment">
                                {{$image->description}}
                            </div>
                        </div>

                        <div class="like">
                            @php
                                $user_like = false;
                            @endphp

                            @foreach($image->likes as $like )
                                @if($like->user->id == Auth::user()->id)
                                    @php
                                        $user_like = true;
                                    @endphp
                                @endif

                            @endforeach

                            {{-- Verificamos si es el mismo usuario quien dio like --}}
                            @if($user_like)
                                <img src="{{asset('images/favorite-red.png')}}" data-id="{{$image->id}}" class="btn-dislike">
                                @else
                                <img src="{{asset('images/favorite-black.png')}}" data-id="{{$image->id}}" class="btn-like">

                                @endif


                                <span class="gris suma-like" id="cuenta" data-cuenta="{{ count($image->likes) }}" data-resultado="">{{ count($image->likes) }}</span>
                            </div>
                            @if(Auth::user() && Auth::user()->id == $image->user->id)
                                <div class="actions acomodo">
                                    <a href="{{route('image.edit', $image->id)}}" class="btn btn-sm btn-primary">Actualizar</a>
                                    {{-- <a href="{{route('image.delete', $image->id)}}" class="btn btn-sm btn-danger">Eliminar</a> --}}

                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                        Eliminar
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar Imagen</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    ¿Realmente deseea eliminar la imagen?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                                    <a href="{{route('image.delete', $image->id)}}" class="btn btn-danger">Si, Eliminar</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif


                        <div class="clearfix"></div>

                        <div class="btn-comment comment">
                            <h2>Comentario({{count($image->comments)}})</h2>
                            <form action="{{ route('comment.save')}}" class="" method="post">
                                @csrf

                                <input type="hidden" name="image_id" value="{{ $image->id }}">

                                <textarea name="content" cols="10" class="form-control @error('content')is-invalid @enderror" required></textarea>



                                @error('content')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>

                            <br>

                            @foreach($image->comments as $comment)
                                <div class="comment">
                                    <div class="gris comment1">
                                        {{'@'.$comment->user->nick}}
                                        <span>{{ " | " .  \FormatTime::LongTimeFilter($comment->created_at)}}</span>
                                    </div>
                                    <div class="comment1">
                                        {{$comment->content}}
                                    </div>

                                    @if(Auth::check() && ($comment->user_id == \Auth::user()->id || $comment->image->user_id == \Auth::user()->id))
                                        <a href="{{route('comment.delete', ['id'=>$comment->id])}}" id="comment-eliminar">Eliminar</a>
                                    @endif

                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
