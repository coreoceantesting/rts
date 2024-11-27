<x-admin.layout>
    <x-slot name="title"> Complaint Of Defective Water Meter / नादुरुस्त मिटर तक्रार करणे</x-slot>
    <x-slot name="heading">Complaint Of Defective Water Meter / नादुरुस्त मिटर तक्रार करणे </x-slot>
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
                                    <input class="form-control" id="water_connection_no" name="water_connection_no" type="text" placeholder="CNNP01B0000001" required>
                                    <span class="text-danger is-invalid water_connection_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="owner_name">Name Of New Owner / मिळकतीच्या नवीन मालकाचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="owner_name" name="owner_name" type="text" placeholder="Enter Name Of New Owner" required>
                                    <span class="text-danger is-invalid owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार नंबर <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" type="text" placeholder="Enter Aadhar Card No" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" placeholder="Enter Mobile Number" required>
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone" required>
                                        <option value="">Select Zone</option>
                                        
                                        @foreach($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>
                                        
                                        @foreach($wards as $ward)
                                        <option value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot Number / प्लॅाट नं किंवा हिस्सा नं <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot Number" required>
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / जवळची खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark" required>
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address Of The Property / मिळकतीचा संपुर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="place_belongs_to_municipal" id="place_belongs_to_municipal" required>
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
                                    <label class="col-form-label" for="current_connection_is_illegal">Currently Existed Tap Connection Unauthorized / मिळकतीस सध्या अस्तित्वात असलेले नळ कनेक्शन अनाधिकृत होते काय ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="current_connection_is_illegal" id="current_connection_is_illegal" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid current_connection_is_illegal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_or_tenant">Applicant Or Tenant / अर्जदार / भाडेकरु आहेत काय ?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="applicant_or_tenant" id="applicant_or_tenant" required>
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
                                    <label class="col-form-label" for="criminal_judicial_issue">Criminal Judicial Issues About Existing Tap Connection / मिळकतीस सध्या असलेल्या नळ कनेक्शनाबाबत काही फौजदारी किंवा न्यायालयीन बाबी सुरु आहेत का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="criminal_judicial_issue" id="criminal_judicial_issue" required>
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
                                    <label class="col-form-label" for="current_tap_detail">Currently Existing Tap Connection Detail / मिळकतीस सध्या अस्तित्वात असलेल्या नळ कनेक्शनचा तपशील <span class="text-danger">*</span></label>
                                    <select class="form-select" name="current_tap_detail" id="current_tap_detail" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["बांधकाम", "औद्योगीक", "निवासी", "विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)", "व्यावसायिक अथवा वाणिज्य"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid current_tap_detail_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property No" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="meter_reading">Meter Reading / मीटर रीडिंग <span class="text-danger">*</span></label>
                                    <input class="form-control" id="meter_reading" name="meter_reading" type="text" placeholder="Enter Meter Reading" required>
                                    <span class="text-danger is-invalid meter_reading_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="size"> Size / आकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="size" id="size" required>
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["15mm", "20mm", "25mm", "40mm", "50mm", "80mm", "100mm", "150mm", "300mm"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="comment">Comment / टिप्पणी</label>
                                    <input class="form-control" id="comment" name="comment" type="text" placeholder="Enter Comment">
                                    <span class="text-danger is-invalid comment_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_documents">Upload Application / अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_documents" name="application_documents" type="file" required>
                                    <span class="text-danger is-invalid application_documents_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" required name="is_correct_info" value="yes">
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
        $.ajax({
            url: '{{ route("water-defective-meter.store") }}',
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

