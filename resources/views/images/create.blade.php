<!-- Heredamos el layout -->
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

           <div class="card">

            <div class="card-header">
                Subir nueva Imagen
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="image_path" class="col-md-3 col-form-label text-md-end">Imagen</label>
                        <div class="col-md-7">
                            <input id="image_path" type="file" name="image_path" class="form-control" required>

                            @error('image_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row mt-3">
                        <label for="description" class="col-md-3 col-form-label text-md-end">Descripción</label>
                        <div class="col-md-7">
                            <textarea id="description"  name="description" class="form-control" required></textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary" >
                               Subir
                            </button>
                        </div>
                    </div>


                </form>
            </div>

           </div>

        </div>
    </div>
</div>
@endsection