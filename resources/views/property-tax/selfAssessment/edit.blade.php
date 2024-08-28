<x-admin.layout>
    <x-slot name="title">Self Assessment / स्वयंमुल्यांकन</x-slot>
    <x-slot name="heading">Self Assessment / स्वयंमुल्यांकन</x-slot>

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
                                <input type="hidden" value="{{ $selfAssessment->id }}" name="id" id="editId">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upic_id">UPIC No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upic_id" name="upic_id" type="text" placeholder="Enter UPIC No" value="{{ $selfAssessment->upic_id }}" required>
                                    <span class="text-danger is-invalid upic_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" value="{{ $selfAssessment->applicant_full_name }}" required>
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address" value="{{ $selfAssessment->applicant_full_address }}" required></textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" value="{{ $selfAssessment->applicant_mobile_no }}" required oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $selfAssessment->email_id }}" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Applicant Aadhar No / अर्जदाराचा आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" type="text" placeholder="Enter Aadhar Card No" value="{{ $selfAssessment->aadhar_no }}" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्तेच्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name" value="{{ $selfAssessment->property_owner_name }}" required>
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address" required>{{ $selfAssessment->property_address }}</textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="city_serve_number">City Serve Number / शहर सेवा क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_serve_number" name="city_serve_number" type="text" placeholder="City Serve Number" value="{{ $selfAssessment->city_serve_number }}" required>
                                    <span class="text-danger is-invalid city_serve_number_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" value="{{ $selfAssessment->property_no }}" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="index_number">Index Number / निर्देशांक क्रमांक (घर)</label>
                                    <input class="form-control" id="index_number" name="index_number" type="text" placeholder="Enter Index Number" value="{{ $selfAssessment->index_number }}">
                                    <span class="text-danger is-invalid index_number_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" value="{{ $selfAssessment->house_no }}" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" required name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        
                                        @foreach($zones as $zone)
                                        <option {{ ($selfAssessment->zone == $zone->name) ? 'selected' : '' }} value="{{ $zone->name }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" required name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                       
                                        @foreach($wards as $ward)
                                        <option {{ ($selfAssessment->ward_area == $ward->name) ? 'selected' : '' }} value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_usage">Property Usage / मालमत्ता वापर<span class="text-danger">*</span></label>
                                    <select class="form-select" name="property_usage" required id="property_usage">
                                        <option value="">Select Property Usage</option>
                                        @php
                                            $options = ["निवासी", "बिगर निवासी", "मिश्र"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($selfAssessment->property_usage == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid property_usage_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="construction_type">Construction Type / बांधकाम प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-select" required name="construction_type" id="construction_type">
                                        <option value="">Select Construction Type</option>
                                        <option {{ ($selfAssessment->construction_type == "सिमेंट कॉँक्रिट संरचना") ? 'selected' : '' }} value="सिमेंट कॉँक्रिट संरचना">सिमेंट कॉँक्रिट संरचना</option>
                                        <option {{ ($selfAssessment->construction_type == "सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत") ? 'selected' : '' }} value="सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत">सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत</option>
                                        <option {{ ($selfAssessment->construction_type == "सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत") ? 'selected' : '' }} value="सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत">सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत</option>
                                        <option {{ ($selfAssessment->construction_type == "मातीच्या भिंतीवर टीन / कवेलु चे छत") ? 'selected' : '' }} value="मातीच्या भिंतीवर टीन / कवेलु चे छत">मातीच्या भिंतीवर टीन / कवेलु चे छत</option>
                                        <option {{ ($selfAssessment->construction_type == "खुला भूखंड") ? 'selected' : '' }} value="खुला भूखंड">खुला भूखंड</option>
                                        <option {{ ($selfAssessment->construction_type == "इतर") ? 'selected' : '' }} value="इतर">इतर</option>
                                    </select>
                                    <span class="text-danger is-invalid construction_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_construction_authorized">Is Construction Authorized ? / बांधकाम अधिकृत आहे का ?</label>
                                    <select class="form-select" name="is_construction_authorized" id="is_construction_authorized" required>
                                        <option value="">Select Option</option>
                                        <option {{ ($selfAssessment->is_construction_authorized == "Yes") ? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ ($selfAssessment->is_construction_authorized == "No") ? 'selected' : '' }} value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_construction_authorized_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_there_water_connection">Is there a Water(Tap) Connection ? / पाणी (नळ) कनेक्शन आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_there_water_connection" id="is_there_water_connection" required>
                                        <option value="">Select Option</option>
                                        <option {{ ($selfAssessment->is_there_water_connection == "Yes") ? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ ($selfAssessment->is_there_water_connection == "No") ? 'selected' : '' }} value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_there_water_connection_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_area">Property Area / मालमत्ता क्षेत्रफळ<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_area" name="property_area" type="text" placeholder="Enter Property Area" value="{{ $selfAssessment->property_area }}" required>
                                    <span class="text-danger is-invalid property_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    @if($selfAssessment->uploaded_application)
                                    <a href="{{ asset('storage/'.$selfAssessment->uploaded_application) }}">View File</a>
                                    @endif
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file" required>
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes" required>
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            "All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन."
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
        var url = "{{ route('self-assessment.update', ":model_id") }}";

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
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '';
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
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>

