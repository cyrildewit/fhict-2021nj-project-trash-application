@extends('front.layouts.main')

@section('content')
<section id="MainContainer">
        <!-- Header starts here -->
        <header id="Header">
            <nav class="main-navigation">
                <div class="container clearfix">
                    <div class="site-logo-wrap">
                        <a class="logo" href="#"><img src="{{ asset('front/images/ds-logo.png') }}" style="height: 20px; width: auto;" alt="Design Studio"></a>
                    </div>
                    <a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
                    <div class="main-menu hidden-md-down">
                        <ul class="menu-list">
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Project Trash</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#About">Over Ons</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Onderbouwing</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#ContactUs">Contact</a></li>
                            <li><a class="nav-link" href="{{ route('front.auth.login') }}">Inloggen</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg-up">
                    <ul class="mobile-menu-list">
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Project Trash</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#About">Over Ons</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Onderbouwing</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#ContactUs">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Header ends here -->
        <!-- Banner starts here -->
        <section id="HeroBanner">
            <div class="hero-content">
                <h1>Welkom!</h1>
                <p>Dit is de officiele website van <strong>project Trash</strong></p>
                <a href="#About" class="hero-cta">Leer meer!</a>
            </div>
        </section>
        <!-- Banner ends here -->
        <!-- Services section starts here -->
        <section id="Services">
            <div class="container">
                <div class="block-heading">
                    <h2>Waarom project Trash?</h2>
                    <p></p>
                </div>
                <div class="services-wrapper">
                    <div class="each-service">
                        <div class="service-icon"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                        <h5 class="service-title">Het bijhouden van hoe vol prullenbak zijn.</h5>
                        <p class="service-description">Door een smart trash te hebben kan je makkelijk zien of een prullenbak vol is.</p>
                    </div>
                    <div class="each-service">
                        <div class="service-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                        <h5 class="service-title">Goed voor de economie</h5>
                        <p class="service-description">Omdat we producten vaker hergebruiken kost het minder grondstoffen.
                        <br>
                        Het scheidingsproces wordt goedkoper.

                        </p>
                    </div>
                    <div class="each-service">
                        <div class="service-icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                        <h5 class="service-title">Locaties</h5>
                        <p class="service-description">Momenteel zijn we druk bezig om ons product overal in Nederland implementeren.</p>

                    </div>
                </div>
            </div>
        </section>
        <!-- Services section ends here -->
        <!-- About Us section starts here -->

        <section class="stat" id="stats" >
          <div class="container">
           <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">12</span>
            <p>steden die project Trash toegepast hebben.</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">2356</span>
            <p>prullenbakken geplaatst.</p>
  				</div>


          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">12349</span>
            <p>keer zijn de prullenbakken vorige week gebruikt.</p>
  				</div>

  			</div>
        </div>
        </section>
           <br>
           <br>

        <section id="About">
            <div class="container">
                <div class="block-heading">
                    <h2>Wat doet <strong>project Trash</strong> ?</h2>
                    <p>Bekijk deze informatieve video voor verdere informatie.</p>
                    <iframe width="721" height="406" src="https://www.youtube.com/embed/5D1dsXA6Cgk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <!-- About Us section ends here -->
        <!-- Portfolio section starts here -->
        <section id="Portfolio">
            <div class="container">
                <div class="block-heading">
                    <h2>Onderbouwing</h2>
                    <p>Wat is het voordeel van ons project?</p>
                </div>
                <div class="portfolio-wrapper clearfix">
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-one.jpg') }}">
                    <img src="{{ asset('front/images/p-one.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">GREEN</h5>
                            <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-two.jpg') }}">
                    <img src="{{ asset('front/images/p-two.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">TRASHCAN</h5>
                           <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-three.jpg') }}">
                    <img src="{{ asset('front/images/p-three.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                       <div class="hover-cont-block">
                           <h5 class="p-title">inspiration</h5>
                           <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-four.jpg') }}">
                    <img src="{{ asset('front/images/p-four.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">ECO FRIENDLY</h5>
                           <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-five.jpg') }}">
                    <img src="{{ asset('front/images/p-five.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">EXAMPLE</h5>
                           <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-six.jpg') }}">
                    <img src="{{ asset('front/images/p-six.jpg') }}" alt="p-one">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">LABEL</h5>
                           <div class="p-desc">
                                <div></div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-two.jpg') }}">
                    <img src="{{ asset('front/images/p-two.jpg') }}" alt="p-seven">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">GRAFIEK SCHEIDEN</h5>
                           <div class="p-desc">
                                <div>Het scheiden van pmd in aantal jaren.</div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-eight.jpg') }}">
                    <img src="{{ asset('front/images/p-eight.jpg') }}" alt="p-eight">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                           <h5 class="p-title">GLOBAAL</h5>
                           <div class="p-desc">
                                <div>Plastic verbruik per jaar.</div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                    <a class="each-portfolio" data-fancybox="gallery" href="{{ asset('front/images/p-nine.jpg') }}">
                    <img src="{{ asset('front/images/p-nine.jpg') }}" alt="p-nine">
                    <div class="hover-cont-wrap">
                        <div class="hover-cont-block">
                            <h5 class="p-title">HUISHOUDELIJK AFVAL</h5>
                            <div class="p-desc">
                                <div>het huishoudelijke afval per jaar..</div>
                                <div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                   </a>
                </div>
            </div>
        </section>
        <!-- Portfolio section ends here -->
        <section id="Testimonial">
          <div class="testimonial-wrap">
          <div class="container">
            <div class="block-heading">
              <h2>Reviews van enkele gebruikers</h2>
            </div>
            <ul class="testimonial-slider">
              <li>"Het is eigenlijk net zo snel als je een ander prullenbak, je hoeft alleen even snel te scannen en je krijgt een statiegeld bonnetje.. "</li>
              <li>"dankzij project Trash is het scheiding van producten in de steden een stuk makkelijker geworden.<br> dit is ook meteen beter voor het mileu. "</li>
              <li>" Ik zie op het station dat het daadwwerkelijk gebruikt wordt, cheers. "</li>
            </ul>
          </div>
        </div>
        </section>
        <!-- Contact us section starts here -->
        <section id="ContactUs">
            <div class="container contact-container">
                <h3 class="contact-title">Neem contact met ons op.</h3>
                <div class="contact-outer-wrapper">
                    <div class="address-block">
                        <p class="add-title">Contact Details</p>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span> <span class="c-info">Rachelsmolen 1, 5612 MA Eindhoven</span>
                        </div>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-phone" aria-hidden="true"></i></span> <span class="c-info">04012345678</span>
                        </div>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span> <span class="c-info">Trash@project.com</span>
                        </div>
                    </div>
                    <div class="form-wrap">
                        <p class="add-title">Verstuur ons een bericht.</p>
                        <form>
                            <div class="fname floating-label">
                                <input type="text" class="floating-input" name="full name" id="full-name-field" />
                                <label for="full-name-field">Naam</label>
                            </div>
                            <div class="email floating-label">
                                <input type="email" class="floating-input" name="email" id="mail-field" />
                                <label for="mail-field">E-mail</label>
                            </div>
                            <div class="contact floating-label">
                                <input type="tel" class="floating-input" name="contact" id="contact-us-field" />
                                <label for="contact-us-field">Contact</label>
                            </div>
                            <div class="company floating-label">
                                <input type="text" class="floating-input" name="company" id="company-field" />
                                <label for="company-field">Bedrijf</label>
                            </div>
                            <div class="user-msg floating-label">
                                <textarea class="floating-input" name="user message" id="user-msg-field"></textarea>
                                <label for="user-msg-field" class="msg-label">Je bericht</label>
                            </div>
                            <div class="submit-btn">
                                <button type="submit">Verstuur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact us section ends here -->

            <!-- Footer section starts here -->
        <footer id="Footer">
            <div class="container">
                <div class="social-share">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div>
                </div>
            </div>
        </footer>
        <!-- Footer section ends here -->
    </section>
@endsection
