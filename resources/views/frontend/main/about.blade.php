@extends('frontend.layouts.master')

@section('navigation')
    @include('partials.navigation')
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
            <div class="container-fluid px-0">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img d-flex align-self-stretch align-items-center js-fullheight" style="background-image:url({{ asset('images/armin.jpeg') }});">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="text px-4 pt-5 pt-md-0 px-md-4 pr-md-5 ftco-animate">
                            <h2 class="mb-4">I'm <span>Armin PourAlvani</span> a Iranian Software developer &amp; Marketer</h2>
                            <p>I am a skilled and dedicated Back-End Developer with a strong passion for programming. With 2 years of experience in the back-
                                end development, I have a deep understanding of coding PHP language. My expertise lies in developing efficient and reliable web
                                applications and optimizing their performance..</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


