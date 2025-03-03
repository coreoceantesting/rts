<x-admin.layout>
    <x-slot name="title">Granting permission for laying underground telecommunication ducts/भूमिगत दूरसंचार वाहिनी</x-slot>
    <x-slot name="heading">Granting permission for laying underground telecommunication ducts/भूमिगत दूरसंचार वाहिनी</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="card-title">Add Details</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">

                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" >
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" >
                                <span class="text-danger is-invalid m_namee_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" >
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" >
                                <span class="text-danger is-invalid email_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number">
                                <span class="text-danger is-invalid aadhar_numo_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="property_num">Property Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="property_num" name="property_num" type="number" placeholder="Enter Number" >
                                <span class="text-danger is-invalid property_num_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="address">Residential Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Address" ></textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="road_type">रस्त्याचे प्रकार<span class="text-danger">*</span></label>
                                <select class="form-select" name="road_type" id="road_type" >
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="रस्त्याचे प्रकार १">रस्त्याचे प्रकार १</option>
                                    <option value="रस्त्याचे प्रकार २">रस्त्याचे प्रकार २</option>
                                    <option value="रस्त्याचे प्रकार ३">रस्त्याचे प्रकार ३</option>
                                </select>
                                <span class="text-danger is-invalid road_type_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" >
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="length_road">रस्त्याची लांबी (मीटर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="length_road" name="length_road" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Length">
                                <span class="text-danger is-invalid length_road_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="width_road">रस्त्याची रुंदी (मीटर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="width_road" name="width_road" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Width">
                                <span class="text-danger is-invalid width_roadd_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="length_width">रस्त्याची लांबीरुंदी (चो. मीटर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="length_width" name="length_width" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Length & Width">
                                <span class="text-danger is-invalid length_width_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="digging_size">खोदण्याचे आकार (मीटर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="digging_size" name="digging_size" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Digging size">
                                <span class="text-danger is-invalid digging_sizee_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="start_point">खोदाईचा प्रारंभिक बिंदु <span class="text-danger">*</span></label>
                                <input class="form-control" id="start_point" name="start_point" type="text" placeholder="Enter Starting Point">
                                <span class="text-danger is-invalid start_point_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="end_point">खोदाईचा अंतिम बिंदूः <span class="text-danger">*</span></label>
                                <input class="form-control" id="end_point" name="end_point" type="text"  placeholder="Enter Ending Point">
                                <span class="text-danger is-invalid end_point_err"></span>
                            </div>


                            <div class="col-md-3">
                                <label class="col-form-label" for="latitude">अक्षांश<span class="text-danger">*</span></label>
                                <input class="form-control" id="latitude" name="latitude" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter latitude">
                                <span class="text-danger is-invalid latitude_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="longitude">रेखांश<span class="text-danger">*</span></label>
                                <input class="form-control" id="longitude" name="longitude" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter longitude">
                                <span class="text-danger is-invalid longitude_err"></span>
                            </div>


                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" >
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
        $.ajax({
            url: '{{ route('grant-telecome.store') }}',
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
