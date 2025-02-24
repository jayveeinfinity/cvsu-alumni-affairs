@extends('layouts.job')

@section('main-content')
<style>
    .taggable-input {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        border-radius: 6px;
        border: 1px solid var(--rts-border);
    }
    .taggable-input input  {
        width: 300px !important;
        flex: 1;
        padding: 15px 10px !important;
        border: none !important;
        outline: none !important;
    }
    .section__padding_alt {
        padding-top: 165px;
        padding-bottom: 0px;
    }
    @media screen and (max-width: 992px) {
        .section__padding_alt {
            padding-top: 155px;
            padding-bottom: 0px;
        }
    }
    @media screen and (max-width: 768px) {
        .section__padding_alt {
            padding-top: 160px;
        }
    }
    .controls {
        margin-top: 10px;
    }
    .taggable-container:nth-child(0) {
        border-right: 1px solid #d8d9db !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<!-- job list one -->
<div class="rts__section section__padding_alt">
    <div class="container">
        <div class="my__profile__tab p-0 pb-5 radius-16 bg-white">
            <a href="{{ route('user.profile.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Back to profile</a>
            <h3 class="mb-3">Edit profile</h3>
            <nav>
                <div class="nav nav-tabs">
                    <a class="nav-link active" href="#info" data-tab="info">Personal Details</a>
                    <a class="nav-link" href="#education" data-tab="education">Educational Background</a>
                    <a class="nav-link" href="#experience" data-tab="experience">Work Experience</a>
                    <a class="nav-link" href="#skills" data-tab="skills">Skills</a>
                </div>
            </nav>
            <div class="tab-content clearfix">
                <div class="my__details tab-pane active" id="info">
                    <div class="info__top">
                        <div class="author__image">
                            <img src="/storage/images/avatars/default.png" alt="avatar" style="height: 200px; width: 200px;">
                        </div>
                        <div class="select__image">
                            <label for="file" class="file-upload__label" id="uploadButton">Upload New Photo</label>
                            <input type="file" class="file-upload__input" id="inputImage" accept="image/*">
                        </div>
                        <div class="delete__data">
                            <i class="fas fa-trash"></i>
                        </div>
                        <!-- <div class="controls">
                            <label for="zoomRange">Zoom:</label>
                            <input type="range" id="zoomRange" min="0.1" max="3" step="0.1" value="0.1">
                        </div>
                        <div class="controls">
                            <button id="cropImage">Crop Image</button>
                        </div> -->
                    </div>
                    <div class="info__field mt-5">
                        <div class="alert alert-danger pl-0 d-none" id="addAlumniAlert">
                            <ul class="mb-0" id="errorList"></ul>
                        </div>
                        <h6>Personal Details</h6>
                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="Type first name..." value="{{ $user->profile->first_name }}" required>
                            </div>
                            <div class="rt-input-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Type last name..." value="{{ $user->profile->last_name }}" required>
                            </div>
                        </div>
                        <div class="row row-cols-1">
                            <div class="rt-input-group">
                                <label for="about">About</label>
                                <textarea name="about" id="about" placeholder="Tell us about yourself..." required>{{ $user->profile->about }}</textarea>
                            </div>
                        </div>
                        <div class="rt-input-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" placeholder="Type address..." value="{{ $user->profile->address }}" required>
                        </div>
                        <h6>Contact Details</h6>
                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="phone_number">Phone</label>
                                <input type="tel" name="phone_number" id="phone_number" placeholder="Type phone number..." value="{{ $user->profile->phone_number }}" required>
                            </div>
                            <div class="rt-input-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Type email..." value="{{ $user->email }}" readonly disabled>
                            </div>
                        </div>
                        <div class="row row-cols-sm-2 row-cols-1 g-3 flex-row-reverse">
                            <button type="submit" class="rts__btn fill__btn mx-1" data-click="saveProfile">Save</button>
                        </div>

                        <!-- <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="ws">Working Schedule</label>
                                <select name="ws" id="ws" class="form-select">
                                    <option value="18">Day Shift</option>
                                    <option value="19">Night Shift</option>
                                </select>
                            </div>
                            <div class="rt-input-group">
                                <label for="wd">Working Day</label>
                                <select name="wd" id="wd" class="form-select">
                                    <option value="18">Sat - Thus</option>
                                    <option value="19">Mon - Fri</option>
                                    <option value="20">Mon - Sun</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="salary">Salary</label>
                                <select name="salary" id="salary" class="form-select">
                                <option value="1">Hourly</option>
                                <option value="1">Monthly</option>
                                <option value="1">Custom</option>
                                </select>
                            </div>
                            <div class="rt-input-group">
                                <label for="hp">How You Want To Pay?</label>
                                <select name="hp" id="hp" class="form-select">
                                    <option value="1">Monthly</option>
                                    <option value="2">Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="salarymin">Salary Min</label>
                                <select name="salary" id="salarymin" class="form-select">
                                <option value="1">1000 - 1500</option>
                                <option value="1">2000 - 2500</option>
                                <option value="1">3000 - 3500</option>
                                </select>
                            </div>
                            <div class="rt-input-group">
                                <label for="sm">Salary Max</label>
                                <select name="sm" id="sm" class="form-select">
                                    <option value="1">1000 - 1500</option>
                                    <option value="1">2000 - 2500</option>
                                    <option value="1">3000 - 3500</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="experience">Experience</label>
                            <input type="text" id="experience" placeholder="Enter Experience" required="">
                            </div>
                            <div class="rt-input-group">
                                <label for="qf">Qualification</label>
                                <input type="text" id="qf" placeholder="Enter Qualification" required="">
                            </div>
                        </div>

                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="ad">Application Deadline Date</label>
                            <input type="text" id="ad" placeholder="DD/MM/YY" required="">
                            </div>
                            <div class="rt-input-group">
                                <label for="vurl">Introduction Video URL</label>
                                <input type="text" id="vurl" placeholder="Link Here" required="">
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="my__details tab-pane" id="education">
                    <div class="info__field mt-5">
                        <div class="alert alert-danger pl-0 d-none" id="addEducationalBackgroundAlert">
                            <ul class="mb-0" id="errorList"></ul>
                        </div>
                        <h6>Educational background <button class="btn btn-sm fill__btn border-6 font-xs" data-toggle="modal" data-target="#addEducationForm" data-backdrop="static" data-keyboard="false">Add</button></h6>
                        <div class="row g-30">
                        @forelse($user->profile->educations as $education)
                            <div class="col-lg-12">
                                <div class="rts__job__card__big style__gradient justify-content-between d-flex gap-4 align-items-center">
                                    <div class="d-flex flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 align-items-center">
                                        <div class="company__icon rounded-2">
                                            <!-- <img src="assets/img/home-1/company/apple.svg" alt=""> -->
                                            <i class="fas fa-university fa-3x"></i>
                                        </div>
                                        <div class="job__meta w-100 d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center gap-3">
                                                <span class="job__title h6 mb-0">{{ $education->institution }}</span>
                                            </div>
                                            <div class="d-flex gap-3 gap-md-4 flex-wrap mb-2">
                                                @if($education->degree)
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fas fa-graduation-cap"></i> {{ $education->degree }}
                                                </div>
                                                @endif
                                                <!-- <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light rt-briefcase"></i> Full Time
                                                </div> -->
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fas fa-calendar"></i> @if($education->date_started) {{ $education->date_started }} - @endif {{ $education->date_ended ?? 'PRESENT' }}
                                                </div>
                                            </div>
                                            @if($education->honors)
                                            <div class="job__tags d-flex flex-wrap gap-3">
                                                @foreach($education->honors as $honor)
                                                    <a>{{ $honor }}</a>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="bookmark__btn">
                                            <i class="fas fa-pencil-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No educational background yet. To add one, click add</p>
                        @endforelse
                        </div>
                    </div>
                </div>
                <div class="my__details tab-pane" id="experience">
                    <div class="info__field mt-5">
                        <div class="alert alert-danger pl-0 d-none" id="addWorkExperienceAlert">
                                <ul class="mb-0" id="errorList"></ul>
                            </div>
                            <h6>Work Experience <button class="btn btn-sm fill__btn border-6 font-xs" data-toggle="modal" data-target="#addWorkExperienceForm" data-backdrop="static" data-keyboard="false">Add</button></h6>
                            <div class="row g-30">
                            @forelse($user->profile->work_experiences as $work_experience)
                                <div class="col-lg-12">
                                    <div class="rts__job__card__big style__gradient justify-content-between d-flex gap-4 align-items-center">
                                        <div class="d-flex flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 align-items-center">
                                            <div class="company__icon rounded-2">
                                                <!-- <img src="assets/img/home-1/company/apple.svg" alt=""> -->
                                                <i class="fas fa-building fa-3x"></i>
                                            </div>
                                            <div class="job__meta w-100 d-flex flex-column gap-2">
                                                <div class="d-flex justify-content-between align-items-center gap-3">
                                                    <span class="job__title h6 mb-0">{{ $work_experience->position }} </span>
                                                </div>
                                                <div class="d-flex gap-3 gap-md-4 flex-wrap mb-2">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        {{ $work_experience->institution }}
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fas fa-calendar"></i> @if($work_experience->date_started) {{ $work_experience->date_started }} - @endif {{ $work_experience->date_ended ?? 'PRESENT' }}
                                                    </div>
                                                </div>
                                                <div class="job__tags d-flex flex-wrap gap-3">
                                                    <a>{{ Str::title($work_experience->employment_type) }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="bookmark__btn">
                                                <i class="fas fa-pencil-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No work experience background yet. To add one, click add</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="my__details tab-pane" id="skills">
                        <div class="info__field mt-5">
                            <div class="alert alert-danger pl-0 d-none" id="addSkillsAlert">
                                <ul class="mb-0" id="errorList"></ul>
                            </div>
                            <h6>Skills <button class="btn btn-sm fill__btn border-6 font-xs" data-toggle="modal" data-target="#addSkillsForm" data-backdrop="static" data-keyboard="false">Add</button></h6>
                                <div class="job__tags job__details__tags">
                                @forelse($user->profile->skills as $skill)
                                    <a class="job__tag">{{ $skill->label }}</a>
                                @empty
                                    <p>No skills yet. To add one, click add</p>
                                @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Education Modal -->
<div class="modal fade" id="addEducationForm" tabindex="-1" role="dialog" aria-labelledby="addEducationFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEducationFormTitle"><i class="fas fa-graduation-cap"></i> Add education form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-4 pb-5">
                <div class="alert alert-danger pl-0 d-none" id="addAlumniAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <div class="info__field">
                    <div class="row row-cols-1 g-3">
                        <div class="rt-input-group">
                            <label for="level">Level*</label>
                            <select name="level" id="level" class="form-select" required>
                                <option value="" selected disabled>Choose level...</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="senior_high">Senior High</option>
                                <option value="college">College</option>
                                <option value="graduate_studies">Graduate studies</option>
                            </select>
                        </div>
                        <div class="rt-input-group" id="institution_container">
                            <label for="institution">Institution*</label>
                            <input type="text" name="institution" id="institution" placeholder="Type institution..." required>
                        </div>
                        <div class="rt-input-group d-none" id="degree_container">
                            <label for="degree">Course/Degree/Strand <span class="d-inline-block mb-0 fst-italic text-lowercase" style="font-size: 14px;">(if applicable)</span></label>
                            <input type="text" name="degree" id="degree" placeholder="Type degree...">
                        </div>
                        <div class="rt-input-group d-none" id="major_container">
                            <label for="major_specilization">Major/Specialization <span class="d-inline-block mb-0 fst-italic text-lowercase" style="font-size: 14px;">(if applicable)</span></label>
                            <input type="text" name="major_specialization" id="major_specilization" placeholder="Type major/specilization...">
                        </div>
                        <div class="rt-input-group d-none" id="period_of_attendance_from_container">
                            <label for="period_of_attendance_from">Period of Attendance (From):</label>
                            <input type="text" name="period_of_attendance_from" id="period_of_attendance_from" placeholder="Type year...">
                        </div>
                        <div class="rt-input-group d-none" id="is_completed_container">
                            <input type="checkbox" id="is_completed" class="mx-2" style="width: initial;"> Completed
                        </div>
                        <div class="rt-input-group d-none" id="period_of_attendance_to_container">
                            <label for="period_of_attendance_to">Period of Attendance (To):</label>
                            <input type="text" name="period_of_attendance_to" id="period_of_attendance_to" placeholder="Type year...">
                        </div>
                        <div class="rt-input-group d-none" id="honor_awards_container">
                            <label for="honor_award">Honors/Awards <span class="d-inline-block mb-0 fst-italic text-lowercase" style="font-size: 14px;">(if applicable)</span></label>
                            <div class="taggable-input" id="taggable-input">
                                <input type="text" name="honor_award" id="honor_award" placeholder="Type honors/awards..." />
                                <input type="hidden" id="honors_awards" name="honors_awards" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="saveEducation">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Avatar Cropper Modal -->
<div class="modal fade" id="avatarCropperModal" tabindex="-1" role="dialog" aria-labelledby="avatarCropperModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="avatarCropperModalTitle"><i class="fas fa-arrows-alt"></i> Crop image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-4 pb-5">
                <div class="info__field">
                    <div class="row row-cols-1 g-3">
                        <img src="" id="cropperImage" height="100">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="saveEducation">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Work Experience Modal -->
<div class="modal fade" id="addWorkExperienceForm" tabindex="-1" role="dialog" aria-labelledby="addWorkExperienceFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addWorkExperienceFormTitle"><i class="fas fa-briefcase"></i> Add work experience form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-4 pb-5">
                <div class="alert alert-danger pl-0 d-none" id="addExperienceAlert">
                    <ul class="mb-0" id="weErrorList"></ul>
                </div>
                <div class="info__field">
                    <div class="row row-cols-1 g-3">
                        <div class="rt-input-group" id="position_container">
                            <label for="position">Position*</label>
                            <input type="text" name="position" id="position" placeholder="Type position..." required>
                        </div>
                        <div class="rt-input-group" id="we_institution_container">
                            <label for="we_institution">Institution*</label>
                            <input type="text" name="we_institution" id="we_institution" placeholder="Type institution..." required>
                        </div>
                        <div class="rt-input-group">
                            <label for="employment_type">Type of Employement*</label>
                            <select name="employment_type" id="employment_type" class="form-select" required>
                                <option value="" selected disabled>Choose type of employement...</option>
                                <option value="casual">Casual</option>
                                <option value="constractual">Contractual</option>
                                <option value="full_time">Full time</option>
                                <option value="intership">Intership</option>
                                <option value="part_time">Part time</option>
                                <option value="temporary">Temporary</option>
                            </select>
                        </div>
                        <div class="rt-input-group" id="industry_container">
                            <label for="industry">Nature of work/Industry*</label>
                            <select name="industry" id="industry" class="form-select" required>
                                <option value="" selected disabled>Choose nature of work/industry...</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rt-input-group" id="we_period_of_attendance_from_container">
                            <label for="we_period_of_attendance_from">Period of Attendance (From):*</label>
                            <input type="text" name="we_period_of_attendance_from" id="we_period_of_attendance_from" placeholder="Type year...">
                        </div>
                        <div class="rt-input-group" id="we_period_of_attendance_to_container">
                            <label for="we_period_of_attendance_to">Period of Attendance (To): <span class="d-inline-block mb-0 fst-italic text-lowercase" style="font-size: 14px;">(optional)</span></label>
                            <input type="text" name="we_period_of_attendance_to" id="we_period_of_attendance_to" placeholder="Type year...">
                        </div>
                        <div class="row row-cols-1">
                            <div class="rt-input-group">
                                <label for="we_about">About</label>
                                <textarea name="we_about" id="we_about" placeholder="Tell us about yourself..." required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="saveWorkExperience">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Skills Modal -->
<div class="modal fade" id="addSkillsForm" tabindex="-1" role="dialog" aria-labelledby="addSkillsFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillsFormTitle"><i class="fas fa-briefcase"></i> Add skill form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-4 pb-5">
                <div class="alert alert-danger pl-0 d-none" id="addSkillsAlert">
                    <ul class="mb-0" id="weErrorList"></ul>
                </div>
                <div class="info__field">
                    <div class="row row-cols-1 g-3">
                        <div class="rt-input-group">
                            <label for="skill">Skill*</label>
                            <input type="text" name="skill" id="skill" placeholder="Type skill..." required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="saveSkills">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
@endsection
@section('script')
<script>
    document.addEventListener("click", (e) => {
        e = e || window.event;
        var target = e.target || e.srcElement;
        switch(target.dataset.click) {
            case "saveProfile":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());
                formData.append('address', $('#address').val());
                formData.append('about', $('#about').val());
                formData.append('phone_number', $('#phone_number').val());
                $.ajax({
                    method: "POST",
                    url: "{{ route('user.profile.update', ['user_id' => auth()->user()->id ]) }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added to alumni profiles!', 'Alumni added');
                        $('#addAlumniForm').modal('hide');
                    },
                    error: (response) => {
                        $('#errorList').empty();

                        if (response.responseJSON) {
                            const errors = response.responseJSON.errors;
                            for (const field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    const errorMessages = errors[field];
                                    errorMessages.forEach(function(message) {
                                        const listItem = $('<li></li>').text(`${message}`);
                                        $('#errorList').append(listItem);
                                    });
                                }
                            }

                            if ($('#addAlumniAlert').hasClass("d-none")) {
                                $('#addAlumniAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
            case "saveEducation":
                var level = $('#level').find(":selected").val();

                if(!level) {
                    return alert('Please select level!');
                }

                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('level', level);
                formData.append('institution', $('#institution').val());
                formData.append('date_started', $('#period_of_attendance_from').val());
                formData.append('date_ended', $('#period_of_attendance_to').val());
                formData.append('honors', $('#honors_awards').val());
                if(level != 'primary') {
                    formData.append('degree', $('#degree').val());
                }
                $.ajax({
                    method: "POST",
                    url: "{{ route('user.profile.education.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added to alumni profiles!', 'Alumni added');
                        $('#addAlumniForm').modal('hide');
                    },
                    error: (response) => {
                        $('#errorList').empty();

                        if (response.responseJSON) {
                            const errors = response.responseJSON.errors;
                            for (const field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    const errorMessages = errors[field];
                                    errorMessages.forEach(function(message) {
                                        const listItem = $('<li></li>').text(`${message}`);
                                        $('#errorList').append(listItem);
                                    });
                                }
                            }

                            if ($('#addAlumniAlert').hasClass("d-none")) {
                                $('#addAlumniAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
            case "saveWorkExperience":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('position', $('#position').val());
                formData.append('institution', $('#we_institution').val());
                formData.append('employment_type', $('#employment_type').find(":selected").val());
                formData.append('industry_id', $('#industry').find(":selected").val());
                formData.append('date_started', $('#we_period_of_attendance_from').val());
                formData.append('date_ended', $('#we_period_of_attendance_to').val());
                formData.append('about', $('#we_about').val());
                $.ajax({
                    method: "POST",
                    url: "{{ route('user.profile.work_experience.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added a work experience!', 'Profile updated');
                        $('#addWorkExperienceForm').modal('hide');
                    },
                    error: (response) => {
                        $('#weErrorList').empty();

                        if (response.responseJSON) {
                            const errors = response.responseJSON.errors;
                            for (const field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    const errorMessages = errors[field];
                                    errorMessages.forEach(function(message) {
                                        const listItem = $('<li></li>').text(`${message}`);
                                        $('#weErrorList').append(listItem);
                                    });
                                }
                            }

                            if ($('#addExperienceAlert').hasClass("d-none")) {
                                $('#addExperienceAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
            case "saveSkills":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('label', $('#skill').val());
                $.ajax({
                    method: "POST",
                    url: "{{ route('user.profile.skill.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added a skill!', 'Profile updated');
                        $('#skill').val('');
                        $('#addSkillForm').modal('hide');
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    },
                    error: (response) => {
                        $('#weErrorList').empty();

                        if (response.responseJSON) {
                            const errors = response.responseJSON.errors;
                            for (const field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    const errorMessages = errors[field];
                                    errorMessages.forEach(function(message) {
                                        const listItem = $('<li></li>').text(`${message}`);
                                        $('#weErrorList').append(listItem);
                                    });
                                }
                            }

                            if ($('#addSkillAlert').hasClass("d-none")) {
                                $('#addSkillAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
        }
    });

    var $uploadButton = $('#uploadButton');
    var $inputImage = $('#inputImage');
    var $image = $('#cropperImage');
    var $zoomRange = $('#zoomRange');
    var $modal = $('#avatarCropperModal');

    $(document).ready(function() {
        $uploadButton.click(() => $inputImage.click());
        // =================================================================================================
        // ===================================== AVATAR UPLOAD =============================================
        // =================================================================================================
        $inputImage.on('change', (e) => {
            var files = event.target.files;
            if (files && files.length) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Set the image source and show modal with options
                    $image.attr('src', e.target.result);

                    // Show the modal with 'static' backdrop and keyboard disabled
                    $modal.modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    $modal.modal('show');
                    
                     // Initialize Cropper when modal is shown
                    $modal.on('shown.bs.modal', function () {
                    cropper = new Cropper($image[0], {
                        aspectRatio: 1, // Square aspect ratio
                        viewMode: 2, // Ensures the image fills the canvas
                        dragMode: 'move', // Allow moving the image, but not the crop box
                        autoCropArea: 1, // Crop area fills the canvas by default
                        cropBoxResizable: false, // Disable resizing of the crop box
                        movable: true, // Allow moving the image inside the crop box
                        zoomable: true, // Allow zooming
                        responsive: true, // Resize canvas with window,
                        cropBoxResizable: false,
                        guides: false,
                        toggleDragModeOnDblclick: false,
                        minContainerWidth: 250,
                        minContainerHeight: 250,
                        minCropBoxWidth: 100,
                        minCropBoxHeight: 100,
                        maxCropBoxWidth: 100,
                        maxCropBoxHeight: 100,
                        ready: function () {
                            // Set initial zoom level based on slider value
                            cropper.zoomTo($zoomRange.val());
                        }
                    });
                });

                // Clean up when modal is hidden
                $modal.on('hidden.bs.modal', function () {
                    cropper.destroy(); // Destroy cropper instance when modal is closed
                });
            };
            reader.readAsDataURL(files[0]);
            }
        });

        const navLinks = document.querySelectorAll('.nav-link');
        const tabPanes = document.querySelectorAll('.tab-pane');

        navLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Remove 'active' class from all tabs
                navLinks.forEach(function (item) {
                    item.classList.remove('active');
                });

                // Add 'active' class to the clicked tab
                this.classList.add('active');

                // Hide all tab panes
                tabPanes.forEach(function (pane) {
                    pane.classList.remove('active');
                });

                // Show the associated tab pane
                const tabId = this.getAttribute('data-tab');
                const activePane = document.getElementById(tabId);
                activePane.classList.add('active');
            });
        });

        $('#level').on('change', (e) => {
            let value = $('#level').find(":selected").val();

            $('#period_of_attendance_from_container').addClass('d-none');
            $('#is_completed_container').addClass('d-none');
            $('#period_of_attendance_to_container').addClass('d-none');

            switch(value) {
                // case "primary":
                // case "secondary":
                //     $('#period_of_attendance_from_container').removeClass('d-none');
                //     $('#is_completed_container').removeClass('d-none');
                //     $('#period_of_attendance_from_container').removeClass('d-none');
                //     $('#is_completed_container').removeClass('d-none');
                //     break;
                case "secondary":
                    $('#degree_container').removeClass('d-none');
                    break;
                case "senior_high":
                    $('#degree_container').removeClass('d-none');
                    break;
                case "college":
                case "graduate_studies":
                    $('#degree_container').removeClass('d-none');
                    $('#major_container').removeClass('d-none');
                    break;
            }

            $('#period_of_attendance_from_container').removeClass('d-none');
            $('#is_completed_container').removeClass('d-none');
            $('#period_of_attendance_from_container').removeClass('d-none');
            $('#is_completed_container').removeClass('d-none');
            $('#honor_awards_container').removeClass('d-none');
        });

        $('#is_completed').on('change', (e) => {
            if($('#is_completed').prop('checked'))  {
                $('#period_of_attendance_to_container').removeClass('d-none');
            } else {
                $('#period_of_attendance_to_container').addClass('d-none');
            }
        });

        const $inputField = $('#honor_award');
        let honors = [];

        function updateHiddenField() {
            $('#honors_awards').val(honors.join(','));
        }

        function addTag(value) {
            if (value.trim() === '') return;

            const $honor = $(`<div class="btn-group m-1 taggable-container"><button type="button" class="btn btn-primary">${value}</button></div>`);
            const $removeButton = $('<button type="button" class="btn btn-primary">X</button>');

            $removeButton.on('click', function() {
                $honor.remove();
                honors = honors.filter(v => v !== value);
                updateHiddenField();
            });

            $honor.append($removeButton);
            $honor.insertBefore($inputField);

            honors.push(value);
            updateHiddenField();
        }

        $inputField.on('keydown', function(e) {
            if ((e.key === 'Enter' || e.key === ',' || e.keyCode == 9) && $inputField.val().trim() !== '') {
                $(this).focus();
                e.preventDefault();
                let inputValue = $inputField.val().replace(',', '').trim();
                addTag($inputField.val());
                $inputField.val('');
            } else if(e.key === 'Backspace' && $inputField.val() === '') {
                removeLastHonor();
            }
        });

        $inputField.on('blur', function() {
            if ($inputField.val()) {
                addTag($inputField.val());
                $inputField.val('');
            }
        });

        function removeLastHonor() {
            if (honors.length > 0) {
                honors.pop();
                renderHonors();
                updateHiddenField();
            }
        }

        function renderHonors() {
            $('.taggable-container').remove();
            honors.forEach(value => {
                const $honor = $(`<div class="btn-group m-1 taggable-container"><button type="button" class="btn btn-primary">${value}</button></div>`);
                const $removeButton = $('<button type="button" class="btn btn-primary">X</button>');

                $removeButton.on('click', function() {
                    $honor.remove();
                    honors = honors.filter(v => v !== value);
                    updateHiddenField();
                });
            
                $honor.append($removeButton);
                $honor.insertBefore($inputField);
            });
        }
    });

    // document.addEventListener('DOMContentLoaded', function () {
    //     const image = document.getElementById('image');
    //     const inputImage = document.getElementById('inputImage');

    //     const cropper = new Cropper(image, {
    //         aspectRatio: 1, // Square aspect ratio
    //         viewMode: 3, // Ensures the crop area stays within the canvas
    //         autoCropArea: 1,
    //         movable: true, // Allow moving the crop area
    //         zoomable: true, // Allow zooming the image
    //         responsive: true,
    //         dragMode: 'move',
    //         modal: true,
    //         scalable: false,
    //         rotatable: true,
    //         cropBoxResizable: false,
    //         guides: false,
    //         toggleDragModeOnDblclick: false,
    //         minContainerWidth: 100,
    //         minContainerHeight: 100,
    //         minCropBoxWidth: 100,
    //         minCropBoxHeight: 100
    //     });

    //     // Handle file upload
    //     inputImage.addEventListener('change', function (event) {
    //         const files = event.target.files;
    //         if (files && files.length) {
    //         const reader = new FileReader();
    //         reader.onload = function (e) {
    //             image.src = e.target.result;
    //             cropper.replace(image.src);
    //         };
    //         reader.readAsDataURL(files[0]);
    //         }
    //     });

    //     // Zoom control through the slider
    //     zoomRange.addEventListener('input', function () {
    //         const zoomLevel = parseFloat(this.value);
    //         console.log("zoomLevel: " + zoomLevel)
    //         cropper.zoomTo(zoomLevel);
    //     });

    //     // Crop image
    //     document.getElementById('cropImage').addEventListener('click', function () {
    //         const croppedCanvas = cropper.getCroppedCanvas({
    //             width: 300, // Final width of cropped image
    //             height: 300, // Final height of cropped image
    //         });

    //         // You can send the croppedCanvas to the server or display it
    //         const croppedImageDataURL = croppedCanvas.toDataURL();
    //         console.log(croppedImageDataURL);
            
    //         // Optional: display the cropped image
    //         document.body.append(croppedCanvas);
    //     });
    //     });
</script>
@endsection