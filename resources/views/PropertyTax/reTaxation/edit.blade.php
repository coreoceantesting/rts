<x-admin.layout>
    <x-slot name="title">Re-taxation(पुनः कर आकारणी)</x-slot>
    <x-slot name="heading">Re-taxation(पुनः कर आकारणी)</x-slot>

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
                                <input type="hidden" name="id" id="editId" value="{{ $retax->applicant_name }}">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $retax->applicant_name }}">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address">{{ $retax->applicant_full_address }}</textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" type="number" oninput="this.value = this.value.replace(/\D/g, '')" placeholder="Enter Mobile Number" value="{{ $retax->applicant_mobile_no }}">
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $retax->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" oninput="this.value = this.value.replace(/\D/g, '')" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $retax->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        <option {{ ($retax->zone == "1") ? 'selected': '' }} value="1">Prabhag1</option>
                                        <option {{ ($retax->zone == "2") ? 'selected': '' }} value="2">Prabhag2</option>
                                        <option {{ ($retax->zone == "3") ? 'selected': '' }} value="3">Prabhag3</option>
                                        <option {{ ($retax->zone == "4") ? 'selected': '' }} value="4">Prabhag4</option>
                                        <option {{ ($retax->zone == "5") ? 'selected': '' }} value="5">Prabhag5</option>
                                        <option {{ ($retax->zone == "6") ? 'selected': '' }} value="6">Prabhag6</option>
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option {{ ($retax->ward_area == "1") ? 'selected': '' }} value="1">firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्तेच्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" value="{{ $retax->property_owner_name }}" type="text" placeholder="Enter Property Owner Name">
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address">{{ $retax->property_address }}</textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" value="{{ $retax->property_no }}">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="index_number">Index Number / निर्देशांक क्रमांक (घर)</label>
                                    <input class="form-control" id="index_number" name="index_number" type="text" placeholder="Enter Index Number" value="{{ $retax->index_number }}">
                                    <span class="text-danger is-invalid index_number_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" value="{{ $retax->house_no }}">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_usage">Property Usage / मालमत्ता वापर<span class="text-danger">*</span></label>
                                    <select class="form-select" name="property_usage" id="property_usage">
                                        <option value="">Select Property Usage</option>
                                        <option {{ ($retax->property_usage == "निवासी") ? 'selected' : '' }} value="निवासी">निवासी</option>
                                        <option {{ ($retax->property_usage == "बिगर") ? 'selected' : '' }} value="बिगर निवासी">बिगर निवासी</option>
                                        <option {{ ($retax->property_usage == "मिश्र") ? 'selected' : '' }} value="मिश्र">मिश्र</option>
                                    </select>
                                    <span class="text-danger is-invalid property_usage_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="construction_type">Construction Type / बांधकाम प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-select" name="construction_type" id="construction_type">
                                        <option value="">Select Construction Type</option>
                                        <option {{ ($retax->construction_type == "सिमेंट कॉँक्रिट संरचना") ? 'selected' : '' }} value="सिमेंट कॉँक्रिट संरचना">सिमेंट कॉँक्रिट संरचना</option>
                                        <option {{ ($retax->construction_type == "सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत") ? 'selected' : '' }} value="सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत">सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत</option>
                                        <option {{ ($retax->construction_type == "सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत") ? 'selected' : '' }} value="सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत">सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत</option>
                                        <option {{ ($retax->construction_type == "मातीच्या भिंतीवर टीन / कवेलु चे छत") ? 'selected' : '' }} value="मातीच्या भिंतीवर टीन / कवेलु चे छत">मातीच्या भिंतीवर टीन / कवेलु चे छत</option>
                                        <option {{ ($retax->construction_type == "खुला भूखंड") ? 'selected' : '' }} value="खुला भूखंड">खुला भूखंड</option>
                                        <option {{ ($retax->construction_type == "इतर") ? 'selected' : '' }} value="इतर">इतर</option>
                                    </select>
                                    <span class="text-danger is-invalid construction_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_construction_authorized">Is Construction Authorized ? / बांधकाम अधिकृत आहे का ?</label>
                                    <select class="form-select" name="is_construction_authorized" id="is_construction_authorized">
                                        <option value="">Select Option</option>
                                        <option {{ ($retax->is_construction_authorized == "Yes") ? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ ($retax->is_construction_authorized == "No") ? 'selected' : '' }} value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_construction_authorized_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_there_water_connection">Is there a Water(Tap) Connection ? / पाणी (नळ) कनेक्शन आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_there_water_connection" id="is_there_water_connection">
                                        <option value="">Select Option</option>
                                        <option {{ ($retax->is_there_water_connection == "Yes") ? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ ($retax->is_there_water_connection == "No") ? 'selected' : '' }} value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_there_water_connection_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_area">Property Area / मालमत्ता क्षेत्रफळ<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_area" name="property_area" type="text" placeholder="Enter Property Area" value="{{ $retax->property_area }}">
                                    <span class="text-danger is-invalid property_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="reason_for_reassessment">Reason for re Assessment / पुनर्मूल्यांकनाचे कारण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="reason_for_reassessment" name="reason_for_reassessment" type="text" placeholder="Enter Reason" value="{{ $retax->reason_for_reassessment }}">
                                    <span class="text-danger is-invalid reason_for_reassessment_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="date_of_commencement">Date of Commencement of Use of Building / इमारतीचा वापर सुरू झाल्याची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_commencement" name="date_of_commencement" type="date" value="{{ $retax->date_of_commencement }}">
                                    <span class="text-danger is-invalid date_of_commencement_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    @if($retax->uploaded_application)
                                    <a href="{{ asset('storage/'.$retax->uploaded_application) }}">View File</a>
                                    @endif
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file">
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>
                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
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
        var url = "{{ route('retaxation.update', ":model_id") }}";
        $.ajax({
            url: url.replace(':model_id', model_id),
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
            }
        });

    });
</script>

