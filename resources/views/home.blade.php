@extends('layouts.master')

@section('contenido')
<div class="container p-5 m-5 br-light">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card transparent" style="
            z-index: -1;
            border: none;" >
                <div class="videos position-absolute ">
                    <video class="video-fluid w-100  " autoplay loop muted>
                     <source src="video/video pagina 4.mp4" type="video/mp4" />
                   </video>
               </div>
                <div class="card-header text-light">BIENVENIDO!</div>

                <div class="card-body text-light ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div  >
                    @endif

                   Ya formas parte de Connection!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
