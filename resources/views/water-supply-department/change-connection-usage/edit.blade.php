<x-admin.layout>
    <x-slot name="title"> Connection Usage Change / नळजोडणीच्या वापरामध्ये बदल करणे</x-slot>
    <x-slot name="heading">Connection Usage Change / नळजोडणीच्या वापरामध्ये बदल करणे</x-slot>
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
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्ता मालकाचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name" required value="{{ $data->property_owner_name }}">
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Property Owner Aadhar No / मालमत्ता मालकाचे आधार क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" type="text" placeholder="Enter Aadhar Card No" required value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" placeholder="Enter Mobile Number" required value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone" required>
                                        <option value="">Select Zone</option>
                                        
                                        @foreach($zones as $zone)
                                        <option {{ $data->zone == $zone->name ? 'selected' : '' }} value="{{ $zone->name }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>
                                        
                                        @foreach($wards as $ward)
                                        <option {{ $data->ward_area == $ward->name ? 'selected' : '' }} value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot Number / प्लॅाट नं किंवा हिस्सा नं <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot Number" value="{{ $data->plot_no }}" required>
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" value="{{ $data->house_no }}" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / जवळची खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark" value="{{ $data->landmark }}" required>
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address Of The Property / मिळकतीचा संपुर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address" required>{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_type">Property Type / मालमत्तेचा प्रकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="property_type" id="property_type" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["अनिवासी", "कार्यशाळा", "केंद्र सरकारी", "खुला भूखंड", "गोदाम", "दुकान", 'निवासी', 'राज्य सरकारी'];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->property_type == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid property_type_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="water_connection_no">Water Connection Number / पाणी कनेक्शन क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="water_connection_no" name="water_connection_no" type="text" placeholder="Enter Water Connection Number" value="{{ $data->water_connection_no }}" required>
                                    <span class="text-danger is-invalid water_connection_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_is_on_rent">Is Applicant On Rent / अर्जदार भाड्याने आहे का ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="applicant_is_on_rent" id="applicant_is_on_rent" required>
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
                                    <label class="col-form-label" for="water_connection_size">Water Connection Size / पाणी कनेक्शनचा आकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="water_connection_size" id="water_connection_size" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["15mm", "20mm", "25mm", "40mm", "50mm", "80mm", "100mm", "150mm", "300mm"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->water_connection_size == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid water_connection_size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="water_usage">Existing Water Connection Usage / विद्यमान पाणी कनेक्शनचा वापर <span class="text-danger">*</span></label>
                                    <select class="form-select" name="water_usage" id="water_usage" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["औध्योगिक व्यवसायासाठी", "घरघुती वापरा साठी", "बिगर घरघुती वापरासाठी", "वाणिज्य"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->water_usage == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid water_usage_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_water_con_usage">New Water Connection Usage / नवीन पाणी कनेक्शनचा वापर<span class="text-danger">*</span></label>
                                    <select class="form-select" name="new_water_con_usage" id="new_water_con_usage" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["औध्योगिक व्यवसायासाठी", "घरघुती वापरा साठी", "बिगर घरघुती वापरासाठी", "वाणिज्य"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->new_water_con_usage == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid new_water_con_usage_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="usage_residence_type">Water Connection Usage Residence Type / पाणी कनेक्शनचा वापर निवास प्रकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="usage_residence_type" id="usage_residence_type" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["अनिवासी व्यवसाय", "औद्योगीक", "निवासी", "विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)", "व्यावसायिक अथवा वाणिज्य"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->usage_residence_type == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid usage_residence_type_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_connection_is_illegal">Is Existing Water Connection Was Illegal / सध्याचे पाणी कनेक्शन बेकायदेशीर होते का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="current_connection_is_illegal" id="current_connection_is_illegal" required>
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
                                    <label class="col-form-label" for="no_of_user">Number Of Users For New Tap Connection /मागणी केलेल्या नवीन नळ कनेक्शनमधून पाणी पुरवठ्याचा वापर करणाऱ्या कुटुंबाची संख्या<span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_user" name="no_of_user" type="text" placeholder="Enter Number Of Users For New Tap Connection" value="{{ $data->no_of_user }}" required>
                                    <span class="text-danger is-invalid no_of_user_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="place_belongs_to_municipal" id="place_belongs_to_municipal" required>
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
                                    <label class="col-form-label" for="any_police_complaint">Is Any Police Or Court Complaint About Property Connection / मालमत्तेच्या कनेक्शनबद्दल कोणतीही पोलीस किंवा न्यायालयीन तक्रार आहे का ? * <span class="text-danger">*</span></label>
                                    <select class="form-select" name="any_police_complaint" id="any_police_complaint" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option {{ $data->any_police_complaint == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid any_police_complaint_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="nodues_documents">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <div><a href="{{ asset('storage/' . $data->nodues_document) }}" target="_blank">View Document</a></div>
                                    <input class="form-control" id="nodues_documents" name="nodues_documents" type="file">
                                    <span class="text-danger is-invalid nodues_documents_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_documents">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा  <span class="text-danger">*</span></label>
                                    <div><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></div>
                                    <input class="form-control" id="application_documents" name="application_documents" type="file">
                                    <span class="text-danger is-invalid application_documents_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" checked required name="is_correct_info" value="yes">
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
        var updateUrl = '{{ route("water-change-connection-usage.update", $data->id) }}';
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

