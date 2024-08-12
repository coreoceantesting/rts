<x-admin.layout>
    <x-slot name="title">Making Change In Ownership / मालकी हक्कात बदल करणे</x-slot>
    <x-slot name="heading">Making Change In Ownership / मालकी हक्कात बदल करणे</x-slot>

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
                                <div class="col-md-4">
                                    <label class="col-form-label" for="water_connection_no">Water Connection No / पाणी कनेक्शन क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="water_connection_no" name="water_connection_no" type="text" placeholder="Enter water connection no" required>
                                    <span class="text-danger is-invalid water_connection_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_owner_name">Name Of New Owner / मिळकतीच्या नवीन मालकाचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="new_owner_name" name="new_owner_name" type="text" placeholder="Enter Name Of New Owner" required>
                                    <span class="text-danger is-invalid new_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" required>
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone" required>
                                        <option value="">Select Zone</option>
                                        @php
                                            $options = ["Prabhag1", "Prabhag2", "Prabhag3", "Prabhag4", "Prabhag5", "Prabhag6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>
                                        @php
                                            $options = ["firstward"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property Number / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / हद्द खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark" required>
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address Of The Property / मिळकतीचा संपुर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address" required></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>



                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_tap_connection">Detail Of New Tap Connection / मिळकतीस नवीन मागणी केलेल्या नळ कनेक्शनचा तपशील <span class="text-danger">*</span></label>
                                    <select class="form-control" name="new_tap_connection" id="new_tap_connection" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["औध्योगिक व्यवसायासाठी", "घरघुती वापरा साठी", "बिगर घरघुती वापरासाठी", "वाणिज्य"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid new_tap_connection_err"></span>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_connection_is_authorized">Currently Existed Tap Connection Unauthorized / मिळकतीस सध्या अस्तित्वात असलेले नळ कनेक्शन अनाधिकृत होते काय ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="current_connection_is_authorized" id="current_connection_is_authorized" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid current_connection_is_authorized_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_or_tenant">Applicant Or Tenant / अर्जदार / भाडेकरु आहेत काय ?   <span class="text-danger">*</span></label>
                                    <select class="form-control" name="applicant_or_tenant" id="applicant_or_tenant" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid applicant_or_tenant_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_user">Number Of Users For New Tap Connection / मागणी केलेल्या नवीन नळ कनेक्शनमधून पाणी पुरवठ्याचा वापर करणाऱ्या कुटुंबाची संख्या<span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_user" name="no_of_user" type="number" placeholder="Enter Number Of Users For New Tap Connection" required>
                                    <span class="text-danger is-invalid no_of_user_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="criminal_judicial_issue">Criminal Judicial Issues About Existing Tap Connection / मिळकतीस सध्या असलेल्या नळ कनेक्शनाबाबत काही फौजदारी किंवा न्यायालयीन बाबी सुरु आहेत का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="criminal_judicial_issue" id="criminal_judicial_issue" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid criminal_judicial_issue_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_owner_name">Name of old water connection Owenr / जुन्या नळ जोडणी मालकाचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="old_owner_name" name="old_owner_name" type="text" placeholder="Enter Name of old water connection Owenr" required>
                                    <span class="text-danger is-invalid old_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tap_size">Tap Size / नळ आकार<span class="text-danger">*</span></label>
                                    <select class="form-control" name="tap_size" id="tap_size" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["15mm", "20mm", "25mm", "40mm", "50mm", "80mm", "100mm", "150mm", "300mm"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid tap_size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="existing_connection_detail">Currently Existing Tap Connection Detail / मिळकतीस सध्या अस्तित्वात असलेल्या नळ कनेक्शनचा तपशील<span class="text-danger">*</span></label>
                                    <select class="form-control" name="existing_connection_detail" id="existing_connection_detail" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["बांधकाम", "औद्योगीक", "विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)", "व्यावसायिक अथवा वाणिज्य"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid existing_connection_detail_err"></span>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="place_belongs_to_municipal" id="place_belongs_to_municipal" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid place_belongs_to_municipal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="comment">Comment / टिप्पणी</label>
                                    <input class="form-control" id="comment" name="comment" type="text" placeholder="Enter Comment ">
                                    <span class="text-danger is-invalid comment_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file" required>
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ownership_document">Upload ownership documents / मालकी असल्याबाबतचे कागदपत्रे जोडा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ownership_document" name="ownership_documents" type="file" required>
                                    <span class="text-danger is-invalid ownership_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="nodues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="nodues_document" name="nodues_documents" type="file" required>
                                    <span class="text-danger is-invalid nodues_document_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            "All information provided above is correct and I shall be fully responsible for any discrepancy.<br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन."
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
        $.ajax({
            url: '{{ route("water-change-ownership.store") }}',
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
                            window.location.href = '{{ route("water-change-ownership.create") }}';
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

