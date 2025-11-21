@extends('layouts.admin')

@section('title')
    Announcements &sdot;
@endsection

@section('main-content-header')
<div class="content-header" style="background-image: url('{{ config('r2.endpoint') }}/images/backgrounds/bg-alumni.webp'); background-size: cover; background-position: 100% 60%; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="badge badge-primary float-sm-left mb-3" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-alt-circle-left"></i> Back to admin dashboard</a>
                <br><br><br><br>
                <h1 class="m-0 text-white" style="text-shadow: 4px 4px 6px #838383;"><i class="fas fa-announcement"></i> Announcements</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb px-3 elevation-1 bg-white float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Announcements</li>
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
                        <h3 class="w-100 card-title">Announcements ({{ $announcements->total() }})</h3>
                        <div class="w-100 d-flex flex-row-reverse" style="gap: 1rem;">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addAnnouncement" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus"></i> Add announcement</button>
                            <!-- <button class="btn btn-outline-success" href="javascript:void(0)" data-click="importExcelFile"><i class="fas fa-file-excel" data-click="importExcelFile"></i> Import from excel</button> -->
                            <!-- <span class="btn btn-outline-success" style="display: none;" data-loading="import"><i class="fas fa-compact-disc fa-spin"></i> Importing...</span> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        @if(!$announcements->isEmpty())
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    <th>Published at</th>
                                                    <th>Active</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        @endif
                                        <tbody>
                                            @forelse ($announcements as $announcement)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if($announcement->cover)
                                                            <img src="{{ config('r2.endpoint') . ($announcement->cover ?? '/images/announcements/default-cover.png') }}" alt="{{ $announcement->title }}-cover" class="img-circle img-size-32 mr-2">
                                                        @endif
                                                        {{ $announcement->title }}
                                                    </td>
                                                    <td>{{ $announcement->content }}</td>
                                                    <td>
                                                        <span class="badge badge-secondary">{{ $announcement->published_at ?? 'No expiration' }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                id="is_active_{{ $announcement->id }}"
                                                                name="is_active_{{ $announcement->id }}"
                                                                data-id="{{ $announcement->id }}"
                                                                {{ $announcement->is_active === 1 ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="is_active_{{ $announcement->id }}"
                                                                    {{ $announcement->is_active === 1 ? 'Active' : 'Inactive' }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                        Showing {{ $announcements->firstItem() }} to {{ $announcements->lastItem() }} of {{ number_format($announcements->total()) }} entries
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
<div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnnouncementFormTitle"><i class="fas fa-plus"></i> Add announcement form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger pl-0 d-none" id="addAnnouncementAlert">
                    <ul class="mb-0" id="errorList"></ul>
                </div>
                <form id="createAnnouncementForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter announcement title" required>
                        </div>

                        <!-- Content -->
                        <div class="form-group">
                            <label for="content">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter announcement content" required></textarea>
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label for="cover">Upload Image (optional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cover" name="cover" accept="image/*">
                                <label class="custom-file-label" for="cover">Choose file</label>
                            </div>
                            <div class="mt-2" id="imagePreviewContainer" style="display:none;">
                                <img id="imagePreview" src="" alt="Image Preview" class="img-fluid rounded border" style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- Publish Date -->
                        <div class="form-group">
                            <label for="published_at">Publish Date (optional)</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at">
                        </div>

                        <!-- Active Toggle -->
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                <label class="custom-control-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-click="addAnnouncement">Submit</button>
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

    $('#cover').on('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            // Show file name on label
            $(this).next('.custom-file-label').text(file.name);

            // Generate image preview
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
            };
            reader.readAsDataURL(file);
        } else {
            // Reset if no file
            $(this).next('.custom-file-label').text('Choose file');
            $('#imagePreviewContainer').hide();
            $('#imagePreview').attr('src', '');
        }
    });

    document.addEventListener("click", (e) => {
        e = e || window.event;
        var target = e.target || e.srcElement;
        switch(target.dataset.click) {
            case "addAnnouncement":
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('title', $('#title').val());
                formData.append('content', $('#content').val());
                const image = $('#image').val();
                if (image) {
                    formData.append('image', $('#image')[0].files[0]);
                }
                const publishedAt = $('#published_at').val();
                if (publishedAt) {
                    formData.append('published_at', publishedAt);
                }
                const isActive = $('#is_active').is(':checked') ? 1 : 0;
                formData.append('is_active', isActive);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.announcements.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) =>  {
                        toastr.success('Successfully added to announcements!', 'Announcement added');
                        $('#addAnnouncement').modal('hide');
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

                            if ($('#addAnnouncementAlert').hasClass("d-none")) {
                                $('#addAnnouncementAlert').removeClass("d-none");
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