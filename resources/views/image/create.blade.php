@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Subir una Imagen
                </div>

                <div class="card-body">

                    <form action="{{Route('image.save')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">

                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>

                            <div class="col-md-7">
                                <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" required>

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
                                <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" required></textarea>

                                @error('description')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-7 offset-md-3">
                                <input type="submit" value="Subir Imagen" class="btn btn-primary">
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
