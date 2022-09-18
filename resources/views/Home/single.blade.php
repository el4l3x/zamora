@extends('layouts.landing')

@section('navbar')
    <!--==========================
        Header
    ============================-->
    <header id="header" class="header-fixed">
        <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="index.html#intro" class="scrollto"><img src="{{ asset('src/img/logo.png') }}" alt="" title=""></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="/#intro">Inicio</a></li>
                <li><a href="/#nosotros">Nosotros</a></li>
                <li><a href="/#noticias">Noticias</a></li>
                <li><a href="/#galeria">Galeria</a></li>
                <li><a href="/#direcciones">Direcciones</a></li>
                <li class="buy-tickets"><a href="/#atencion-ciudadano">Atecion al Ciudadano</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->
@endsection

@section('content')
<main id="main" class="main-page">
    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn py-5">
        <div class="container">
          <div class="section-header">
            <h2>{{ $post->name }}</h2>
            <p>
                @foreach ($post->tags as $tag)
                    @if($loop->last)
                        <a href="">{{ $tag->name }}</a>                                                            
                    @else
                        <a href="">{{ $tag->name }} - </a>                                                            
                    @endif
                @endforeach
            </p>
          </div>
  
          <div class="row">
            <div class="col-md-6">
              <img src="{{ asset('storage/'.$post->image->url) }}" alt="Speaker 1" class="img-fluid">
            </div>
  
            <div class="col-md-6">
              <div class="details">
                {{-- <h2>Brenden Legros</h2> --}}
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>

                <div>
                    {!!$post->body!!}
                </div>
              </div>
            </div>
            
          </div>
        </div>
  
    </section>
  
@endsection