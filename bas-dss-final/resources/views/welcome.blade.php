<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>BAS</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-finance-business.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
</head>

<body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa-solid fa-clock"></i>Lun-Vie 09:00-16:00</a></li>
                        <li><a href="#"><i class="fa-solid fa-phone"></i>2243-6060</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="{{asset('media/img/BAS_Color.png')}}" style="width: 130px;" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Inicio
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Nuestros servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contáctanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Inicia sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('signup')}}">Registrate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item item-1">
                <div class="img-fill" style="background-image: url({{asset('media/img/slide_01.jpg')}});">
                    <div class="text-content">
                        <h6>Nosotros estamos listos para ayudarte</h6>
                        <h4>Análisis y consultoría<br>financiera</h4>
                        <p>Convierta la incertidumbre en claridad y la confusión en estrategia con nuestro servicio de análisis y consultoría financiera. ¡Descubra su potencial hoy mismo!</p>
                        <a href="contact.html" class="filled-button">Contáctanos</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-2">
                <div class="img-fill" style="background-image: url({{asset('media/img/slide_02.jpg')}});">
                    <div class="text-content">
                        <h6>Nosotros estamos aquí para apoyarte</h6>
                        <h4>Gerencia<br>de Contabilidad</h4>
                        <p>Nos dedicamos a proteger sus activos y maximizar sus ganancias. Confíe en nosotros para garantizar la seguridad y estabilidad de sus asuntos financieros.</p>
                        <a href="services.html" class="filled-button">Nuestros servicios</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-3">
                <div class="img-fill" style="background-image: url({{asset('media/img/slide_03.jpg')}});">
                    <div class="text-content">
                        <h6>Nosotros tenemos un fondo sólido</h6>
                        <h4>Análisis y estadísticas<br>de mercado</h4>
                        <p>Uno de nuestros propósitos es brindarle análisis detallados y estadísticas de mercado actualizadas. Nuestros expertos le brindarán información precisa para potenciar su estrategia financiera y tomar decisiones informadas.</p>
                        <a href="about.html" class="filled-button">Seguir leyeando</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>¿Desea contactarnos ahora mismo?</h4>
                    <span>¡Contáctenos hoy para descubrir cómo podemos ayudarlo a alcanzar sus metas financieras! Su éxito es nuestra prioridad.</span>
                </div>
                <div class="col-md-4">
                    <a href="contact.html" class="border-button">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Servicios <em>Financieros</em></h2>
                        <span>Nuestro compromiso es contigo para ofrecerte lo mejor</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="{{asset('media/img/service_01.jpg')}}" alt="">
                        <div class="down-content">
                            <h4>Créditos</h4>
                            <p>Acceso a financiamiento flexible y conveniente para empresas y particulares, facilitando el cumplimiento de objetivos financieros sin comprometer liquidez.</p>
                            <a href="" class="filled-button">leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="{{asset('media/img/service_02.jpg')}}" alt="">
                        <div class="down-content">
                            <h4>Análisis de mercado</h4>
                            <p>Proporcionamos información crucial sobre tendencias, competidores y oportunidades, permitiendo tomar decisiones estratégicas informadas para el éxito comercial.</p>
                            <a href="" class="filled-button">leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="{{asset('media/img/service_03.jpg')}}" alt="">
                        <div class="down-content">
                            <h4>Historial de datos</h4>
                            <p>Te proporcionamos un registro detallado de eventos pasados, esencial para comprender patrones, identificar tendencias y respaldar decisiones futuras en cualquier campo.</p>
                            <a href="#" class="filled-button">leer más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-content">
                        <span>Te brindamos como centro financiero</span>
                        <h2>Nuestra solución para el <em>crecimiento de su negocio</em></h2>
                        <p>Combinamos análisis exhaustivos, innovación constante y un enfoque centrado en el cliente para ofrecer soluciones efectivas y resultados duraderos. Confíe en nuestra experiencia para alcanzar sus objetivos con éxito.</p>
                        <a href="" class="filled-button">leer más</a>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">945</div>
                                <div class="count-title">Horas laboradas</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">1280</div>
                                <div class="count-title">Buenas críticas</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">578</div>
                                <div class="count-title">Casos realizados</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">26</div>
                                <div class="count-title">Premios ganados</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left-image">
                                    <img src="{{asset('media/img/more-info.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div class="right-content">
                                    <span>Quienes somos</span>
                                    <h2>Conozca acerca de <em>nuestra empresa</em></h2>
                                    <p>Somos su socio confiable en el camino hacia el éxito. Nos comprometemos a entender sus necesidades y aspiraciones. Con una dedicación inquebrantable, brindamos soluciones<br><br>innovadoras y un servicio excepcional. No nos limitamos a satisfacer, sino a superar sus expectativas en cada interacción.</p>
                                    <a href="#" class="filled-button">leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Lo que ellos dicen de <em>Nosotros</em></h2>
                        <span>Testimonios de nuestros mejores clientes</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-testimonials owl-carousel">

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>George Walker</h4>
                                <span>Analista financiero</span>
                                <p>"Estoy conforme con el servicio del banco. La atención al cliente es excelente y las opciones de cuenta se adaptan a mis necesidades. Sin embargo, sería beneficioso contar con más sucursales para mayor comodidad."</p>
                            </div>
                            <img src="{{asset('media/img/profile-01.jpeg')}}" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>John Smith</h4>
                                <span>Especialista de Mercado</span>
                                <p>"Desde el inicio, el personal ha sido amable y eficiente, y las soluciones financieras ofrecidas han superado mis expectativas. Definitivamente seguiré confiando en ellos para mis necesidades financieras futuras."</p>
                            </div>
                            <img src="{{asset('media/img/profile-05.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>David Wood</h4>
                                <span>Contador</span>
                                <p>"Me siento un poco inconforme con la demora en resolver algunos problemas. Sin embargo, valoro la atención al cliente y la calidad de los servicios financieros ofrecidos, lo que me hace seguir confiando en su compromiso de mejorar continuamente."</p>
                            </div>
                            <img src="{{asset('media/img/profile-03.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>Andrew Boom</h4>
                                <span>Marketing</span>
                                <p>"El personal es atento y profesional, y las opciones de cuenta son flexibles y convenientes. ¡Se los recomiendo a quienes aún no son clientes! No se arrepentirán de unirse a esta familia financiera que realmente se preocupa por sus clientes."</p>
                            </div>
                            <img src="{{asset('media/img/profile-04.jpg')}}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-partners owl-carousel">

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-02.svg')}}" title="1" alt="1" style="width: 75px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-03.png')}}" title="2" alt="2" style="width: 75px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-04.png')}}" title="3" alt="3" style="height: 75px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-05.png')}}" title="4" alt="4" style="width: 85px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-06.svg')}}" title="5" alt="5" style="width: 90px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-07.webp')}}" title="6" alt="6" style="width: 100%; height: 26px; margin: 20px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-08.png')}}" title="7" alt="7" style="width: 100%;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-09.png')}}" title="8" alt="8" style="width: 75px;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-10.png')}}" title="9" alt="9" style="width: 100%;">
                        </div>

                        <div class="partner-item">
                            <img src="{{asset('media/img/client-11.png')}}" title="10" alt="10" style="width: 90px;">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Starts Here -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-item">
                    <h4>Banco de Agricultura Salvadoreño</h4>
                    <p>Tu futuro, nuestra misión: juntos, construyamos un camino hacia la prosperidad financiera.</p>
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="https://fb.com/" target="_blank"><i class="fa-brands fa-square-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Enlaces útiles</h4>
                    <ul class="menu-list">
                        <li><a href="#">Vivamus ut tellus mi</a></li>
                        <li><a href="#">Nulla nec cursus elit</a></li>
                        <li><a href="#">Vulputate sed nec</a></li>
                        <li><a href="#">Cursus augue hasellus</a></li>
                        <li><a href="#">Lacinia ac sapien</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Páginas adicionales</h4>
                    <ul class="menu-list">
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Cómo trabajamos</a></li>
                        <li><a href="#">Equipo de Suporte</a></li>
                        <li><a href="#">Contáctanos</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2024 Banco de Agricultura Salvadoreño., Ltd.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap.bundle.min.js')}}"></script>

    <!-- Scripts -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/owl.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/accordions.js')}}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0;

        function clearField(t) {
            if (!cleared[t.id]) {
                cleared[t.id] = 1;
                t.value = '';
                t.style.color = '#fff';
            }
        }
    </script>

</body>

</html>