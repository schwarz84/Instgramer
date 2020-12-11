@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card pub_image">

                    <h2 class="titulo">Mis imagenes Favoritas</h2>

                    @foreach($likes as $like)
                        @include('includes.image', ['image' =>$like->image])
                    @endforeach

                </div>

            {{-- Paginacion --}}
            <div class="clearfix">
                {{$likes->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
