<x-admin.layout>
    <x-slot name="title">Complaint Of Water Quality / पाण्याची गुणवत्ता तक्रार</x-slot>
    <x-slot name="heading">Complaint Of Water Quality / पाण्याची गुणवत्ता तक्रार</x-slot>
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
                            <div class="mb-3 row">

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Name Of the Owner / मालकाचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name" value="{{ $data->property_owner_name }}">
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        @php
                                            $options = ["Prabhag1", "Prabhag2", "Prabhag3", "Prabhag4", "Prabhag5", "Prabhag6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->zone == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        @php
                                            $options = ["firstward"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->ward_area == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot Number / प्लॅाट नं किंवा हिस्सा नं <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot Number" value="{{ $data->plot_no }}">
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" value="{{ $data->house_no }}">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / जवळची खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark" value="{{ $data->landmark }}">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address Of The Property / मिळकतीचा संपुर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address">{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_connection_is_illegal">Currently Existed Tap Connection Unauthorized / मिळकतीस सध्या अस्तित्वात असलेले नळ कनेक्शन अनाधिकृत होते काय ?  <span class="text-danger">*</span></label>
                                    <select class="form-select" name="current_connection_is_illegal" id="current_connection_is_illegal">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->current_connection_is_illegal == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid current_connection_is_illegal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_is_on_rent">Is Applicant a Tenant / अर्जदार भाडेकरू आहे ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="applicant_is_on_rent" id="applicant_is_on_rent">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->applicant_is_on_rent == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid applicant_is_on_rent_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="criminal_judicial_issue">Criminal Judicial Issues About Existing Tap Connection / मिळकतीस सध्या असलेल्या नळ कनेक्शनाबाबत काही फौजदारी किंवा न्यायालयीन बाबी सुरु आहेत का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="criminal_judicial_issue" id="criminal_judicial_issue">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->criminal_judicial_issue == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid criminal_judicial_issue_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tap_size">Tap Size / नळ आकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="tap_size" id="tap_size">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["15mm", "20mm", "25mm", "40mm", "50mm", "80mm", "100mm", "150mm", "300mm"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->tap_size == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid tap_size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_existing_tap_type">Currently Existing Tap Connection Detail / मिळकतीस सध्या अस्तित्वात असलेल्या नळ कनेक्शनचा तपशील <span class="text-danger">*</span></label>
                                    <select class="form-select" name="current_existing_tap_type" id="current_existing_tap_type">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["बांधकाम", "औद्योगीक", "निवासी", "विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)", "व्यावसायिक"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->current_existing_tap_type == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid current_existing_tap_type_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="place_belongs_to_municipal" id="place_belongs_to_municipal">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->place_belongs_to_municipal == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid place_belongs_to_municipal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="comment">Comment / टिप्पणी</label>
                                    <input class="form-control" id="comment" name="comment" type="text" placeholder="Enter Comment " value="{{ $data->comment }}">
                                    <span class="text-danger is-invalid comment_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            "All information provided above is correct and I shall be fully responsible for any discrepancy. / वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन."
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
        var updateUrl = '{{ route("water-quality-complaint.update", $data->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("water-quality-complaint.create") }}';
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

