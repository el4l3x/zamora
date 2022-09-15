@extends('layouts.landing')

@section('navbar')
    <!--==========================
        Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="{{ route('home.landing') }}" class="scrollto"><img src="{{ asset('src/img/logo.png') }}" alt="" title=""></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                <li class="menu-active"><a href="#intro">Inicio</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#noticias">Noticias</a></li>
                <li><a href="#galeria">Galeria</a></li>
                <li><a href="#direcciones">Direcciones</a></li>
                <li class="buy-tickets"><a href="#atencion-ciudadano">Atecion al Ciudadano</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
            
        </div>
    </header><!-- #header -->
@endsection

@section('content')
    <!--==========================
    Detalle del post
    ============================-->
    <section id="nosotros">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Misión</h2>
                    <p class="text-justify">La Alcaldía es el órgano ejecutivo del Municipio ZAMORA, fundamentado en la base de un gobierno  planificado , eficiente y transparente,  es responsable de diseñar, ejecutar, regular y supervisar las políticas de gestión pública, para el beneficio ciudadano en su convivencia social armónica con el desarrollo urbano sostenible, comprometidos en la consolidación de la ciudad modelo que queremos.</p>
                </div>

                <div class="col-lg-6">
                    <h2>Visión</h2>
                    <p class="text-justify">Ser el municipio modelo, multicéntrico, verde, planificado, inclusivo, con una economía local productiva y servicios públicos óptimos que garanticen la habitabilidad, las relaciones humanas entre sus ciudadanos y que recibe con beneplácito a todas aquellas personas que quieren hacer de nuestro municipio su nueva tierra de gracia.</p>
                </div>
            </div>
        </div>
    </section>
@endsection