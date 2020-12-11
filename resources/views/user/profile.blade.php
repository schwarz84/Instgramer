@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="profile-header">

                <h2>Mi perfil</h2>

                <img src="{{url('user/avatar/'. $user->image )}}" class="perfil">

                <span class="cursiva">{{"@" . $user->nick }}</span>
                <br>
                <span class="">{{'Nombre Completo: '. $user->name }} {{$user->surname}}</span>
                <br>
                <span>{{'Correo Electronico: '. $user->email}}</span>
                <br>
                <span>{{ "Se unio: " .  \FormatTime::LongTimeFilter($user->created_at)}}</span>

            </div>

            <div class="clearfix"></div>

            @foreach($user->images as $image)
                @include('includes.image', ['image' => $image])
            @endforeach

        </div>
    </div>
</div>
@endsection
