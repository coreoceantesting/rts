<x-admin.layout>
    <x-slot name="title">Services</x-slot>
    <x-slot name="heading">Services</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <!-- Add Form Start -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" enctype="multipart/form-data" name="addForm" id="addForm">
                    @csrf
                    <div class="card-header pb-0">
                        <h4>Create Service</h4>
                    </div>
                    <div class="card-body pt-0">


                        <div class="mb-3 row">

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="name">Service Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter service name">
                                <span class="text-danger is-invalid name_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="images">Service Image</label>
                                <input class="form-control" id="image" name="images" type="file" />
                                <span class="text-danger is-invalid image_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="is_parent">Is parent <span class="text-danger">*</span></label>
                                <select name="is_parent" class="form-select">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <span class="text-danger is-invalid is_parent_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="is_parent">Select Service</label>
                                <select name="service_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid is_parent_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="background_color">Background color <span class="text-danger">*</span></label>
                                <input class="form-control" id="background_color" name="background_color" type="text" placeholder="Enter background color" required>
                                <span class="text-danger is-invalid background_color_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="route_name">Route name</label>
                                <input class="form-control" id="route_name" name="route_name" type="text" placeholder="Enter route name">
                                <span class="text-danger is-invalid route_name_err"></span>
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
            <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="post" id="editForm">
                @csrf
                <section class="card">
                    <header class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </header>

                    <div class="card-body py-2">

                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                        <div class="mb-3 row">

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="name">Service Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter service name">
                                <span class="text-danger is-invalid name_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="images">Service Image</label>
                                <input class="form-control" id="image" name="images" type="file" />
                                <span class="text-danger is-invalid image_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="is_parent">Is parent <span class="text-danger">*</span></label>
                                <select name="is_parent" class="form-select">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <span class="text-danger is-invalid is_parent_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="is_parent">Select Service <span class="text-danger">*</span></label>
                                <select name="service_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid is_parent_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="background_color">Background color <span class="text-danger">*</span></label>
                                <input class="form-control" id="background_color" name="background_color" type="text" placeholder="Enter background color" required>
                                <span class="text-danger is-invalid background_color_err"></span>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="col-form-label" for="route_name">Route name <span class="text-danger">*</span></label>
                                <input class="form-control" id="route_name" name="route_name" type="text" min="0" placeholder="Enter route name">
                                <span class="text-danger is-invalid route_name_err"></span>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="editSubmit">Update</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </section>
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
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Is parent</th>
                                    <th>Route name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td><img src="{{ asset('storage/'.$service->image) }}" alt="" style="width: 150px;"></td>
                                        <td>
                                            @if($service->is_parent)
                                            <span class="badge bg-success text-white">Yes</span>
                                            @else
                                            <span class="badge bg-danger text-white">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $service->route_name }}
                                        </td>
                                        <td>
                                            <button class="edit-element btn text-primary px-2 py-1" title="Edit service" data-id="{{ $service->id }}"><i data-feather="edit"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
            url: '{{ route('master.service.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('master.service.index') }}';
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
</script>

<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        // $(".edit-element").show();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('master.service.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();

                if (!data.error) {
                    $("#editForm input[name='edit_model_id']").val(data.service.id);
                    $("#editForm input[name='name']").val(data.service.name);
                    $("#editForm select[name='is_parent']").val(data.service.is_parent);
                    $("#editForm select[name='service_id']").val(data.service.service_id);
                    $("#editForm input[name='background_color']").val(data.service.background_color);
                    $("#editForm input[name='route_name']").val(data.service.route_name);
                } else {
                    swal("Error!", data.error, "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Some thing went wrong", "error");
            },
        });
    });
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
            var url = "{{ route('master.service.update', ':model_id') }}";
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
                            window.location.href = '{{ route('master.service.index') }}';
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
</script>


