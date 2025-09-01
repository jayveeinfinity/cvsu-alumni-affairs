@extends('layouts.job')

@section('title')
    Search Jobs
@endsection

@section('main-content-header')
@include('partials.header')
<!-- <section class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">Unlock Your Career Potential</h1>
        <p class="text-lg mb-8">Get expert guidance on career profiling and job searching to achieve your goals.</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</button>
    </div>
</section> -->
@endsection

@section('main-content')
<section class=" pt-80">
    <div class="rts__section section__padding">
        <div class="container">
            <div class="row g-30">
                <div class="col-lg-5 col-xl-4">
                    <div class="job__search__section mb-40">
                        <form action="#" class="d-flex flex-column row-30">
                            <div class="search__item">
                                <label for="search" class="mb-3 font-20 fw-medium text-dark text-capitalize">Search By Job Title</label>
                                <div class="position-relative">
                                    <input type="text" id="search" placeholder="Enter Type Of job" required>
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <!-- job location -->
                            <div class="search__item">
                                <h6 class="mb-3 font-20 fw-medium text-dark text-capitalize">Search Location</h6>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Search Location</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Search Location" class="option selected focus">Search Location</li>
                                            <li data-value="1" class="option">Dhaka</li>
                                            <li data-value="2" class="option">Barisal</li>
                                            <li data-value="3" class="option">Chittagong</li>
                                            <li data-value="4" class="option">Rajshahi</li>
                                        </ul>
                                    </div>
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <!-- job category -->
                            <div class="search__item">
                                <h6 class="mb-3 font-20 fw-medium text-dark text-capitalize">Search By Job category</h6>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Choose a Category</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Search By Job category" class="option selected focus">Choose a Category</li>
                                            <li data-value="1" class="option">Government</li>
                                            <li data-value="2" class="option">NGO</li>
                                            <li data-value="3" class="option ">Private</li>
                                        </ul>
                                    </div>
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                            <!-- job post time -->
                            <div class="search__item">
                                <h6 class="mb-3 font-20 fw-medium text-dark text-capitalize">Date posted</h6>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Date Posted</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Date posted" class="option selected focus">Date Posted</li>
                                            <li data-value="1" class="option">01 Jan 24</li>
                                            <li data-value="2" class="option">05 Feb 24</li>
                                            <li data-value="3" class="option">07 Mar 24</li>
                                        </ul>
                                    </div>
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>

                            <!-- job post time -->
                            <div class="search__item">
                                <div class="mb-3 font-20 fw-medium text-dark text-capitalize">job type</div>
                                <div class="search__item__list" >
                                    <div class="d-flex align-items-center justify-content-between list" >
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="fulltime" id="fulltime">
                                            <label for="fulltime">Full Time</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="part" id="part">
                                            <label for="part">Part Time</label>
                                        </div>
                                        <span>(80)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="temporary" id="temporary">
                                            <label for="temporary">temporary</label>
                                        </div>
                                        <span>(150)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="freelance" id="freelance">
                                            <label for="freelance">freelance</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- experience label -->
                            <div class="search__item">
                                <div class="mb-3 font-20 fw-medium text-dark text-capitalize">experience Label</div>
                                <div class="search__item__list" >

                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="5year" id="5year">
                                            <label for="5year">5 year</label>
                                        </div>
                                        <span>(10)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="4year" id="4year">
                                            <label for="4year">4 year</label>
                                        </div>
                                        <span>(15)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="3year" id="3year">
                                            <label for="3year">3 year</label>
                                        </div>
                                        <span>(50)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="fresher" id="fresher">
                                            <label for="fresher">fresher</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- salary label -->
                            <div class="search__item">
                                <div class="mb-3 font-20 fw-medium text-dark text-capitalize">salary offered</div>
                                <div class="search__item__list">

                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="500" id="500">
                                            <label for="500">under $500</label>
                                        </div>
                                        <span>(10)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="5000" id="5000">
                                            <label for="5000">$5,000 - $10,000</label>
                                        </div>
                                        <span>(44)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="1000" id="1000">
                                            <label for="1000">$10,000 - $15,000</label>
                                        </div>
                                        <span>(27)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="1500" id="1500">
                                            <label for="1500">$15,000 - $20,000</label>
                                        </div>
                                        <span>(85)</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="rts__btn no__fill__btn max-content mx-auto job__search__btn font-sm" aria-label="Search">Find Job</button>
                        </form>
                    </div>
                    <!-- job aleart -->
                    <!-- <div class="job__aleart job__search__section">
                        <form action="#" class="d-flex flex-column row-35">
                            <div class="search__item">
                                <label for="alert" class="mb-3 font-20 fw-medium text-dark text-capitalize">Job Alert</label>
                                <div class="position-relative">
                                    <input type="text" id="alert" placeholder="Enter Type Of job" required>
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <div class="search__item no-icon">
                                <label for="frequency" class="mb-3 font-20 fw-medium text-dark text-capitalize">EmailFrequency</label>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Daily</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Daily" class="option selected focus">Daily</li>
                                            <li data-value="1" class="option">Weakly</li>
                                            <li data-value="2" class="option">Monthly</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="rts__btn fill__btn py-3 rounded-2 job__search" aria-label="Search">Save Job Alert</button>
                        </form>
                    </div> -->
                    <!-- job aleart end -->
                </div>
                <div class="col-lg-7 col-xl-8">
                    <div class="top__query mb-40 d-flex flex-wrap gap-4 gap-xl-0 justify-content-between align-items-center">
                        <span class="text-dark font-20 fw-medium">Showing {{ $jobs->currentPage() }}-{{ $jobs->count() }} of {{ $jobs->total() }} results</span>
                        <div class="d-flex flex-wrap align-items-center gap-4">
                            <!-- <form action="#" class="category-select">
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">All Category</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="All Category" class="option selected focus">All Category</li>
                                            <li data-value="1" class="option">Part Time</li>
                                            <li data-value="2" class="option">Full Time</li>
                                            <li data-value="3" class="option">Government</li>
                                            <li data-value="4" class="option">NGO</li>
                                            <li data-value="5" class="option">Private</li>
                                        </ul>
                                    </div>
                                </div>
                            </form> -->
                            <div class="d-flex align-items-center gap-3" id="nav-tab" role="tablist">
                                <button class="rts__btn no__fill__btn grid-style nav-link active" data-bs-toggle="tab" data-bs-target="#grid"> <i class="fas fa-th-large"></i> Grid</button>
                                <button class="rts__btn no__fill__btn list-style nav-link" data-bs-toggle="tab" data-bs-target="#list"> <i class="fas fa-list"></i> List</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane grid__style fade show active" role="tabpanel" id="grid">
                            <div class="row g-30">
                                @forelse($jobs as $job)
                                    <div class="col-xl-6 col-md-6 col-lg-12">
                                        <div class="rts__job__card h-100">
                                            <!-- <div class="d-flex align-items-center justify-content-between">
                                                <div class="company__icon">
                                                    <img src="assets/img/home-1/company/google.svg" alt="">
                                                </div>
                                                <div class="featured__option">
                                                    
                                                </div>
                                            </div> -->
                                            <div class="h6 job__title mb-3">
                                                <a href="#" aria-label="job">
                                                    {{ $job->title }}, {{ $job->company }}
                                                </a>
                                            </div>
                                            <div class="d-flex gap-3 flex-wrap mb-3">
                                                <div class="d-flex gap-1 align-items-center">
                                                    <i class="fas fa-map-marker-alt"></i> {{ $job->location }}
                                                </div>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <i class="fas fa-briefcase"></i> {{ $job->job_type }}
                                                </div>
                                            </div>
                                            <p>{{ $job->job_description }}</p>
                                            <!-- <div class="job__tags d-flex flex-wrap gap-2 mt-4">
                                                <a href="#">Creative</a>
                                                <a href="#">user interface</a>
                                                <a href="#">web ui</a>
                                            </div> -->
                                        </div>
                                    </div>
                                @empty
                                    <p>No jobs found.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade list__style" role="tabpanel" id="list">
                            <div class="row g-30">
                                <!-- single item -->
                                <div class="col-lg-12">
                                    <div class="rts__job__card__big style__gradient flex-wrap justify-content-between d-flex gap-4 align-items-center">
                                        <div class="d-flex flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 align-items-center">
                                            <div class="company__icon rounded-2">
                                                <img src="assets/img/home-1/company/apple.svg" alt="">
                                            </div>
                                            <div class="job__meta w-100 d-flex flex-column gap-2">
                                                <div class="d-flex justify-content-between align-items-center gap-3">
                                                    <a href="#" class="job__title h6 mb-0">Senior UI Designer, Apple</a>
                                                </div>
                                                <div class="d-flex gap-3 gap-md-4 flex-wrap mb-2">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fas fa-map-marker-alt"></i> Newyork, USA
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fas fa-briefcase"></i> Full Time
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="far fa-clock"></i> 1 Years Ago
                                                    </div>
                                                </div>
                                                <div class="job__tags d-flex flex-wrap gap-3">
                                                    <a href="#">Creative</a>
                                                    <a href="#">user interface</a>
                                                    <a href="#">web ui</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="bookmark__btn"><i class="far fa-bookmark"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rts__pagination mx-auto pt-60 pb-60 max-content">
                    <ul class="d-flex gap-2">
                        {{-- Previous Page Link --}}
                        @if ($jobs->onFirstPage())
                            <li>
                                <a href="javascript:void(0)" class="inactive">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $jobs->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif
                        {{-- Pagination Elements --}}
                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            <li>
                                <a 
                                    href="{{ $url }}"
                                    class="{{ $page == $jobs->currentPage() ? 'active' : '' }}"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach
                        {{-- Next Page Link --}}
                        @if ($jobs->hasMorePages())
                            <li>
                                <a href="{{ $jobs->nextPageUrl() }}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="javascript:void(0)" class="inactive">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .rts__pagination a.active {
        background: var(--rts-button-1);
        color: #fff;
    }
    .rts__pagination a.inactive {
        pointer-events: none;
        opacity: 0.5;
    }
</style>