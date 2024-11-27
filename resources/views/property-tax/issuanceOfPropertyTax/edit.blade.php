<x-admin.layout>
    <x-slot name="title">Issuance Of Property Tax Assessment Copy / मालमत्ता कर उतारा देणे</x-slot>
    <x-slot name="heading">Issuance Of Property Tax Assessment Copy / मालमत्ता कर उतारा देणे</x-slot>



        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="editForm" id="editForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <input type="hidden" name="id" value="{{ $propertyTaxAssessment->id }}" id="editId">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upic_id">UPIC No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upic_id" name="upic_id" type="text" placeholder="PNVL000045" value="{{ $propertyTaxAssessment->upic_id }}" required>
                                    <span class="text-danger is-invalid upic_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $propertyTaxAssessment->applicant_name }}" required>
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address" required>{{ $propertyTaxAssessment->applicant_full_address }}</textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ $propertyTaxAssessment->applicant_mobile_no }}" required>
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $propertyTaxAssessment->email_id }}" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" name="aadhar_no" type="text" placeholder="Enter Aadhar Card No" value="{{ $propertyTaxAssessment->aadhar_no }}" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्तेच्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name" value="{{ $propertyTaxAssessment->property_owner_name }}" required>
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="index_number">Index Number / निर्देशांक क्रमांक (घर)</label>
                                    <input class="form-control" id="index_number" name="index_number" type="text" placeholder="Enter Index Number" value="{{ $propertyTaxAssessment->index_number }}">
                                    <span class="text-danger is-invalid index_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" value="{{ $propertyTaxAssessment->property_no }}" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address" required>{{ $propertyTaxAssessment->property_address }}</textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="assessment_for_year">Assessment For Year / वर्षासाठी मूल्यांकन <span class="text-danger">*</span></label>
                                    <input class="form-control" id="assessment_for_year" name="assessment_for_year" oninput="this.value = this.value.replace(/\D/g, '')" type="number" placeholder="Enter Year" value="{{ $propertyTaxAssessment->assessment_for_year }}" required>
                                    <span class="text-danger is-invalid assessment_for_year_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone" required>
                                        <option value="">Select Zone</option>

                                        @foreach($zones as $zone)
                                        <option {{ ($propertyTaxAssessment->zone == $zone->name) ? 'selected' : '' }} value="{{ $zone->name }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>

                                        @php
                                            $options = ["firstward"];
                                        @endphp

                                        @foreach($wards as $ward)
                                        <option {{ ($propertyTaxAssessment->ward_area == $ward->name) ? 'selected' : '' }} value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" value="{{ $propertyTaxAssessment->house_no }}" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_usage">Property Usage / मालमत्ता वापर<span class="text-danger">*</span></label>
                                    <select class="form-select" name="property_usage" id="property_usage" required>
                                        <option value="">Select Property Usage</option>
                                        @php
                                            $options = ["निवासी", "बिगर निवासी", "मिश्र"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($propertyTaxAssessment->property_usage == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid property_usage_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="construction_type">Construction Type / बांधकाम प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-select" name="construction_type" id="construction_type" required>
                                        <option value="">Select Construction Type</option>
                                        @php
                                            $options = ["सिमेंट कॉँक्रिट संरचना", "सिमेंट / चुना / विटांच्या भिंती व स्ल्याब चे छत", "सिमेंट / चुना / विटांच्या भिंती व टीन / कवेलु चे छत", "मातीच्या भिंतीवर टीन / कवेलु चे छत", "खुला भूखंड", "इतर"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($propertyTaxAssessment->construction_type == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid construction_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_construction_authorized">Is Construction Authorized ? / बांधकाम अधिकृत आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_construction_authorized" id="is_construction_authorized" required>
                                        <option value="">Select Option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($propertyTaxAssessment->is_construction_authorized == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid is_construction_authorized_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_there_water_connection">Is there a Water(Tap) Connection ? / पाणी (नळ) कनेक्शन आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_there_water_connection" id="is_there_water_connection" required>
                                        <option value="">Select Option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ ($propertyTaxAssessment->is_there_water_connection == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid is_there_water_connection_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_area">Property Area / मालमत्ता क्षेत्रफळ<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_area" name="property_area" type="text" placeholder="Enter Property Area" value="{{ $propertyTaxAssessment->property_area }}" required>
                                    <span class="text-danger is-invalid property_area_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा </label>
                                    <a target="_blank" href="{{ asset('storage/'.$propertyTaxAssessment->uploaded_application) }}">View File</a>
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file">
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="certificate_of_no_duess">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा </label>
                                    <a target="_blank" href="{{ asset('storage/'.$propertyTaxAssessment->certificate_of_no_dues) }}">View File</a>
                                    <input class="form-control" id="certificate_of_no_duess" name="certificate_of_no_duess" type="file">
                                    <span class="text-danger is-invalid certificate_of_no_duess_err"></span>
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
                            <button type="submit" class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-admin.layout>




{{-- Edit --}}
<script>
    $("#editForm").submit(function(e) {
        e.preventDefault();
        $("#editSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        formdata.append('_method', 'PUT');
        var model_id = $('#editId').val();
        var url = "{{ route('issuance-of-property-tax.update', ":model_id") }}";
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
                $("#editSubmit").prop('disabled', false);
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
                    $("#editSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#editSubmit").prop('disabled', false);
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

