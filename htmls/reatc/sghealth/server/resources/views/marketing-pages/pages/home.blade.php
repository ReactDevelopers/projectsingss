@extends('marketing-pages.layouts.master')

@section('content')
	<!-- Banner Section HTML -->
     
        <div class="banner-section">
            <div class="container">
                <div class="main-content section-padding">
                    <div class="banner-content section-content wow fadeIn" data-wow-duration="0.8s">
                        <h1>A one stop solution for all you need for work.</h1>
                        <p>Download our mobile app and your documents will be safe
                            with our digital locker.</p>
                        <div class="banner-btn">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)"><span><img src="{{asset('assets/images/app-store.png')}}"></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><span><img src="{{asset('assets/images/play-store.png')}}"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="banner-mobile">
                        <img src="{{asset('assets/images/banner-mobile.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section HTML ends -->

        <!-- Workwallet Section HTML  -->
        <section class="workwallet-section">
            <div class="container">
                <div class="common-content section-padding">
                    <h2>Why choose My WorkWallet?</h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="workwallet-box">
                                <span class="rounded-image"><img src="{{asset('assets/images/electroni-copy.png')}}"></span>
                                <h3>Keep an electronic copy of your certificates
                                    and licenses with expiry reminders!</h3>
                                <p>Nunc at ex consectetur finibus lectusut aliquam ipsum
                                    aliquam velit venenatis magna accumsan varius quis
                                    libero suspendisse augue ante maximusa.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="workwallet-box">
                                <span class="rounded-image"><img src="{{asset('assets/images/on-the-go.png')}}"></span>
                                <h3>View your roster on-the-go</h3>
                                <p>Etiam tempus sollicitudin nullaut fringilla urna sagittis
                                    aliquam donec dapibus dictum eros fusce velodio dictum
                                    interdum risus eget, venenatis augue.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="workwallet-box">
                                <span class="rounded-image"><img src="{{asset('assets/images/keep-track.png')}}"></span>
                                <h3>Keep track of your CEP information and all
                                    your login passwords for work!</h3>
                                <p>Urna eget maximus maximus donecelit risus bibendum
                                    eget lobortisnon dictum in odio insit amet interdum ligula
                                    vitae consectetur ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Workwallet Section HTML end  -->

        <!-- Dropbox Section HTML  -->
        <section class="dropbox-section">
            <div class="container">
                <div class="common-content section-padding">
                    <div class="section-images"><img src="{{asset('assets/images/view-data.png')}}"></div>
                    <div class="background-padding">
                        <div class="background-color">
                            <span class="icon"><img src="{{asset('assets/images/browse-img.png')}}"></span>
                            <p>Browse jobs posted for freelancers</p>
                        </div>
                        <div class="common-text">
                            <h3>View your roster on-the-go!
                                Either via Cloud storage such as
                                Dropbox, OneDrive or the *in-build
                                easy-view roster</h3>
                            <p>Duis eget scelerisque anteut molestie lacus donec eget ex quis libero
                                ultrices tempor vitaet elit duis pellentesque risus nec pretium tristique,
                                lorem leo sodales ipsum vitae scelerisque enim ex ac mauris.</p>
                            <a href="javascript:void(0)" class="btn download-btn">DOWNLOAD NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Dropbox Section HTML  end -->

        <!-- Education Section HTML  -->
        <section class="education-section">
            <div class="container">
                <div class="common-content section-padding">
                    <div class="section-images hidden-md hidden-sm visible-xs">
                        <img src="{{asset('assets/images/track.png')}}" alt="Track Image">
                    </div>
                    <div class="background-padding">
                        <div class="background-color">
                            <span class="icon"><img src="{{asset('assets/images/packet-img.png')}}"></span>
                            <p>Best app for secure your documents</p>
                        </div>
                        <div class="common-text">
                            <h3>Keep track of your certificates and
                                licenses in one glance. </h3>
                            <p>Etiam quis fringilla quam eget sagittis nunc maecenas non volutpat nibh lorem ipsum dolor
                                sit amet consectetur adipiscing maecenas euismod libero sem quis tempus elit
                                sollicitudin sollicitudin.</p>
                            <a href="javascript:void(0)" class="btn download-btn">DOWNLOAD NOW</a>
                        </div>
                    </div>
                    <div class="section-images hidden-xs">
                        <img src="{{asset('assets/images/track.png')}}" alt="Track Image">
                    </div>
                </div>
            </div>
        </section>
        <!-- Education Section HTML end  -->

        <!-- Freelance Section HTML  -->
        <section class="freelance-section">
            <div class="container">
                <div class="common-content section-padding">
                    <div class="section-images">
                        <img src="{{asset('assets/images/freelance.png')}}">
                    </div>
                    <div class=" background-padding">
                        <div class="background-color">
                            <span class="icon"><img src="{{asset('assets/images/document-img.png')}}"></span>
                            <p>Pocket friendly secure safe</p>
                        </div>
                        <div class="common-text">
                            <h3>Information of upcoming conferences,
                                workshops, job openings, etc. all at
                                your fingertips!</h3>
                            <p>Cras feugiat rutrum pharetra nullam sagittis quam cursus cursus convallis morbi lobortis
                                felis nec ante rutrum rutrum bibendum tellus cursus nullam auctor porttitor nunca
                                bibendum dui imperdiet ut.</p>
                            <a href="javascript:void(0)" class="btn download-btn">DOWNLOAD NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Freelance Section HTML  end -->

        <!-- Download Section HTML -->
        <section class="download-section">
            <div class="container foot-sec">
                <div class="download-phone-wrapper">
                    <div class="download-content app-btn">
                        <h3>Download our app now</h3>
                        <p>Donec pellentesque eget velit eget aliquam phasellus lacus ipsum,
                            pulvinar placerat odioin luctus scelerisque arcu.</p>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><span><img src="{{asset('assets/images/app-store.png')}}"></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><span><img src="{{asset('assets/images/play-store.png')}}"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Download Section HTML end-->
@endsection