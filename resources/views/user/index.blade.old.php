@extends('layouts.app')

@section('title')
    Profile &sdot; 
@endsection

@section('main-content') 
<div class="container-fluid ils-gradient-warning-alt p-0 m-0" style="height: 300px;">
    <div style="height: 300px; background-image: url({{ asset('/images/landing/library.jpg') }}) ; background-size: cover; background-position: 100% 77%;"></div>
</div>
<div class="container-fluid">
    <div class="container p-3" style="margin-top: -300px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-white font-weight-bold">Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="bg-white px-3 py-0 breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $googleUserInfo->picture }}" alt="User profile picture" style="border: 3px solid #ff8008 !important;">
                                </div>
                                <h3 class="profile-username text-center mb-0">{{ auth()->user()->name }}</h3>
                                <p class="text-muted text-center"><span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Account Validated</span></p>
                                @if(!is_string($patronData) && $patronData['sex'])
                                    <hr>
                                    <strong class="text-success"><i class="fas fa-venus-mars mr-1" aria-hidden="true"></i> Sex</strong>
                                    @php
                                        switch($patronData['sex']) {
                                            case "M":
                                                $sex = 'Male';
                                                break;
                                            case "F":
                                                $sex = 'Female';
                                                break;
                                            default:
                                            case "O":
                                                $sex = 'Others';
                                                break;
                                        }
                                    @endphp
                                    <p class="text-muted">{{ $sex }}</p>
                                @endif
                                @if(!is_string($patronData) && $patronData['address'])
                                <hr>
                                <strong class="text-success"><i class="fas fa-map-marker-alt mr-1" aria-hidden="true"></i> Address</strong>
                                <p class="text-muted">{{ $patronData['address'] }}</p>
                                @endif
                                @if(!is_string($patronData) && $patronData['phone'])
                                <hr>
                                <strong class="text-success"><i class="fas fa-mobile-alt mr-1" aria-hidden="true"></i> Contact Number</strong>
                                <p class="text-muted">{{ $patronData['phone'] }}</p>
                                @endif
                                <hr>
                                <strong class="text-success"><i class="fas fa-at mr-1" aria-hidden="true"></i> Email</strong>
                                <p class="text-muted">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        @if(!is_string($patronData))
                        <div class="card">
                            <div class="card-header ils-bg-green">
                                <h3 class="card-title text-white">Patron Information</h3>
                            </div>
                            <div class="card-body">
                                <strong class="text-success"><i class="fas fa-id-card mr-1" aria-hidden="true"></i> Cardnumber</strong>
                                <p class="text-muted">{{ $patronData['cardnumber'] }}</p>
                                @if($patronData['categorycode'])
                                <hr>
                                <strong class="text-success"><i class="fas fa-user mr-1" aria-hidden="true"></i> User Type</strong>
                                <p class="text-muted">{{ $patronData['categorycode'] }}</p>
                                @endif
                                @if($patronData['sort2'])
                                <hr>
                                <strong class="text-success"><i class="fas fa-university mr-1" aria-hidden="true"></i> College & Course</strong>
                                <p class="text-muted"><b>{{ $patronData['sort2'] }}</b> ({{ $patronData['sort1'] }})</p>
                                @endif
                                @if($patronData['dateexpiry'])
                                <hr>
                                <strong class="text-success"><i class="fas fa-calendar mr-1" aria-hidden="true"></i> Date Expiry</strong>
                                <p class="text-muted">{{ Carbon\Carbon::parse($patronData['dateexpiry'])->format('F d, Y') }}</p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#reservations" data-toggle="tab">Overview</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pastreservations" data-toggle="tab">Educational Background</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pastreservations" data-toggle="tab">Work Experience</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pastreservations" data-toggle="tab">Certification & Awards</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="reservations">
                                        <h5>Overview</h5>
                                        <!-- <p class="text-muted">No active reservations yet.</p>
                                        <div class="card">
                                            <div class="card-horizontal">
                                                @php
                                                    $status = "badge-primary";

                                                    $reservation_date = today();
                                                    $start_time = Carbon\Carbon::createFromTimestamp(strtotime(today()->format('Y-m-d')));
                                                    $end_time = Carbon\Carbon::createFromTimestamp(strtotime(today()->format('Y-m-d')));

                                                    $duration = $end_time->diff($start_time);
                                                    $image = "collaboration-area";
                                                @endphp
                                                <div class="img-square-wrapper">
                                                    <img class="" src="images/facilities/{{ $image }}.jpg" alt="Card image cap" style="height: 180px;">
                                                </div>
                                                <div class="card-body">
                                                <h4 class="card-title">Test<span class="badge badge-pill {{ $status }}">{{ Str::upper("Pending") }}</span></h4>
                                                <p class="card-text mb-0"><span class="badge badge-pill badge-warning">Date</span> {{ $reservation_date->format('F d, Y') }} ({{$reservation_date->format('l')}})</p>
                                                <p class="card-text mb-0"><span class="badge badge-pill badge-warning">Time</span> {{ Carbon\Carbon::parse($start_time)->format('h:i A') }} - {{ Carbon\Carbon::parse($end_time)->format('h:i A') }} ({{ $duration->format('%h') }} hours)</p>
                                                <p class="card-text"><span class="badge badge-pill badge-warning">Participants</span> 25</p>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Date confirmed: {{ $reservation_date->format('F d, Y') }}</small>
                                            </div>
                                        </div>-->
                                    </div> 
                                    <div class="tab-pane" id="pastreservations">
                                        <h5>Educational background</h5>
                                        <p class="text-muted">No educational background yet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection