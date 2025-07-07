@extends('layouts.admin')

@section('title')
    Alumni Directory &sdot;
@endsection

@section('main-content-header')
<div class="content-header" style="background-image: url('/storage/images/backgrounds/bg-alumni.webp'); background-size: cover; background-position: 100% 60%; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="badge badge-primary float-sm-left mb-3" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-alt-circle-left"></i> Back to admin dashboard</a>
                <br><br><br><br>
                <h1 class="m-0 text-white" style="text-shadow: 4px 4px 6px #838383;"><i class="fas fa-users"></i> Alumni Directory</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb px-3 elevation-1 bg-white float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Alumni Directory</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('main-content')
<div class="content">
    <div class="container-fluid">
        <div class="row pt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="w-100 card-title">Alumni Profiles ({{ $alumniProfiles->total() }})</h3>
                        <div class="w-100 d-flex flex-row-reverse" style="gap: 1rem;">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addAlumniForm" data-backdrop="static" data-keyboard="false"><i class="fas fa-user-plus"></i> Add alumni</button>
                            <button class="btn btn-outline-success" href="javascript:void(0)" data-click="importExcelFile"><i class="fas fa-file-excel" data-click="importExcelFile"></i> Import from excel</button>
                            <span class="btn btn-outline-success" style="display: none;" data-loading="import"><i class="fas fa-compact-disc fa-spin"></i> Importing...</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="mb-3">
                            <div class="form-row">
                                <div class="col-1">
                                    <label>Program</label>
                                    <select id="filter_course" class="form-control form-control-sm">
                                    <option value="All">All</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->course }}" {{ ($filter_course == $program->course ? 'selected' : '') }}>{{ $program->course }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1">
                                    <label>Year Graduated</label>
                                    <select id="filter_year" class="form-control form-control-sm">
                                        <option value="All">All</option>
                                        {{ $last = 1906 }}
                                        {{ $now = date('Y') }}
                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}" {{ ($filter_year == $i ? 'selected' : '') }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        @if(!$alumniProfiles->isEmpty())
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name/Student Number</th>
                                                    <th>Status</th>
                                                    <th>Program</th>
                                                    <th>Sex</th>
                                                    <th>Year Graduated</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        @endif
                                        <tbody>
                                            @forelse ($alumniProfiles as $alumniProfile)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <h6 class="mb-0 font-weight-bold">{{ $alumniProfile->last_name }}, {{ $alumniProfile->first_name }}</h6>
                                                        <span class="badge rounded-pill badge-primary">{{ $alumniProfile->student_number }}</span>
                                                    </td>
                                                    <td>{!! $alumniProfile->getAlumniStatus($alumniProfile->id) !!}</td>
                                                    <td>{{ $alumniProfile->course }}</td>
                                                    <td>{{ Str::ucfirst($alumniProfile->sex) }}</td>
                                                    <td>{{ $alumniProfile->year_graduated }}</td>
                                                    <td>
                                                        <button class="btn btn-sm bg-gradient-primary" data-click="editAlumni" data-id="{{ $alumniProfile->id }}"><i class="fas fa-edit" data-click="editAlumni" data-id="{{ $alumniProfile->id }}"></i> Edit</button>
                                                        <button class="btn btn-sm bg-gradient-danger" data-click="btn-delete"><i class="fas fa-trash" data-click="btn-delete" data-id="{{ $alumniProfile->id }}"></i> Delete</button>
                                                        @if($alumniProfile->isMailable())
                                                            <button class="btn btn-sm bg-gradient-warning" data-click="sendEmail" data-id="{{ $alumniProfile->id }}"><i class="fas fa-envelope" data-click="sendEmail" data-id="{{ $alumniProfile->id }}"></i> Send email</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <p class="mb-0">No records yet.</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" role="status" aria-live="polite">
                                        Showing {{ $alumniProfiles->firstItem() }} to {{ $alumniProfiles->lastItem() }} of {{ number_format($alumniProfiles->total()) }} entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_numbers">
                                        {{ $alumniProfiles->links() }} <!-- Laravel's built-in pagination links -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info">Showing 1 to 1 of {{ 1 }} {{ Str::plural('entry', 1) }}</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_numbers">
                                        <ul class="pagination"></ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create Modal -->
