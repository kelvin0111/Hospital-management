@extends('layouts.frontend.main')

@section('content')
    <!-- ################# Slider Starts Here#######################--->

    <!--***************************** Slider Starts Here *****************************-->
    <div class="slider container-fluid">
        <ul id="slider">
            <li data-active="1" data-background="{{ asset('frontend/assets/images/slider/slider_1.jpg') }}">
                <div class="slider-layer">
                    <div class="container">
                        <h1 class="animated  slideInDown ">You are in the Right Place <br> at the Right Time</h1>
                        <p class="animated  fadeInLeftBig"> Providing the best healthcare services with advanced technologies
                            and experienced professionals.</p>
                        <span class="animated  fadeInLeftBig ">Your Health, Our Priority</span>
                        <div class="animated fadeInUpBig buttn-row">
                            <div class="btn"> <a href="{{ route('dashboard') }}">Book Appointment</a></div>
                        </div>
                    </div>
                </div>

            </li>
            <li data-active="0" data-background=" {{ asset('frontend/assets/images/slider/slider_1.jpg') }} ">
                <div class="slider-layer">
                    <div class="container">
                        <h1 class="animated  slideInDown ">You are in the Right Place <br> at the Right Time</h1>
                        <p class="animated  zoomInLeft ">We prioritize your health and well-being. Let us take care of
                            you.Empowering Lives Through Healthcare</p>
                        <span class="animated  slideInUp ">Your Health, Our Priority</span>
                        <div class="buttn-row animated  zoomInLeft">
                            <div class="btn"> <a href="{{ route('dashboard') }}">Book Appointment</a></div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div><!--########## Slider Ends Here ##########-->

    <!-- ################# Key Features Starts Here#######################--->

    <section id="services" class="key-features">
        <div class="container">
            <div class="inner-title">
                <h2>Discover Our Key Features</h2>
                <p>Explore the core features that set our hospital management system apart.</p>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-hospital-alt"></i>
                        <h5>Cutting-Edge Technologies</h5>
                        <p>Utilizing the latest advancements in healthcare technology to optimize efficiency and patient
                            care.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-user-md"></i>
                        <h5>Expert Medical Professionals</h5>
                        <p>Staffed by highly experienced doctors and medical personnel committed to delivering top-notch
                            healthcare services.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-briefcase-medical"></i>
                        <h5>Exceptional Patient Satisfaction</h5>
                        <p>Prioritizing patient satisfaction by offering personalized care and comprehensive support
                            throughout their healthcare journey.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-capsules"></i>
                        <h5>Streamlined Pharma Pipeline</h5>
                        <p>Efficiently manage pharmaceutical inventory and distribution with our integrated pharmacy
                            pipeline solution.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <h5>Dedicated Pharma Team</h5>
                        <p>A dedicated team of pharmacists and healthcare professionals ensuring accurate medication
                            dispensing and patient counseling.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="far fa-thumbs-up"></i>
                        <h5>Premium Quality Treatments</h5>
                        <p>Delivering high-quality medical treatments and procedures with a focus on patient safety and
                            satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ################# With Medical Starts Here#######################--->

    <section id="about_us" class="with-medical">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <img src="{{ asset('frontend/assets/images/why.jpg') }}"
                        alt="Why Choose Health Care with Medical Hospital">
                </div>
                <div class="col-lg-6 col-md-12 txtr">
                    <h4>Why Choose Health Care with <br> <span>Medical Hospital</span></h4>
                    <p>At Medical Hospital, we prioritize your well-being above all else. Our commitment to excellence in
                        healthcare is reflected in every aspect of our services.</p>
                    <p>We strive to provide personalized care tailored to meet your unique needs. With a team of dedicated
                        medical professionals and state-of-the-art facilities, we ensure that you receive the highest
                        quality treatment and support.</p>
                    <p>Experience peace of mind knowing that you are in capable hands at Medical Hospital. Whether you
                        require routine medical care or specialized treatment, we are here to guide you on your path to
                        wellness.</p>
                </div>
            </div>
        </div>
    </section>





    <!--  ************************* Blog Starts Here ************************** -->
    <div id="blog" class="blog">
        <div class="row session-title">
            <h2>Latest Medical Insights</h2>
            <p>Stay Informed with Our Latest Medical Discoveries</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="blog-singe no-margin row">
                        <div class="col-sm-5 blog-img-tab">
                            <img src="{{ asset('frontend/assets/images/blog/blog_01.jpg') }} " alt="">
                        </div>
                        <div class="col-sm-7 blog-content-tab">
                            <h2>The Importance of Early Diagnosis</h2>
                            <p><i class="fas fa-user"><small>Admin</small></i> <i class="fas fa-eye"><small>(12)</small></i>
                                <i class="fas fa-comments"><small>(12)</small></i>
                            </p>
                            <p class="blog-desic">Learn why early diagnosis plays a crucial role in effective treatment and
                                improved patient outcomes. Lorem Ipsum, type lorem then press the shortcut. The default
                                keyboard shortcut is the same keyboard shortcut is the </p>
                            <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="blog-singe no-margin row">
                        <div class="col-sm-5 blog-img-tab">
                            <img src="{{ asset('frontend/assets/images/blog/blog_02.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-7 blog-content-tab">
                            <h2>Advancements in Surgical Techniques</h2>
                            <p><i class="fas fa-user"><small>Admin</small></i> <i class="fas fa-eye"><small>(12)</small></i>
                                <i class="fas fa-comments"><small>(12)</small></i>
                            </p>
                            <p class="blog-desic">Explore the latest advancements in surgical techniques and how they are
                                revolutionizing patient care. Lorem Ipsum, type lorem then press the shortcut. The default
                                keyboard shortcut is the same keyboard shortcut is the </p>
                            <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ######## Blog End ####### -->

    <!--  ************************* Gallery Starts Here ************************** -->
    <div id="gallery" class="gallery">
        <div class="container">
            <div class="row">


                <div class="gallery-filter d-none d-sm-block">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    <button class="btn btn-default filter-button" data-filter="hdpe">Dental</button>
                    <button class="btn btn-default filter-button" data-filter="sprinkle">Cardiology</button>
                    <button class="btn btn-default filter-button" data-filter="spray"> Neurology</button>
                    <button class="btn btn-default filter-button" data-filter="irrigation">Laboratry</button>
                </div>
                <br />



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_01.jpg') }} " class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_02.jpg') }} " class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_03.jpg') }} " class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_04.jpg') }} " class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_05.jpg') }} " class="img-responsive">
                </div>



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src=" {{ asset('frontend/assets/images/gallery/gallery_06.jpg') }} " class="img-responsive">
                </div>

            </div>
        </div>


    </div>
    <!-- ######## Gallery End ####### -->


    <!-- ################# Our Team Starts Here#######################--->
    <section class="our-team">
        <div class="container">
            <div class="inner-title row">
                <h2>Our Team</h2>
                <p>Take a look at our Team</p>
            </div>
            <div class="row team-row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src=" {{ asset('frontend/assets/images/team/team-memb1.jpg') }} " alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src=" {{ asset('frontend/assets/images/team/team-memb2.jpg') }} " alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src=" {{ asset('frontend/assets/images/team/team-memb3.jpg') }} " alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src=" {{ asset('frontend/assets/images/team/team-memb4.jpg') }} " alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <!--  ************************* Contact Us Starts Here ************************** -->

    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">
            <div class="col-sm-6 no-padding">
                <iframe style="width:100%"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d249759.19784092825!2d79.10145254589841!3d12.009924873581818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1448883859107"
                    height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-sm-6 cop-ck text-center">
                <h2>Contact Us</h2>

                <div class="row cf-ro">
                    <div class="col-sm-12">
                        <a href="mailto:kelvinkent668@gmail.com" class="btn btn-success btn-lg">Email Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
