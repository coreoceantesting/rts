<x-admin.layout>
    <x-slot name="title">Issuance of zone certificate / झोन दाखला देणे</x-slot>
    <x-slot name="heading">Issuance of zone certificate / झोन दाखला देणे</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Issuance of zone certificate / झोन दाखला देणे</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="applicant_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $data->applicant_name }}">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address">{{ $data->applicant_full_address }}</textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नं.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="zone">Zone <span class="text-danger">*</span></label>
                                    <select name="zone" id="zone" class="form-select">
                                        <option value="">Select Zone</option>
                                        <option value="Prabhag1" {{ $data->zone == "Prabhag1" ? 'selected' : '' }}>Prabhag1</option>
                                        <option value="Prabhag2" {{ $data->zone == "Prabhag2" ? 'selected' : '' }}>Prabhag2</option>
                                        <option value="Prabhag3" {{ $data->zone == "Prabhag3" ? 'selected' : '' }}>Prabhag3</option>
                                        <option value="Prabhag4" {{ $data->zone == "Prabhag4" ? 'selected' : '' }}>Prabhag4</option>
                                        <option value="Prabhag5" {{ $data->zone == "Prabhag5" ? 'selected' : '' }}>Prabhag5</option>
                                        <option value="Prabhag6" {{ $data->zone == "Prabhag6" ? 'selected' : '' }}>Prabhag6</option>
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="servey_number">City Servey Number / सिटी सर्व्हे नंबर <span class="text-danger">*</span></label>
                                    <input class="form-control" id="servey_number" name="servey_number" type="number" placeholder="Enter City Servey Number" value="{{ $data->servey_number }}">
                                    <span class="text-danger is-invalid servey_number_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="prescribed_format">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="prescribed_format" name="prescribed_formats" type="file" >
                                    <small><a href="{{ asset('storage/' . $data->prescribed_format) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid prescribed_format_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_city_survey_certificate">Upload 7/12 Utara or City Servey Utara / अपलोड ७/१२ उतारा किंवा सिटी सर्व्हे नकाशा उतारा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_city_survey_certificate" name="upload_city_survey_certificates" type="file" >
                                    <small><a href="{{ asset('storage/' . $data->upload_city_survey_certificate) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_city_survey_certificate_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_city_servey_map">Calculation map or City Servey Map / मोजणी नकाशा किंवा सिटी सर्व्हे नकाशा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_city_servey_map" name="upload_city_servey_maps" type="file" >
                                    <small><a href="{{ asset('storage/' . $data->upload_city_servey_map) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_city_servey_map_err"></span>
                                </div>


                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र  <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            All information provided above is correct and I shall be fully responsible for any discrepancy.<br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन.
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
        var updateUrl = '{{ route("town-planing-zone-certificate.update", $data->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("town-planing-zone-certificate.create") }}';
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

