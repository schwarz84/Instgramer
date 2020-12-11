@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <h2 class="titulo">Gente</h2>

            <form action="{{route('user.index')}}" method="GET" id="buscador">
                <div class="row">
                    <div class="form-group col">
                        <input type="tel" id="search" class="form-control">
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" value="Buscar" class="btn btn-success">
                    </div>
                </div>

            </form>

            @foreach($users as $user)
                <div class="profile-header">

                    <img src="{{url('user/avatar/'. $user->image )}}" class="perfil ">

                    <span class="cursiva">{{"@" . $user->nick }}</span>
                    <br>
                    <span class="">{{$user->name }} {{$user->surname}}</span>
                    <br>
                    {{-- <span>{{'Correo Electronico: '. $user->email}}</span>
                    <br> --}}
                    <span>{{ "Se unio: " .  \FormatTime::LongTimeFilter($user->created_at)}}</span>
                    <br>
                    <a href="{{route('profile', ['user' => $user->id])}}" class="btn btn-success btn-sm malo">Ver Perfil</a>

                </div>
            @endforeach

            {{-- Paginacion --}}
            <div class="clearfix">
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
