@extends('layouts.job')

@section('main-content')
    <!-- breadcrumb area -->
    <div class="rts__section breadcrumb__background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative d-flex justify-content-between align-items-center">
                    <div class="breadcrumb__area max-content breadcrumb__padding">
                        <div class="rts__job__card__big bg-transparent p-0 position-relative z-1 flex-wrap justify-content-between d-flex gap-4 align-items-center">
                            <div class="d-flex gap-4 gap-md-5 align-items-center flex-md-row flex-column mx-auto mx-md-0">
                                <div class="author__icon rounded-2">
                                    <img src="/storage/images/avatars/default.png" alt="">
                                </div>
                                <div class="job__meta w-100 d-flex text-center text-md-start flex-column gap-2">
                                    <div>
                                        <h3 class="job__title h3 mb-0">{{ $user->profile->first_name }} {{ $user->profile->last_name }} </h3>
                                    </div>
                                    <div class="d-flex gap-3 justify-content-center justify-content-md-start flex-wrap mb-3 mt-2">
                                        <!-- <div class="d-flex gap-2 align-items-center">
                                            Software Engineer
                                        </div> -->
                                        @if($user->profile && $user->profile->adddress)
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fas fa-map-marker-alt"></i> {{ $user->profile->adddress }}
                                            </div>
                                        @endif
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fas fa-envelope"></i> {{ $user->email }}
                                        </div>
                                        @if($user->profile && $user->profile->phone_number)
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fas fa-phone"></i> {{ $user->profile->phone_number }}
                                            </div>
                                        @endif
                                        <!-- <div class="d-flex gap-2 align-items-center">
                                            <i class="fas fa-briefcase"></i> Full Time
                                        </div> -->
                                    </div>
                                    <div class="job__tags d-flex justify-content-center justify-content-md-start flex-wrap gap-3">
                                        @if($user->profile && $user->profile->skills)
                                            @foreach($user->profile->skills as $skill)
                                                <a href="javascript:void(0)">{{ $skill->label }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb__apply d-flex gap-3 max-content">
                            <!-- <a href="#" class="rts__btn apply__btn no__fill__btn">Shortlist</a> -->
                            <!-- <a href="#" class="rts__btn be-1 apply__btn fill__btn">Cv Download</a> -->
                        </div>             
                    </div>
                    <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                        <div class="shape__one common">
                        
                        </div>
                        <div class="shape__two common">
                            <img src="assets/img/breadcrumb/shape-2.svg" alt="">
                        </div>
                        <div class="shape__three common">
                            <img src="assets/img/breadcrumb/shape-3.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- job list one -->
    <div class="rts__section section__padding">
        <div class="container">
            <div class="row g-30">
                <div class="col-lg-12 col-xl-12 mt-0 text-end">
                    <a class="btn btn-primary" href="{{ route('user.profile.edit', ['user_id' => $user->id]) }}">Edit profile</a>
                </div>
                <div class="col-lg-12 col-xl-12">
                    <div class="rts__job__details">
                        <div id="description" class="mb-30">
                            <h6 class="fw-semibold mb-20">About me</h6>
                            @if($user->profile && $user->profile->about)
                                <p>{{ $user->profile->about }}</p>
                            @else
                                <em>No about me yet.</em>
                            @endif
                        </div>
                        <div id="responsibility" class="mb-30">
                            <h6 class="fw-semibold mb-20">Education</h6>
                            @if($user->profile && $user->profile->educations)
                                <ul class="timeline">
                                    @foreach($user->profile->educations as $education)
                                    <li>
                                        <span class="timeline__title d-block">{{ $education->institution }}</span>
                                        <span class="timeline__subtitle d-block">{{ $education->degree }} (@if($education->date_started)
                                            {{ $education->date_started }} -
                                        @endif{{ $education->date_ended ?? 'PRESENT' }})</span>
                                        @if($education->honors)
                                            <!-- <ul>
                                            @foreach($education->honors as $honor)
                                                <li class="mb-0">{{ $honor }}</li>
                                            @endforeach
                                            </ul> -->
                                            {{ collect($education->honors)->implode(', ') }}
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No education yet.</p>
                            @endif
                        </div>
                        <div id="experience" class="mb-30">
                            <h6 class="fw-semibold mb-20 text-capitalize">Work Experience</h6>
                            <ul class="timeline">
                                @forelse($user->profile->work_experiences as $work_experience)
                                <li>
                                    <span class="timeline__title d-block">{{ $work_experience->position }}</span>
                                    <span class="timeline__subtitle d-block">{{ $work_experience->institution }} (@if($work_experience->date_started)
                                        {{ $work_experience->date_started }} -
                                    @endif{{ $work_experience->date_ended ?? 'PRESENT' }})</span>
                                    <p class="mt-2 fw-medium">{{ $work_experience->about }}</p>
                                </li>
                                @empty
                                    <p>No work experience yet.</p>
                                @endforelse
                            </ul>
                        </div>  
                    </div>
                    @if($user->profile && $user->profile->skills)
                    <div id="skill" class="mb-30">
                        <h6 class="fw-semibold mb-20">Skills</h6>
                        <div class="job__tags job__details__tags">
                        @foreach($user->profile->skills as $skill)
                            <a href="#" class="job__tag">{{ $skill->label }}</a>
                        @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- <h6 class="fw-semibold text-capitalize mb-30 mt-30">See My Latest Project</h6>
                    <div class="row g-30 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                        <div class="col">
                            <img class="rounded-2 d-shadow" src="assets/img/pages/p-1.webp" alt="">
                        </div>
                        <div class="col">
                            <img class="rounded-2 d-shadow" src="assets/img/pages/p-2.webp" alt="">
                        </div>
                        <div class="col">
                            <img class="rounded-2 d-shadow" src="assets/img/pages/p-3.webp" alt="">
                        </div>
                    </div>
                    <h6 class="fw-semibold text-capitalize mb-30 mt-30">Award</h6>
                    <ul class="timeline">
                        <li>
                            <span class="timeline__title d-block">2015 IEEE CS TCSE Distinguished Education Award</span>
                            <span class="timeline__subtitle d-block">2015</span>
                            <p class="mt-2 fw-medium">In a world adorned with stars, where excellence glimmers like distant constellations, there exists a singular moment that transcends the ordinary, capturing the essence of brilliance in its purest form.</p>
                        </li>
                        <li>
                            <span class="timeline__title d-block">2024 IEEE CS TCSE Rising Star Award</span>
                            <span class="timeline__subtitle d-block">2014</span>
                            <p class="mt-2 fw-medium">In a world adorned with stars, where excellence glimmers like distant constellations, there exists a singular moment that transcends the ordinary, capturing the essence of brilliance in its purest form.</p>
                        </li>
                    </ul>
                </div>
                <div class="review__form job__contact mt-40">
                    <h6 class="fw-semibold mb-30">Add a review</h6>
                    <form action="#" class="d-flex flex-column gap-4">
                        <div class="row row-cols-lg-2 row-cols-1">
                            <div class="search__item">
                                <label for="cemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                <div class="position-relative">
                                    <input type="email" id="cemail" placeholder="Enter your email">
                                    <i class="rt-mailbox"></i>
                                </div>
                            </div>
                            <div class="search__item">
                                <label for="phone" class="mb-3 font-20 fw-medium text-dark text-capitalize">Phone</label>
                                <div class="position-relative">
                                    <input type="text" id="phone" placeholder="(+88)154-678789">
                                    <i class="rt-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="search__item">
                            <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="message">Your Message</label>
                            <textarea name="message" id="message" placeholder="Message"></textarea>
                            <i class="fa-thin fa-comment-lines"></i>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-2 mb-3">
                            <span class="fw-medium text-dark">Your Rating </span>
                            <div class="rating">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-sharp-half-stroke"></i>
                            </div>
                        </div>
                        <button type="submit" class="rts__btn fill__btn be-1 apply__btn w-100">Submit Review</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4 d-flex flex-column gap-40">
                <div class="job__overview">
                    <h6 class="fw-semibold mb-20">Job Overview</h6>
                    <div class="job__overview__content">
                        <ul>
                            <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                                <span class="left-text"> <i class="rt-qualification"></i> Qualification</span>
                                <span class="text">:  Bachelor Degree</span>
                            </li>
                            <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                                <span class="left-text"> <i class="rt-experience"></i> Experience</span>
                                <span class="text">:  2 Year</span>
                            </li>
                            <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                                <span class="left-text"> <i class="rt-price-tag"></i> Offered Salary</span>
                                <span class="text">: $2000-$3000</span>
                            </li>
                            <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                                <span class="left-text"> <i class="rt-loading"></i> Job Deadline</span>
                                <span class="text">: 01 July 2024</span>
                            </li>
                            <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                                <span class="left-text"> <i class="fa-sharp fa-thin fa-location-dot"></i> Location</span>
                                <span class="text">: New York, USA</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="job__contact d-flex align-items-center gap-3">
                    <h6 class="fw-semibold mb-0">Share</h6>
                    <div class="rts__social sidebar d-flex gap-3">
                        <a target="_blank" href="https://facebook.com"  aria-label="facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a target="_blank" href="https://instagram.com"  aria-label="instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a target="_blank" href="https://linkedin.com"  aria-label="linkedin">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a target="_blank" href="https://pinterest.com"  aria-label="pinterest">
                            <i class="fa-brands fa-pinterest"></i>
                        </a>
                        <a target="_blank" href="https://youtube.com"  aria-label="youtube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="job__contact">
                    <h6 class="fw-semibold mb-20">Contact Google.com</h6>
                    <form action="#" class="d-flex flex-column gap-4">
                        <div class="search__item">
                            <label for="gemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                            <div class="position-relative">
                                <input type="email" id="gemail" placeholder="Enter your email">
                                <i class="rt-mailbox"></i>
                            </div>
                        </div>

                        <div class="search__item">
                            <label for="gphone" class="mb-3 font-20 fw-medium text-dark text-capitalize">Phone</label>
                            <div class="position-relative">
                                <input type="text" id="gphone" placeholder="(+88)154-678789">
                                <i class="rt-phone"></i>
                            </div>
                        </div>
                        <div class="search__item">
                            <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="gmessage">Your Message</label>
                            <textarea name="message" id="gmessage" placeholder="Message"></textarea>
                            <i class="fa-thin fa-comment-lines"></i>
                        </div>
                        <button type="submit" class="rts__btn fill__btn be-1 apply__btn w-100">Send a Message</button>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
        <!-- job list one end -->

        <!-- top employer -->
        <!-- <div class="rts__section pb-120 overflow-hidden">
            <div class="container">
                <div class="row justify-content-center position-relative">
                    <div class="col-xl-6 col-lg-10">
                        <div class="rts__section__content text-center mb-60">
                            <h3 class="rts__section__title section__mb">Related Candidates</h3>
                            <p class="rts__section__desc">From entry-level positions to executive roles browse through.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-30"> -->
                    <!-- single employer -->
                    <!-- <div class="col-lg-12">
                        <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                            <div class="d-flex gap-4 flex-column flex-md-row 
                            justify-content-start align-items-md-center align-items-start">
                                <div class="author__icon small__thumb">
                                    <img src="assets/img/author/6.svg" alt="">
                                </div>
                                <div class="job__meta">
                                    <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                        <div>
                                            <a href="#" class="job__title mb-0 h6 fw-semibold">Elizabeth</a>
                                            <span class="d-block fw-medium">UI Designer</span>
                                        </div>
                                        <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light fa-location-dot"></i> Newyork, USA
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light rt-briefcase"></i> Full Time
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-4 flex-wrap align-items-center">
                                <div class="job__tags style__default d-flex flex-wrap gap-3">
                                    <a href="#">Creative</a>
                                    <a href="#">User Interface</a>
                                </div>
                                <button class="apply__btn" aria-label="View Profile">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <!-- single employer end -->
                    <!-- single employer -->
                    <!-- <div class="col-lg-12">
                        <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                            <div class="d-flex gap-4 flex-column flex-md-row 
                            justify-content-start align-items-md-center align-items-start">
                                <div class="author__icon small__thumb">
                                    <img src="assets/img/author/7.svg" alt="">
                                </div>
                                <div class="job__meta">
                                    <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                        <div>
                                            <a href="#" class="job__title mb-0 h6 fw-semibold">Addison Bekar</a>
                                            <span class="d-block fw-medium">Produc t Manager</span>
                                        </div>
                                        <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light fa-location-dot"></i> Newyork, USA
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light rt-briefcase"></i> Full Time
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-4 flex-wrap align-items-center">
                                <div class="job__tags style__default d-flex flex-wrap gap-3">
                                    <a href="#">Creative</a>
                                    <a href="#">User Interface</a>
                                </div>
                                <button class="apply__btn" aria-label="View Profile">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <!-- single employer end -->
                    <!-- single employer -->
                    <!-- <div class="col-lg-12">
                        <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                            <div class="d-flex gap-4 flex-column flex-md-row 
                            justify-content-start align-items-md-center align-items-start">
                                <div class="author__icon small__thumb">
                                    <img src="assets/img/author/8.svg" alt="">
                                </div>
                                <div class="job__meta">
                                    <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                        <div>
                                            <a href="#" class="job__title mb-0 h6 fw-semibold">Anastacia Alice</a>
                                            <span class="d-block fw-medium">Digital Marketer</span>
                                        </div>
                                        <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light fa-location-dot"></i> Newyork, USA
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-light rt-briefcase"></i> Full Time
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-4 flex-wrap align-items-center">
                                <div class="job__tags style__default d-flex flex-wrap gap-3">
                                    <a href="#">Blog Post</a>
                                    <a href="#">E-books</a>
                                </div>
                                <button class="apply__btn" aria-label="View Profile">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <!-- single employer end -->
                <!-- </div>
            </div>
        </div> -->
        <!-- top employer end -->

        <!-- app center -->
        <!-- <div class="rts__section pb-120">
            <div class="container">
                <div class="row">
                    <div class="rts__appcenter">
                        <div class="rts__appcenter__shape">
                            <img src="assets/img/home-1/app/shape.png" alt="">
                        </div>
                        <div class="rts__appcenter__content d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between justify-content-lg-center">
                            <div class="content__left align-items-end d-flex position-relative top-15px">
                                <img src="assets/img/home-1/app/app_screen.png" alt="">
                            </div>
                            <div class="content__right text-white text-center text-xl-start max-630">
                                <h3 class="l--1 mb-4 text-white wow animated fadeInUp" data-wow-delay=".1s ">Download The app Free!</h3>
                                <p class="wow animated fadeInUp" data-wow-delay=".2s">Looking for a new job can be both exciting and daunting. Navigating the job market involves exploring various avenues.</p>
                                <div class="d-flex gap-3 justify-content-center justify-content-xl-start flex-wrap mt-40 wow animated fadeInUp" data-wow-delay=".3s">
                                    <div class="link">
                                        <a href="https://appstore.com" target="_blank" title="app store">
                                            <img src="assets/img/home-1/app/app-store.svg" alt="">
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="https://google.com" target="_blank" title="play store">
                                            <img src="assets/img/home-1/app/play-store.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>app center end -->
@endsection