


@extends('layouts.app')
@section('content')
    <br>
    <br>
    <h2 class="text-center">Postear</h2>
    <div class="container-fluid">
        <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <!-- @if (count($errors->all())>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            @endif -->

            <form action="/guardarPosteo" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="comentario">Que estás escuchando?</label>
                    <input type="text" class="form-control" name="comentario" id="comentario" value="">

                </div>

                <div class="form-group">
                        <label for="archivo">Carga tu Track</label>
                        <input type="file" class="form-control" name="archivo" id="archivo" value="">
                </div>



                <button type="submit" class="btn btn-primary">Postear</button>
            </form>

        </div>
    </div>
    </div>
@endsection
