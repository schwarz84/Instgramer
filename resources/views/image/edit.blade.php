@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Editar Imagen
                </div>

                <div class="card-body">

                    <form action="{{route('image.update')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="image_id" value="{{$image->id}}">

                        <div class="form-group row">

                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">

                             @if($image->user->image)
                                <img src="{{route('image.file', ['filename' => $image->image_path])}}" class="imageConfig perfil vamoooo" class="">
                            @endif

                                <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror">

                                @error('image_path')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-7">
                                <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" required>{{$image->description}}</textarea>

                                @error('description')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-7 offset-md-3">
                                <input type="submit" value="Actualizar Imagen" class="btn btn-primary">
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