<div class="modal fade" id="addAlumniForm" tabindex="-1" role="dialog" aria-labelledby="addAlumniFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user-plus"></i> Add alumni form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger pl-0 d-none" id="addAlumniAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <form>
                    <!-- Student Number -->
                    <div class="form-group mb-0">
                        <label for="student_number" class="col-form-label">Student Number</label>
                        <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Type student number..." required maxlength="9">
                    </div>
                    <!-- First Name -->
                    <div class="form-group mb-0">
                        <label for="first_name" class="col-form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Type first name..." required>
                    </div>
                    <!-- Last Name -->
                    <div class="form-group mb-0">
                        <label for="last_name" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Type last name..." required>
                    </div>
                    <!-- Sex -->
                    <div class="form-group mb-0">
                        <label for="sex" class="col-form-label">Sex</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <!-- Program -->
                    <div class="form-group mb-0 row">
                        <div class="col-12 col-md-6">
                            <label for="program" class="col-form-label">Program</label>
                            <select class="form-control" id="program" name="program" required>
                                <option value="" disabled selected>Choose program...</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="year_graduated" class="col-form-label">Year Graduated</label>
                            <select class="form-control" id="year_graduated" name="year_graduated" required>
                                <option value="" disabled selected>Choose year graduated...</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="addAlumni">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editAlumniModal" tabindex="-1" role="dialog" aria-labelledby="editAlumniModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlumniModalTitle"><i class="fas fa-user-edit"></i> Edit alumni form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger pl-0 d-none" id="editAlumniAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <form id="editAlumniForm">
                    <input type="hidden" id="id" name="id">
                    <!-- Student Number -->
                    <div class="form-group">
                        <label for="student_number" class="col-form-label">Student Number</label>
                        <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Type student number..." required maxlength="9">
                    </div>
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Type first name..." required>
                    </div>
                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Type last name..." required>
                    </div>
                    <!-- Sex -->
                    <div class="form-group mb-0">
                        <label for="sex" class="col-form-label">Sex</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <!-- Program -->
                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <label for="program" class="col-form-label">Program</label>
                            <select class="form-control" id="program" name="program" required>
                                <option value="" disabled selected>Choose program...</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="year_graduated" class="col-form-label">Year Graduated</label>
                            <select class="form-control" id="year_graduated" name="year_graduated" required>
                                <option value="" disabled selected>Choose year graduated...</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="updateAlumni">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    const importExcelFileBtn = document.querySelector('[data-click="importExcelFile"]');
    const loadingSpinner = document.querySelector('[data-loading="import"]');
    let id = null;

    document.addEventListener("click", (e) => {
        e = e || window.event;
        var target = e.target || e.srcElement;
        switch(target.dataset.click) {
            case "addAlumni":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('student_number', $('#student_number').val());
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());
                formData.append('sex', $('input[name="sex"]:checked').val());
                formData.append('course', $('#program').find(":selected").val());
                formData.append('year_graduated', $('#year_graduated').find(":selected").val());
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.alumni-profiles.store') }}",
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
            case "editAlumni":
                const alumniId = target.dataset.id;

                $.get(`/admin/alumni-profiles/${alumniId}`, function (data) {
                    $('#editAlumniForm #id').val(data.id);
                    $('#editAlumniForm #student_number').val(data.student_number);
                    $('#editAlumniForm #first_name').val(data.first_name);
                    $('#editAlumniForm #last_name').val(data.last_name);
                    $("#editAlumniForm #program").val(data.course).change();
                    $(`input[name="sex"][value="${data.sex}"]`).prop('checked', true);
                    $("#editAlumniForm #year_graduated").val(data.year_graduated).change();
                    $('#editAlumniModal').modal('show');
                });
                break;
            case "updateAlumni":
                let id = $('#editAlumniForm #id').val();
                console.log(id);

                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                formData.append('student_number', $('#editAlumniForm #student_number').val());
                formData.append('first_name', $('#editAlumniForm #first_name').val());
                formData.append('last_name', $('#editAlumniForm #last_name').val());
                formData.append('course', $('#editAlumniForm #program').find(":selected").val());
                formData.append('sex', $('input[name="sex"]:checked').val());
                formData.append('year_graduated', $('#editAlumniForm #year_graduated').find(":selected").val());
                $.ajax({
                    type: "POST",
                    url: `/admin/alumni-profiles/${id}`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully updated alumni profile!', 'Alumni updated');
                        setInterval(() => {
                            location.reload();
                        }, 1000)
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

                            if ($('#editAlumniAlert').hasClass("d-none")) {
                                $('#editAlumniAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
            case "importExcelFile":
                excelUpload();
                break;
            case "sendEmail":
                const user_id = target.dataset.id;
                target.disabled = true;

                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', user_id);
                $.ajax({
                    type: "POST",
                    url: `/admin/alumni-profiles/send-email/${user_id}`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully sent an email!', 'Email sent');
                        setInterval(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: (response) => {
                        toastr.error('An unexpected error occurred.', 'Something went wrong...');
                    }
                });
                break;
        }
    });

    function excelUpload() {
        (async () => {
            const { value: file } = await Swal.fire({
                title: '<i class="fas fa-file-excel"></i> Select excel file',
                input: 'file',
                inputAttributes: {
                    'accept': '.xlsx, .xls',
                    'aria-label': 'Upload excel file'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit'
            })
            if (file) {
                loadingSpinner.style.display = 'inline';
                importExcelFileBtn.style.display = 'none';
                
                var formData = new FormData();
                formData.append('alumni_file', file);
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.alumni-profiles.import') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Hide spinner and show button again
                        loadingSpinner.style.display = 'none';
                        importExcelFileBtn.style.display = 'inline';

                        // Display toast notification
                        toastr.success(`${response.inserted} rows inserted,<br>${response.duplicates} rows skipped,<br>${response.failed} rows failed`, 'Import completed');
                    }
                });
            }
        })();
    }

    $('#filter_course').on('change', function (e) {
        var formData = new FormData();
        let course = $('#filter_course').find(":selected").val();
        let year = $('#filter_year').find(":selected").val();
        
        window.location.href = '?program=' + course + '&year=' + year;
    });

    $('#filter_year').on('change', function (e) {
        var formData = new FormData();
        let course = $('#filter_course').find(":selected").val();
        let year = $('#filter_year').find(":selected").val();
        
        window.location.href = '?program=' + course + '&year=' + year;
    });
</script>
@endsection 