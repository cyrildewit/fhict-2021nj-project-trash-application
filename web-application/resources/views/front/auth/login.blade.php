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
</section>
@endsection
