@extends('layouts.admin')

@section('title')
    Industries &sdot;
@endsection

@section('main-content-header')
<div class="content-header" style="background-image: url('{{ config('r2.endpoint') }}/images/backgrounds/bg-alumni.webp'); background-size: cover; background-position: 100% 60%; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="badge badge-primary float-sm-left mb-3" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-alt-circle-left"></i> Back to admin dashboard</a>
                <br><br><br><br>
                <h1 class="m-0 text-white" style="text-shadow: 4px 4px 6px #838383;"><i class="fas fa-industry"></i> Industries</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb px-3 elevation-1 bg-white float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Industries</li>
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
                        <h3 class="w-100 card-title">Industries ({{ $industries->total() }})</h3>
                        <div class="w-100 d-flex flex-row-reverse" style="gap: 1rem;">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addIndustry" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus"></i> Add industry</button>
                            <!-- <button class="btn btn-outline-success" href="javascript:void(0)" data-click="importExcelFile"><i class="fas fa-file-excel" data-click="importExcelFile"></i> Import from excel</button> -->
                            <!-- <span class="btn btn-outline-success" style="display: none;" data-loading="import"><i class="fas fa-compact-disc fa-spin"></i> Importing...</span> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        @if(!$industries->isEmpty())
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Label</th>
                                                    <th>Slug</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        @endif
                                        <tbody>
                                            @forelse ($industries as $industry)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $industry->label }}</td>
                                                    <td>{{ $industry->slug }}</td>
                                                    <td></td>
                                                </tr>
                                            @empty
                                                <p class="mb-0">No records yet.</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" role="status" aria-live="polite">
                                        Showing {{ $industries->firstItem() }} to {{ $industries->lastItem() }} of {{ number_format($industries->total()) }} entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    {!! $links->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addIndustry" tabindex="-1" role="dialog" aria-labelledby="addIndustryFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIndustryFormTitle"><i class="fas fa-plus"></i> Add industry form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger pl-0 d-none" id="addIndustryAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <form>
                    <!-- Label -->
                    <div class="form-group">
                        <label for="label" class="col-form-label">Label</label>
                        <input type="text" class="form-control" id="label" name="label" placeholder="Type label..." required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-click="addIndustry">Submit</button>
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
            case "addIndustry":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('label', $('#label').val());
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.industries.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added to industries!', 'Industry added');
                        $('#addIndustry').modal('hide');
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

                            if ($('#addIndustryAlert').hasClass("d-none")) {
                                $('#addIndustryAlert').removeClass("d-none");
                            }
                        } else {
                            toastr.error('An unexpected error occurred.', 'Something went wrong...');
                        }
                    }
                });
                break;
        }
    });
</script>
@endsection 