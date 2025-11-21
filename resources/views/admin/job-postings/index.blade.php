@extends('layouts.admin')

@section('title')
    Alumni Directory &sdot;
@endsection

@section('main-content-header')
<div class="content-header" style="background-image: url('{{ config('r2.endpoint') }}/images/backgrounds/bg-alumni.webp'); background-size: cover; background-position: 100% 60%; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="badge badge-primary float-sm-left mb-3" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-alt-circle-left"></i> Back to admin dashboard</a>
                <br><br><br><br>
                <h1 class="m-0 text-white" style="text-shadow: 4px 4px 6px #838383;"><i class="fas fa-briefcase"></i> Job Postings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb px-3 elevation-1 bg-white float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Job Postings</li>
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
                        <h3 class="w-100 card-title">Job Postings ({{ $jobPostings->total() }})</h3>
                        <div class="w-100 d-flex flex-row-reverse" style="gap: 1rem;">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addJobPostingForm" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus"></i> Add job posting</button>
                            <button class="btn btn-outline-success" href="javascript:void(0)" data-click="importExcelFile"><i class="fas fa-file-excel" data-click="importExcelFile"></i> Import from excel</button>
                            <span class="btn btn-outline-success" style="display: none;" data-loading="import"><i class="fas fa-compact-disc fa-spin"></i> Importing...</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        @if(!$jobPostings->isEmpty())
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title/Company</th>
                                                    <th>Job type</th>
                                                    <th>Experience</th>
                                                    <th>Location</th>
                                                </tr>
                                            </thead>
                                        @endif
                                        <tbody>
                                            @forelse ($jobPostings as $jobPosting)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <h6 class="mb-0 font-weight-bold">{{ $jobPosting->title }}</h6>
                                                        <span class="badge rounded-pill badge-primary">{{ $jobPosting->company }}</span>
                                                    </td>
                                                    <td>{{ $jobPosting->job_type }}</td>
                                                    <td>{!! $jobPosting->experience ?? "<em>No experience required</em>" !!}</td>
                                                    <td><i class="fas fa-map-marker-alt"></i> {{ $jobPosting->location }}</td>
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
                                        Showing {{ $jobPostings->firstItem() }} to {{ $jobPostings->lastItem() }} of {{ number_format($jobPostings->total()) }} entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_numbers">
                                        {{ $jobPostings->links() }} <!-- Laravel's built-in pagination links -->
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
<!-- Modal -->
<div class="modal fade" id="addJobPostingForm" tabindex="-1" role="dialog" aria-labelledby="addJobPostingFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-industry"></i> Add job posting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger pl-0 d-none" id="addJobPostingAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <form id="addJobPosting">
                    <!-- Title -->
                    <div class="form-group mb-0">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Type title..." required>
                    </div>
                    <!-- Company -->
                    <div class="form-group mb-0">
                        <label for="company" class="col-form-label">Company</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Type company..." required>
                    </div>
                    <!-- Location -->
                    <div class="form-group mb-0">
                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Type location..." required>
                    </div>
                    <!-- Job Type -->
                    <div class="form-group row mb-0">
                        <div class="col-12 col-md-6 mb-2">
                            <label for="job_type" class="col-form-label">Job Type</label>
                            <select class="form-control" id="job_type" name="job_type" required>
                                <option value="" disabled selected>Choose job type...</option>
                                <option value="Contract">Contract</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label for="experience" class="col-form-label">Experience (In years)</label>
                            <input type="text" class="form-control" id="experience" name="experience" placeholder="Type experience...">
                        </div>
                        <!-- Salary Min -->
                        <div class="col-12 col-md-6">
                            <label for="salary_min" class="col-form-label">Minimum Salary</label>
                            <input type="text" class="form-control" id="salary_min" name="salary_min" placeholder="Type minimum salary...">
                        </div>
                        <!-- Salary Max -->
                        <div class="col-12 col-md-6">
                            <label for="salary_max" class="col-form-label">Maximum Salary</label>
                            <input type="text" class="form-control" id="salary_max" name="salary_max" placeholder="Type maximum salary...">
                        </div>
                    </div>
                    <!-- Job Description -->
                    <div class="form-group mb-0">
                        <label for="job_description" class="col-form-label">Job Description</label>
                        <textarea class="form-control" id="job_description" required>test</textarea>
                    </div>
                    <!-- Job Requirements -->
                    <div class="form-group mb-0">
                        <label for="job_description" class="col-form-label">Job Description</label>
                        <textarea class="form-control" id="job_description" required>test</textarea>
                    </div>
                    <!-- Job Qualifications -->
                    <div class="form-group mb-0">
                        <label for="job_description" class="col-form-label">Job Description</label>
                        <textarea class="form-control" id="job_description" required>test</textarea>
                    </div>
                    <!-- Apply Link -->
                    <div class="form-group mb-0">
                        <label for="apply_link" class="col-form-label">Apply Link</label>
                        <input type="text" class="form-control" id="apply_link" name="apply_link" placeholder="Type apply link..." required>
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
                formData.append('title', $('#title').val());
                formData.append('company', $('#company').val());
                formData.append('location', $('#location').val());
                formData.append('job_type', $('#job_type').find(":selected").val());
                formData.append('experience', $('#experience').val());
                formData.append('salary_min', $('#salary_min').val());
                formData.append('salary_max', $('#salary_max').val());
                formData.append('job_description', $('#job_description').val());
                formData.append('apply_link', $('#apply_link').val());
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.job-postings.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added to job postings!', 'Job posting added');
                        $('#addJobPostingForm').modal('hide');
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

                            if ($('#addJobPostingAlert').hasClass("d-none")) {
                                $('#addJobPostingAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });

                $('#addJobPosting').find('input[type="text"], textarea').val('');
                $('#addJobPosting').find('select').prop('selectedIndex', 0);
                $('#addJobPosting').find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
                break;
            case "importExcelFile":
                excelUpload();
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
                    url: "{{ route('admin.job-postings.import') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Hide spinner and show button again
                        loadingSpinner.style.display = 'none';
                        importExcelFileBtn.style.display = 'inline';

                        // Display toast notification
                        // toastr.success(`${response.inserted} rows inserted,<br>${response.duplicates} rows skipped,<br>${response.failed} rows failed`, 'Import completed');
                    }
                });
            }
        })();
    }
</script>
@endsection 