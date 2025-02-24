@extends('layouts.job')

@section('title')
    Sign up
@endsection

@section('main-content')
    <div class="container-fluid mt-5 py-5">
        <div class="container py-5">
            <div class="card">
                <div class="card-header text-uppercase">
                    Sign up
                </div>
                <div class="card-body p-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('signup.store') }}" method="POST">
                        @csrf
                        <div class="my__profile__tab radius-16 bg-white">
                            <!-- <nav>
                                <div class="nav nav-tabs">
                                    <a class="nav-link" href="#info">Company Details</a>
                                    <a class="nav-link active" href="#address">Contact Information</a>                         
                                </div>
                            </nav> -->
                            <div class="my__details" id="info">
                                <!-- <div class="info__top mt-0">
                                    <div class="author__image">
                                        <img  src="/storage/images/avatars/default.png" alt="">
                                    </div>
                                    <div class="select__image">
                                        <label for="file" class="file-upload__label">Upload New Photo</label>
                                        <input type="file" class="file-upload__input" id="file" required="">
                                    </div>
                                    <div class="delete__data">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </div> -->
                                <div class="info__field">
                                    <div class="row row-cols-sm-2 row-cols-1 g-3">
                                        <div class="rt-input-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" placeholder="example@domain.com..." required value="{{ old('email') }}">
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="student_number">Student Number</label>
                                            <input type="text" name="student_number" placeholder="Type student number..." required value="{{ old('student_number') }}" maxlength="9">
                                        </div>
                                    </div>
                                    <div class="row row-cols-sm-2 row-cols-1 g-3">
                                        <div class="rt-input-group">
                                            <label for="first_name">First name</label>
                                            <input type="text" name="first_name" placeholder="Type first name..." required value="{{ old('first_name') }}">
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="last_name">Last name</label>
                                            <input type="text" name="last_name" placeholder="Type last name..." required value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="row row-cols-sm-2 row-cols-1 g-3">
                                            <div class="rt-input-group">
                                                <label for="date_ended">Year graduated</label>
                                                <select name="date_ended" name="date_ended" class="form-select">
                                                    <option value="" selected disabled>Choose year graduated...</option>
                                                    {{ $last = 1906 }}
                                                    {{ $now = date('Y') }}
                                                    @for ($i = $now; $i >= $last; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="course">Course</label>
                                                <select name="course" name="course" class="form-select">
                                                    <option value="" selected disabled>Choose course...</option>
                                                    <option value="BSCS">BSCS</option>
                                                    <option value="BSIT">BSIT</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="row row-cols-sm-2 row-cols-1 g-3 flex-row-reverse">
                                        <button type="submit" class="rts__btn fill__btn mx-1">Create an account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection