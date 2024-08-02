<x-admin.layout>
    <x-slot name="title">Fire No Objection Certificate(Fire) / अग्निशमन ना-हरकत दाखला देणे</x-slot>
    <x-slot name="heading">Fire No Objection Certificate(Fire) / अग्निशमन ना-हरकत दाखला देणे</x-slot>

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
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" value="{{ $data->applicant_full_name }}">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="building_type">Building Type / इमारतीचा प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-control" name="building_type" id="building_type">
                                        <option value="">Select Type</option>
                                        @php
                                            $options = ["इमारत", "थिएटर", "दवाखाना", "दुकान", "बंगला", "मॉल"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->building_type == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid building_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="building_name">Building name / इमारतीचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="building_name" id="building_name" placeholder="Enter building name" value="{{ $data->building_name }}">
                                    <span class="text-danger is-invalid building_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Address / पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address">{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone">
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
                                    <select class="form-control" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        @php
                                            $options = ["firstward"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option  {{ $data->ward_area == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="subject">Subject / विषय<span class="text-danger">*</span></label>
                                    <input class="form-control" id="subject" name="subject" type="text" placeholder="Enter Subject" value="{{ $data->subject }}">
                                    <span class="text-danger is-invalid subject_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="uploaded_application">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="uploaded_application" name="uploaded_application" type="file">
                                    <small><a href="{{ asset('storage/' . $data->uploaded_application) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid uploaded_application_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_document" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="architect_application_document">Upload Architect Application / वास्तुविशारद अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="architect_application_document" name="architect_application_document" type="file">
                                    <small><a href="{{ asset('storage/' . $data->architect_application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid architect_application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="fire_prevention_document">Upload Outline Of Fire Prevention Measures / आग प्रतिबंधक उपायांची रूपरेषा अपलोड करा  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="fire_prevention_document" name="fire_prevention_document" type="file">
                                    <small><a href="{{ asset('storage/' . $data->fire_prevention_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid fire_prevention_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="capitation_fee_document">Upload Capitation Fee / कॅपिटेशन फी अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="capitation_fee_document" name="capitation_fee_document" type="file">
                                    <small><a href="{{ asset('storage/' . $data->capitation_fee_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid capitation_fee_document_err"></span>
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
        var updateUrl = '{{ route("fire-no-objection.update", $data->id) }}';
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
                            window.location.href = '{{ route("fire-no-objection.create") }}';
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

