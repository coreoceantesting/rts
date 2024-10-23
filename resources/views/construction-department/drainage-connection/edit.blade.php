<x-admin.layout>
    <x-slot name="title">Providing drainage connections / जल निसारण जोडणी देणे </x-slot>
    <x-slot name="heading">Providing drainage connections / जल निसारण जोडणी देणे </x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Providing drainage connections / जल निसारण जोडणी देणे </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="applicant_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $data->applicant_name }}">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="applicant_area_details">Applicant area details / अर्जदाराचे क्षेत्र (एरिया) तपशील <span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_area_details" name="applicant_area_details" type="text" placeholder="Enter Applicant Area" value="{{ $data->applicant_area_details }}">
                                    <span class="text-danger is-invalid applicant_area_details_err"></span>
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
                                        @php
                                            $options = ["Prabhag1", "Prabhag2", "Prabhag3", "Prabhag4", "Prabhag5", "Prabhag6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->zone == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="ward">Ward Area / प्रभाग क्षेत्र <span class="text-danger">*</span></label>
                                    <select name="ward" id="ward" class="form-select">
                                        <option value="">Select Ward</option>
                                        @php
                                            $options = ["Ward1", "Ward2", "Ward3", "Ward4", "Ward5", "Ward6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->ward == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_err"></span>
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
                                    <label class="col-form-label" for="property_number">Property Number / मालमत्ता क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_number" name="property_number" type="text" placeholder="Enter Property Number" value="{{ $data->property_number }}">
                                    <span class="text-danger is-invalid property_number_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="property_usage">Property Usage / मालमत्ता वापर <span class="text-danger">*</span></label>
                                    <select name="property_usage" id="property_usage" class="form-select">
                                        <option value="">Select Property Usage</option>
                                        @php
                                            $options = ["Property Usage1", "Property Usage2", "Property Usage3", "Property Usage4", "Property Usage5", "Property Usage6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->property_usage == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid property_usage_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="connection_size_inches">Connection Size In Inches/ जोडणी आकार इंच मध्ये <span class="text-danger">*</span></label>
                                    <select name="connection_size_inches" id="connection_size_inches" class="form-select">
                                        <option value="">Select Connection Size</option>
                                        @php
                                            $options = ["Connection Size1", "Connection Size2", "Connection Size3", "Connection Size4", "Connection Size5", "Connection Size6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->connection_size_inches == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid connection_size_inches_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="construction_date">Construction Date / बांधकाम दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="construction_date" name="construction_date" type="Date" placeholder="Select Construction Date" value="{{ $data->construction_date }}">
                                    <span class="text-danger is-invalid construction_date_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="flat_assesment_date">Hous or flat Assesment Date / घर किंवा सदनिकेची कर आकारणी दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="flat_assesment_date" name="flat_assesment_date" type="date" placeholder="Select Flat Assesment Date" value="{{ $data->flat_assesment_date }}">
                                    <span class="text-danger is-invalid flat_assesment_date_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="flat_map_date">House or flat Map Date / घर किंवा सदनिकेचा नकाशा दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="flat_map_date" name="flat_map_date" type="date" placeholder="Select Flat Map Date" value="{{ $data->flat_map_date }}">
                                    <span class="text-danger is-invalid flat_map_date_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="current_water_tax_amount">Current Water Tax Amount / चालू पाणीपट्टी रक्कम <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_water_tax_amount" name="current_water_tax_amount" type="number" placeholder="Enter Current Water Tax Amount" value="{{ $data->current_water_tax_amount }}">
                                    <span class="text-danger is-invalid current_water_tax_amount_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="current_tax_paid_date">Current Tax paid date / चालू कर रक्कम भरणा दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_tax_paid_date" name="current_tax_paid_date" type="date" placeholder="Select Current Tax Paid Date" value="{{ $data->current_tax_paid_date }}">
                                    <span class="text-danger is-invalid current_tax_paid_date_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="lichpit_count">Septic Lichpit Count / सेप्टिक लीचपिट ची संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" id="lichpit_count" name="lichpit_count" type="number" placeholder="Enter Septic Lichpit Count" value="{{ $data->lichpit_count }}">
                                    <span class="text-danger is-invalid lichpit_count_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="is_toilet_available">Is Toilet Available ? / शौचालय उपलब्ध आहे का? <span class="text-danger">*</span></label>
                                    <select name="is_toilet_available" id="is_toilet_available" class="form-select">
                                        <option value="">Select Option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->is_toilet_available == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid is_toilet_available_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="total_residencial_people_count">Total Residencial People Count / एकूण रहिवाशी लोकांची संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" id="total_residencial_people_count" name="total_residencial_people_count" type="number" placeholder="Enter Total Residencial People Count" value="{{ $data->total_residencial_people_count }}">
                                    <span class="text-danger is-invalid total_residencial_people_count_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="total_renter_count">Total Renter count if any? / भाडेकरू असल्यास त्यांची एकूण संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" id="total_renter_count" name="total_renter_count" type="number" placeholder="Enter Total Renter count" value="{{ $data->total_renter_count }}">
                                    <span class="text-danger is-invalid total_renter_count_err"></span>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="connection_size_feet">Connection Size In Feet / जोडणी आकार फुटा मध्ये <span class="text-danger">*</span></label>
                                    <input class="form-control" id="connection_size_feet" name="connection_size_feet" type="number" placeholder="Enter Connection Size In Feet" value="{{ $data->connection_size_feet }}">
                                    <span class="text-danger is-invalid connection_size_feet_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_prescribed_formats">Upload Application in Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_prescribed_format) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_no_dues_certificates">Upload Tax No Dues Certificate / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_no_dues_certificates" name="upload_no_dues_certificates" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_no_dues_certificate) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_no_dues_certificates_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="upload_property_ownerships">Upload Documents of Property Ownership / जागा मालकीचे कागदपत्रे अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_property_ownerships" name="upload_property_ownerships" type="file">
                                    <small><a href="{{ asset('storage/' . $data->upload_property_ownership) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid upload_property_ownerships_err"></span>
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
        var updateUrl = '{{ route("construction-drainage-connection.update", $data->id) }}';
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
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("my-application") }}';
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

