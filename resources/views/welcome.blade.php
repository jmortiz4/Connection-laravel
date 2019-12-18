@extends('layouts.master')

@section('titulo', 'welcome')

@section('contenido')
  <!-- *******************************Carousel************************************ -->
  <div class="carousel ">
    <div class="bd-example ">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
          <div class="carousel-item active  ">
            <video class="video-fluid" autoplay loop muted>
              <source src="video/video pagina 1.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption d-md-block">
              <h5 class="animated flip">Friedrich Nietzsche</h5>
              <p class="animated bounceInUp " style="animation-delay: .5s">Deberíamos considerar como días perdidos
                aquellos en los que no hayamos bailado al menos una vez.</p>
            </div>
          </div>
          <div class="carousel-item  ">
            <video class="video-fluid " autoplay loop muted >
              <source src="video/video pagina 2.mp4"  type="video/mp4" />
            </video>
            <div class="carousel-caption  d-md-block">
              <h5 class="animated  bounceInRight "> VH</h5>
              <p class="animated bounceInUp" style="animation-delay: .5s">La música expresa lo que no puede ser dicho y
                aquello sobre lo que es imposible permanecer en silencio.</p>
            </div>
          </div>
          <div class="carousel-item">
            <video class="video-fluid " autoplay loop muted >
              <source src="video/video pagina 3.mp4"  type="video/mp4" />
            </video>
            <div class="carousel-caption d-md-block">
              <h5 class="animated bounceInRight ">Confusio</h5>
              <p class="animated bounceInUp" style="animation-delay: .5s">La música produce un tipo de placer sin el que
                la naturaleza humana no puede vivir. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *******************************fqs************************************ -->

  <div class="container">
  <div class="faq row"id=preguntas>
    <div class="col-12 mb-5 d-flex justify-content-center ">
      <h3 class="animated rollIn"style="animation-delay: .5s">PREGUNTAS FRECUENTES</h3>
    </div>
 
      <section class="col-12 d-flex">
        <ul>
        <div>
          <h2 class=" animated bounceInRight ">De qué se trata todo esto?</h2>
          <p class="animated bounceInLeft">Connection es una herramienta para las personas que aman la música electrónica y quieren compartir experiencias, anécdotas relacionadas con el género.</p>
        </div>

        <div>
            <h2 class="animated bounceInRight">Como subo Contenido?</h2>
            <p class="animated bounceInLeft">Es muy sensillo. Una vez registrado tendrás acceso a nuestra comunidad, donde podrás agregar amigos, vínculos, fotos, videos y música.</p>
          </div>
        <div>
            <h2 class="animated bounceInRight">Cómo puedo modificar la foto de perfil?</h2>
              <ul class="animated bounceInLeft">
                <li>Haz Click en tu foto de perfil > Presiona <strong>EDITAR</strong>. </li>
                <li>Busca y selecciona en tus archivos la imagen que desees y haz click en <strong>ACEPTAR</strong> para finalizar.</li>
              </ul>
        </div>
        <div>
            <h2 class="col-12 d-flex animated bounceInRight">Cómo invitar amigos?</h2>
            <p class="animated bounceInLeft">Dirigete a la pestaña comunidad > Selecciona <strong>AGREGAR AMIGOS</strong>. Luego presiona <strong>INVITAR AMIGOS</strong>.</p>
          </div>
      </ul>
        <div >
          <video class="col-12 " autoplay loop muted >
            <source src="video/video pagina club.mp4 "    type="video/mp4" />
          </video>

          <figure id=tracks>
          <br>
            <figcaption class="text-danger  ">Tracks elegidos de este mes:</figcaption>
            <br>
            <audio controls="controls ">
              <source class="bg-dark" src="audio\sebastien leger - rocket to lee's little cloud (original mix).mp3" type="audio/ogg" />
              <source src="audio\ARTBAT, Dino Lenny - Sand In Your Shoes (Original Mix).mp3" type="audio/mpeg" />
              </audio>
                <audio controls="controls">
                <source src="audio\ARTBAT, Dino Lenny - Sand In Your Shoes (Original Mix).mp3" type="audio/mpeg" />
              </audio>
              </audio>
                <audio controls="controls">
                <source src="audio\Cid Inc. - Contrite (Original Mix).mp3" type="audio/mpeg" />
              </audio>
            </figure>
        </div>
      </section>
  </div>
</div>
  @endsection
