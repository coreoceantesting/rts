<x-admin.layout>
    <x-slot name="title">New Taxation / नव्याने कर आकारणी</x-slot>
    <x-slot name="heading">New Taxation / नव्याने कर आकारणी</x-slot>

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
                                <input type="hidden" name="id" value="{{ $newTax->id }}" id="editId">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upic_id">UPIC No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upic_id" name="upic_id" type="text" placeholder="Enter UPIC No" value="{{ $newTax->upic_id }}" required>
                                    <span class="text-danger is-invalid upic_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" value="{{ $newTax->applicant_full_name }}" type="text" placeholder="Enter Applicant Full Name">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address">{{ $newTax->applicant_full_address }}</textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="owner_name">Owner Name / मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="owner_name" name="owner_name" type="text" placeholder="Enter Owner Name" value="{{ $newTax->owner_name }}">
                                    <span class="text-danger is-invalid owner_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" value="{{ $newTax->applicant_mobile_no }}" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $newTax->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="text" placeholder="Enter Aadhar Card No" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" value="{{ $newTax->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address">{{ $newTax->property_address }}</textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" value="{{ $newTax->property_no }}">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="survey_number">Property Survey No / सर्व्हे क्र.</label>
                                    <input class="form-control" id="survey_number" name="survey_number" type="text" placeholder="Enter Survey Number" value="{{ $newTax->survey_number }}">
                                    <span class="text-danger is-invalid survey_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        @foreach($wards as $ward)
                                        <option {{ ($newTax->zone == $ward->name) ? 'selected' : '' }} value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        @foreach($wards as $ward)
                                        <option {{ ($newTax->ward_area == $ward->name) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_usage">Property Usage / मालमत्ता वापर<span class="text-danger">*</span></label>
                                    <select class="form-select" name="property_usage" id="property_usage">
                                        <option value="">Select Property Usage</option>
                                        @php
                                            $options = ["निवासी", "बिगर निवासी", "मिश्र"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($newTax->property_usage == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid property_usage_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="construction_type">Construction Type / बांधकाम प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-select" name="construction_type" id="construction_type">
                                        <option value="">Select Construction Type</option>
                                        @php
                                            $options = ["सिमेंट कॉँक्रिट संरचना", "सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत", "सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत", "मातीच्या भिंतीवर टीन / कवेलु चे छत", "खुला भूखंड", "इतर"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($newTax->construction_type == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid construction_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_construction_authorized">Is Construction Authorized ? / बांधकाम अधिकृत आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_construction_authorized" id="is_construction_authorized">
                                        <option value="">Select Option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($newTax->is_construction_authorized == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid is_construction_authorized_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_there_water_connection">Is there a Water(Tap) Connection ? / पाणी (नळ) कनेक्शन आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_there_water_connection" id="is_there_water_connection">
                                        <option value="">Select Option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($newTax->is_there_water_connection == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid is_there_water_connection_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_area">Property Area / मालमत्ता क्षेत्रफळ<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_area" name="property_area" type="text" placeholder="Enter Property Area" value="{{ $newTax->property_area }}">
                                    <span class="text-danger is-invalid property_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    @if($newTax->uploaded_application)
                                    <a href="{{ asset('storage/'.$newTax->uploaded_application) }}">View File</a>
                                    @endif
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file">
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="certificate_of_no_duess">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    @if($newTax->certificate_of_no_dues)
                                    <a href="{{ asset('storage/'.$newTax->certificate_of_no_dues) }}">View File</a>
                                    @endif
                                    <input class="form-control" id="certificate_of_no_duess" name="certificate_of_no_duess" type="file">
                                    <span class="text-danger is-invalid certificate_of_no_duess_err"></span>
                                </div>



                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes">
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन.
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
        formdata.append('_method', 'PUT');
        var model_id = $('#editId').val();
        var url = "{{ route('new-taxation.update', ":model_id") }}";
        $.ajax({
            url: url.replace(':model_id', model_id),
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
                            window.location.href = '{{ route("my-application") }}';
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

