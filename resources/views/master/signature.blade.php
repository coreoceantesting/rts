<x-admin.layout>
    <x-slot name="title">Signature </x-slot>
    <x-slot name="heading">Signature</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="card-title">Add Signature</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for=" ">Service Name<span class="text-danger">*</span></label>
                                <select class="form-select" id="add_service_name" name="service_name_id" required>
                                    <option value="" selected disabled>Select Service Name</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_id }} - {{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="service_image" name="image" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="button" class="btn btn-primary" id="viewImageButton" style="display: none;" onclick="openImageModal()">View Image</button>
                            </div>

                            <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Uploaded Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img id="image_preview" src="" alt="Preview Image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- Edit Form --}}
    <div class="row" id="editContainer" style="display:none;">
        <div class="col">
            <form class="form-horizontal form-bordered" method="post" id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Signature</h4>
                    </div>
                    <div class="card-body py-2">
                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="service_name_id">Service Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="add_service_name" name="service_name_id" type="text" placeholder="Enter Service Id" readonly disabled>
                                <span class="text-danger is-invalid initial_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            @if(isset($signatur) && $signatur->image)
                            <p class="mt-2">
                                <a href="{{ asset('storage/' . $signatur->image) }}" target="_blank">
                                    View Current Document
                                </a>
                            </p>
                        @endif
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="button" class="btn btn-primary" id="viewImageButton" style="display: none;" onclick="openImageModal()">View Image</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="editSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Service Name</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($signature as $signatur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $signatur->service?->service_id }} - {{ $signatur->service?->service_name }}</td>
                                        <td>
                                            @if ($signatur->image)
                                                <a href="{{ asset('storage/' . $signatur->image) }}" target="_blank" class="btn btn-primary btn-sm">View Image</a>
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        {{-- <td>{{ $signatur->image }}</td> --}}


                                        <td>

                                            <button class="edit-element btn text-secondary px-2 py-1" title="Edit district" data-id="{{ $signatur->id }}"><i data-feather="edit"></i></button>

                                            <button class="btn text-danger rem-element px-2 py-1" title="Delete district" data-id="{{ $signatur->id }}"><i data-feather="trash-2"></i> </button>

                                        </td>

                                    </tr>
                                @endforeach
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('signature.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('signature.index') }}';
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });

    function previewImage(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById("image_preview");
        const viewButton = document.getElementById("viewImageButton");

        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
                viewButton.style.display = "inline-block"; // Show the "View Image" button
            };
            reader.readAsDataURL(file);
        } else {
            viewButton.style.display = "none"; // Hide the button if no file is selected
        }
    }

    // Open modal when clicking "View Image" button
    function openImageModal() {
        const imagePreview = document.getElementById("image_preview").src;
        if (!imagePreview) {
            alert("Please upload an image first!");
            return;
        }
        new bootstrap.Modal(document.getElementById("imagePreviewModal")).show();
    }
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('signature.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                if (!data.error) {
                    $("#editForm input[name='edit_model_id']").val(data.signatur.id);
                    $("#editForm input[name='service_name_id']").val(data.signatur.service_name_id ? data.signatur.service.service_name : 'N/A');
                    $("#editForm input[name='image']").val(data.signatur.image);
                } else {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
    // console.log($("#edit_model_id").val());
</script>


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('signature.update', ':model_id') }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('signature.index') }}';
                        });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });

    function previewImage(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById("image_preview");
        const viewButton = document.getElementById("viewImageButton");

        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
                viewButton.style.display = "inline-block"; // Show the "View Image" button
            };
            reader.readAsDataURL(file);
        } else {
            viewButton.style.display = "none"; // Hide the button if no file is selected
        }
    }

    // Open modal when clicking "View Image" button
    function openImageModal() {
        const imagePreview = document.getElementById("image_preview").src;
        if (!imagePreview) {
            alert("Please upload an image first!");
            return;
        }
        new bootstrap.Modal(document.getElementById("imagePreviewModal")).show();
    }
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure to delete this signature?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('signature.destroy', ':model_id') }}";

                    $.ajax({
                        url: url.replace(':model_id', model_id),
                        type: 'POST',
                        data: {
                            '_method': "DELETE",
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (!data.error && !data.error2) {
                                swal("Success!", data.success, "success")
                                    .then((action) => {
                                        window.location.reload();
                                    });
                            } else {
                                if (data.error) {
                                    swal("Error!", data.error, "error");
                                } else {
                                    swal("Error!", data.error2, "error");
                                }
                            }
                        },
                        error: function(error, jqXHR, textStatus, errorThrown) {
                            swal("Error!", "Something went wrong", "error");
                        },
                    });
                }
            });
    });


    function previewImage(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById("image_preview");
        const viewButton = document.getElementById("viewImageButton");

        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
                viewButton.style.display = "inline-block"; // Show the "View Image" button
            };
            reader.readAsDataURL(file);
        } else {
            viewButton.style.display = "none"; // Hide the button if no file is selected
        }
    }

    // Open modal when clicking "View Image" button
    function openImageModal() {
        const imagePreview = document.getElementById("image_preview").src;
        if (!imagePreview) {
            alert("Please upload an image first!");
            return;
        }
        new bootstrap.Modal(document.getElementById("imagePreviewModal")).show();
    }
</script>
