<x-admin.layout>
    <x-slot name="title">Issuance of hawker registration certificate/ फेरीवाले नोंदणी प्रमाणपत्र देणे</x-slot>
    <x-slot name="heading">Issuance of hawker registration certificate/ फेरीवाले नोंदणी प्रमाणपत्र देणे</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="card-title">Edit Details</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-4 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" >
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option @if ($hawkerRegister->zone == $zone->name) selected @endif value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="service_type">Service Id<span class="text-danger">*</span></label>
                                <select name="service_type" id="service_type" class="form-select" >
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="Service 1"{{ $hawkerRegister->service_type == 'Service 1' ? 'selected' : '' }}>Service 1</option>
                                    <option value="Service 2"{{ $hawkerRegister->service_type == 'Service 2' ? 'selected' : '' }}>Service 2</option>
                                    <option value="Service 3"{{ $hawkerRegister->service_type == 'Service 3' ? 'selected' : '' }}>Service 3 </option>
                                </select>
                                <span class="text-danger is-invalid service_type_err"></span>

                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="licenses_no">License No<span class="text-danger">*</span></label>
                                <input class="form-control" id="licenses_no" name="licenses_no" type="text" placeholder="Enter License No" value="{{ $hawkerRegister->licenses_no }}" >
                                <span class="text-danger is-invalid licenses_no_err"></span>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button class="btn btn-primary w-100">Search</button>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" value="{{ $hawkerRegister->f_name }}" >
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" value="{{ $hawkerRegister->m_name }}" >
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" value="{{ $hawkerRegister->l_name }}" >
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ $hawkerRegister->mobile_num }}">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" value="{{ $hawkerRegister->email }}" >
                                <span class="text-danger is-invalid email_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number" value="{{ $hawkerRegister->aadhar_num }}">
                                <span class="text-danger is-invalid aadhar_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="property_num">Property Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="property_num" name="property_num" type="number" placeholder="Enter Property Number" value="{{ $hawkerRegister->property_num }}">
                                <span class="text-danger is-invalid property_num_err"></span>
                            </div>

                            <div class="col-md-5">
                                <label class="col-form-label" for="address">Residential Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Address" >{{ $hawkerRegister->address }}</textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="bussiness_type">Bussiness Type<span class="text-danger">*</span></label>
                                <input class="form-control" id="bussiness_type" name="bussiness_type" type="text" placeholder="Enter Bussiness Type" value="{{ $hawkerRegister->bussiness_type }}">
                                <span class="text-danger is-invalid bussiness_type_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="bussiness_name">Bussiness Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="bussiness_name" name="bussiness_name" type="text" placeholder="Enter Bussiness Name" value="{{ $hawkerRegister->bussiness_name }}">
                                <span class="text-danger is-invalid bussiness_name_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="from_date" name="from_date" type="date" placeholder="select Date"    value="{{ old('from_date', isset($hawkerRegister) ? \Carbon\Carbon::parse($hawkerRegister->from_date)->format('Y-m-d') : '') }}">
                                <span class="text-danger is-invalid from_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="to_date" name="to_date" type="date" placeholder="select Date" value="{{ old('to_date', isset($hawkerRegister) ? \Carbon\Carbon::parse($hawkerRegister->to_date)->format('Y-m-d') : '') }}">
                                <span class="text-danger is-invalid to_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="reason">Reason<span class="text-danger">*</span></label>
                                <input class="form-control" id="reason" name="reason" type="text" placeholder="Enter Reason" value="{{ $hawkerRegister->reason }}" >
                                <span class="text-danger is-invalid reason_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="images">Document<span class="text-danger">*</span></label>

                                <!-- File Input -->
                                <input class="form-control" id="images" name="images" type="file">

                                <!-- Show Existing File -->
                                @if(isset($hawkerRegister) && $hawkerRegister->image)
                                    <p class="mt-2">
                                        <a href="{{ asset('storage/' . $hawkerRegister->image) }}" target="_blank">
                                            View Current Document
                                        </a>
                                    </p>
                                @endif

                                <span class="text-danger is-invalid images_err"></span>
                            </div>


                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes" >
                                    <label class="form-check-label ms-2" for="is_correct_info">
                                        "All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार
                                        असेन."
                                    </label>
                                </div>
                                <span class="text-danger is-invalid is_correct_info_err"></span>
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

</x-admin.layout>




{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);


        var formdata = new FormData(this);
        var updateUrl = '{{ route('hawker-register.update', $hawkerRegister->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('my-application') }}';
                    });
                else
                    swal("Error!", data.error, "error");
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
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
