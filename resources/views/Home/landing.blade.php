@extends('layouts.landing')

@section('navbar')
    <!--==========================
        Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="#intro" class="scrollto"><img src="{{ asset('src/img/logo.png') }}" alt="" title=""></a>
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

@section('jumbotron')
    <!--==========================
        Intro Section
    ============================-->
    <section id="intro">
        <div class="intro-container wow fadeIn">
            <h1 class="mb-4 pb-0">Alcaldia<br><span>Municipio</span> Zamora</h1>
            <p class="mb-8 pb-0">TRABAJAMOS PARA MEJORAR ZAMORA, PORQUE ZAMORA TIENE CON QUE!!</p>
            <a href="https://www.youtube.com/watch?v=3SSQEwMKkv4&ab_channel=As%C3%ADsemueveVenezuela" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
        </div>
    </section>
@endsection

@section('content')
    <!--==========================
    About Section
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

    <!--==========================
    New Section
    ============================-->
    <section id="noticias" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2><a href="{{ route('home.posts') }}">Noticias</a></h2>
                <p>Lo mas actual en el Municipio</p>
            </div>

            <div class="row">
                <div class="col-8">

                    <div class="row">

                        @foreach ($posts as $post)
                            
                            <div class="col-6">
    
                                <div class="speaker">
                                    <img src="{{ asset('storage/'.$post->image->url) }}" alt="Speaker 1" class="img-fluid">
                                    <div class="details">
                                        <h3><a href="{{ route('home.show', $post) }}">{{ $post->name }}</a></h3>
                                        <p>
                                            @foreach ($post->tags as $tag)
                                                @if($loop->last)
                                                    <a href="">{{ $tag->name }}.</a>                                                            
                                                @else
                                                    <a href="">{{ $tag->name }} - </a>                                                            
                                                @endif
                                            @endforeach
                                        </p>
                                        <div class="social">
                                            <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href=""><i class="fa fa-google-plus"></i></a>
                                            <a href=""><i class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>  

                            </div>

                        @endforeach

                    </div>

                </div>

                <div class="col-4" style="max-height: 554px; overflow-y: scroll;">

                    <a class="twitter-timeline" href="https://twitter.com/cheanahis?ref_src=twsrc%5Etfw">Tweets de Anahis Palacios</a> 
                    <script asyn src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                </div>
            </div>

        </div>

    </section>

    <!--==========================
    Gallery Section
    ============================-->
    <section id="galeria" class="wow fadeInUp">

        <div class="container-fluid">

            <div class="section-header">
                <h2>Galeria</h2>
                <p>Contempla nuestra Historia y Esencia</p>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 venue-map">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251440.75671271226!2d-67.62663447479949!3d10.036502757876676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e801eaad586b55f%3A0xd64a5f780d0f2d5a!2sZamora%2C%20Aragua%2C%20Venezuela!5e0!3m2!1ses!2sbg!4v1662491962210!5m2!1ses!2sbg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
    
                <div class="col-lg-6 venue-info">
                    <div class="row justify-content-center">
                        <div class="col-11 col-lg-8">

                            <h3>Alcadia de Zamora, Aragua</h3>
                            <p>Villa de Cura es conocida como la cuna de Rafael Bolívar Coronado, autor de la letra del Alma Llanera, cuna de los Niños Cantores que llevan el nombre de la ciudad, de Los Turpiales de Aragua y de Danzas Caribai.</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid venue-gallery-container">
            <div class="row no-gutters">

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/1.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/1.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/2.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/2.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/3.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/3.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/4.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/4.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/5.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/5.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/6.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/6.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/7.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/7.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="venue-gallery">
                        <a href="{{ asset('src/img/venue-gallery/8.jpg') }}" class="venobox" data-gall="venue-gallery">
                            <img src="{{ asset('src/img/venue-gallery/8.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!--==========================
    direcciones Section
    ============================-->
    <section id="direcciones" class="section-with-bg wow fadeInUp">

        <div class="container">

            <div class="section-header">
                <h2>Direcciones</h2>
            </div>

            <div class="row no-gutters supporters-wrap clearfix">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('src/img/supporters/1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('src/img/supporters/2.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('src/img/supporters/3.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('src/img/supporters/4.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!--==========================
    Subscribe Section
    ============================-->
    <section id="subscribe">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h2>Siguenos</h2>
                <p>Para mas informacion Nuestras Redes Sociales.</p>
            </div>
        </div>
    </section>

    <!--==========================
    Buy Ticket Section
    ============================-->
    <section id="atencion-ciudadano" class="section-with-bg wow fadeInUp">
        <div class="container">

            <div class="section-header">
                <h2>Atencion al Ciudadano</h2>
                <p>Pensamos en como optimizar sus reclamos desde la eficiencia</p>
            </div>

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                        <h6 class="card-price text-center">$350</h6>
                        <hr>
                        <ul class="fa-ul text-center">
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                        </ul>
                        <hr>
                        <div class="text-center">
                            <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Guardar</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Modal Order Form -->
        <div id="buy-ticket-modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Buy Tickets</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <select id="ticket-type" name="ticket-type" class="form-control" >
                                    <option value="">-- Select Your Ticket Type --</option>
                                    <option value="standard-access">Standard Access</option>
                                    <option value="pro-access">Pro Access</option>
                                    <option value="premium-access">Premium Access</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn">Buy Now</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </section>

    <!--==========================
    Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

        <div class="container">

            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Nihil officia ut sint molestiae tenetur.</p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>A108 Adam Street, NY 535022, USA</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>

            </div>

            <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>        
        </div>
    </section><!-- #contact -->

@endsection