<x-admin.layout>
    <x-slot name="title">Road Cutting Permission / रस्ते खोदणे परवानगी </x-slot>
    <x-slot name="heading">Road Cutting Permission / रस्ते खोदणे परवानगी </x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Road Cutting Permission / रस्ते खोदणे परवानगी </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="applicant_type">Applicant Type ( Indivisual/Company) / अर्ज प्रकार (वैयक्तिक / कंपनी) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_type" name="applicant_type" type="text" placeholder="Enter Applicant Area" value="{{ $data->applicant_type }}">
                                    <span class="text-danger is-invalid applicant_type_err"></span>
                                </div>

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
                                    <label class="col-form-label" for="ward">Ward Area / प्रभाग क्षेत्र <span class="text-danger">*</span></label>
                                    <select name="ward" id="ward" class="form-select">
                                        <option value="">Select Ward</option>
                                        <option value="Ward1" {{ $data->ward == "Ward1" ? 'selected' : '' }}>Ward1</option>
                                        <option value="Ward2" {{ $data->ward == "Ward2" ? 'selected' : '' }}>Ward2</option>
                                        <option value="Ward3" {{ $data->ward == "Ward3" ? 'selected' : '' }}>Ward3</option>
                                        <option value="Ward4" {{ $data->ward == "Ward4" ? 'selected' : '' }}>Ward4</option>
                                        <option value="Ward5" {{ $data->ward == "Ward5" ? 'selected' : '' }}>Ward5</option>
                                        <option value="Ward6" {{ $data->ward == "Ward6" ? 'selected' : '' }}>Ward6</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="company_name">Name of Company / कंपनीचे नाव</label>
                                    <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name" value="{{ $data->company_name }}">
                                    <span class="text-danger is-invalid company_name_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="designation">Designation / पद</label>
                                    <input class="form-control" id="designation" name="designation" type="text" placeholder="Enter Designation" value="{{ $data->designation }}">
                                    <span class="text-danger is-invalid designation_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नं.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="road_cutting_purpose">Purpose of Road Cutting / रस्ता खोदण्याचे कारण <span class="text-danger">*</span></label>
                                    <input class="form-control" id="road_cutting_purpose" name="road_cutting_purpose" type="text" placeholder="Enter Purpose of Road Cutting" value="{{ $data->road_cutting_purpose }}">
                                    <span class="text-danger is-invalid road_cutting_purpose_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="road_length">Length of the road to be cut (Mtr) / खोदण्यात येणाऱ्या रस्त्याची लांबी (मी.) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="road_length" name="road_length" type="number" placeholder="Enter road length" value="{{ $data->road_length }}">
                                    <span class="text-danger is-invalid road_length_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="no_of_location">Number of Locations / ठिकाणांची संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_location" name="no_of_location" type="number" placeholder="Enter Number of Locations" value="{{ $data->no_of_location }}">
                                    <span class="text-danger is-invalid no_of_location_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="road_cutting_address">Address of the Road for cutting / रस्ता खोदण्याच्या ठिकाणाचा पत्ता <span class="text-danger">*</span></label>
                                    <input class="form-control" id="road_cutting_address" name="road_cutting_address" type="text" placeholder="Enter road cutting address " value="{{ $data->road_cutting_address }}">
                                    <span class="text-danger is-invalid road_cutting_address_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="location_size">Size in MM for each location / आकार (मी.मी) मध्ये <span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_size" name="location_size" type="number" placeholder="Enter Size in MM for each location" value="{{ $data->location_size }}">
                                    <span class="text-danger is-invalid location_size_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_prescribed_format">Upload Application in Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_prescribed_format" name="upload_prescribed_formats" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_prescribed_format) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_prescribed_format_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_no_dues_certificate">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_no_dues_certificate" name="upload_no_dues_certificates" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_no_dues_certificate) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_no_dues_certificate_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_gov_instructed_doc">Upload Govt . Instructed Documents / शासनाद्वारे विहित केलीली कागदपत्रे <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_gov_instructed_doc" name="upload_gov_instructed_docs" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_gov_instructed_doc) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_gov_instructed_doc_err"></span>
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
        var updateUrl = '{{ route("construction-road-cutting.update", $data->id) }}';
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
                            window.location.href = '{{ route("construction-road-cutting.create") }}';
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

