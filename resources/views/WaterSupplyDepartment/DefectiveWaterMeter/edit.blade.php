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
                                    <label class="col-form-label" for="owner_name">Name Of New Owner / मिळकतीच्या नवीन मालकाचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="owner_name" name="owner_name" type="text" placeholder="Enter Name Of New Owner " value="{{ $data->owner_name }}">
                                    <span class="text-danger is-invalid owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार नंबर <span class="text-danger">*</span></label>
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
                                    <select class="form-control" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        <option value="1" {{ $data->zone == 1 ? 'selected' : '' }}>Prabhag1</option>
                                        <option value="2" {{ $data->zone == 2 ? 'selected' : '' }}>Prabhag2</option>
                                        <option value="3" {{ $data->zone == 3 ? 'selected' : '' }}>Prabhag3</option>
                                        <option value="4" {{ $data->zone == 4 ? 'selected' : '' }}>Prabhag4</option>
                                        <option value="5" {{ $data->zone == 5 ? 'selected' : '' }}>Prabhag5</option>
                                        <option value="6" {{ $data->zone == 6 ? 'selected' : '' }}>Prabhag6</option>
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option value="1"  {{ $data->ward_area == 1 ? 'selected' : '' }}>firstward</option>
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
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="place_belongs_to_municipal" id="place_belongs_to_municipal">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->place_belongs_to_municipal == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->place_belongs_to_municipal == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid place_belongs_to_municipal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_connection_is_illegal">Currently Existed Tap Connection Unauthorized / मिळकतीस सध्या अस्तित्वात असलेले नळ कनेक्शन अनाधिकृत होते काय ?<span class="text-danger">*</span></label>
                                    <select class="form-control" name="current_connection_is_illegal" id="current_connection_is_illegal">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->current_connection_is_illegal == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->current_connection_is_illegal == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid current_connection_is_illegal_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_or_tenant">Applicant Or Tenant / अर्जदार / भाडेकरु आहेत काय ?<span class="text-danger">*</span></label>
                                    <select class="form-control" name="applicant_or_tenant" id="applicant_or_tenant">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->applicant_or_tenant == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->applicant_or_tenant == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid applicant_or_tenant_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="criminal_judicial_issue">Criminal Judicial Issues About Existing Tap Connection / मिळकतीस सध्या असलेल्या नळ कनेक्शनाबाबत काही फौजदारी किंवा न्यायालयीन बाबी सुरु आहेत का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="criminal_judicial_issue" id="criminal_judicial_issue">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->criminal_judicial_issue == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->criminal_judicial_issue == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid criminal_judicial_issue_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_tap_detail">Currently Existing Tap Connection Detail / मिळकतीस सध्या अस्तित्वात असलेल्या नळ कनेक्शनचा तपशील <span class="text-danger">*</span></label>
                                    <select class="form-control" name="current_tap_detail" id="current_tap_detail">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->current_tap_detail == 1 ? 'selected' : '' }}>बांधकाम </option>
                                        <option value="2" {{ $data->current_tap_detail == 2 ? 'selected' : '' }}>औद्योगीक</option>
                                        <option value="3" {{ $data->current_tap_detail == 3 ? 'selected' : '' }}>निवासी</option>
                                        <option value="4" {{ $data->current_tap_detail == 4 ? 'selected' : '' }}>विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)</option>
                                        <option value="5" {{ $data->current_tap_detail == 5 ? 'selected' : '' }}>व्यावसायिक अथवा वाणिज्य</option>
                                    </select>
                                    <span class="text-danger is-invalid current_tap_detail_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property No" value="{{ $data->property_no }}">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="meter_reading">Meter Reading / मीटर रीडिंग <span class="text-danger">*</span></label>
                                    <input class="form-control" id="meter_reading" name="meter_reading" type="text" placeholder="Enter Meter Reading" value="{{ $data->meter_reading }}">
                                    <span class="text-danger is-invalid meter_reading_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="size"> Size / आकार <span class="text-danger">*</span></label>
                                    <select class="form-control" name="size" id="size">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->size == 1 ? 'selected' : '' }}>100mm</option>
                                        <option value="2" {{ $data->size == 2 ? 'selected' : '' }}>15mm</option>
                                        <option value="3" {{ $data->size == 3 ? 'selected' : '' }}>150mm</option>
                                        <option value="4" {{ $data->size == 4 ? 'selected' : '' }}>20mm</option>
                                        <option value="5" {{ $data->size == 5 ? 'selected' : '' }}>25mm</option>
                                        <option value="6" {{ $data->size == 6 ? 'selected' : '' }}>300mm</option>
                                        <option value="7" {{ $data->size == 7 ? 'selected' : '' }}>40mm</option>
                                        <option value="8" {{ $data->size == 8 ? 'selected' : '' }}>50mm</option>
                                        <option value="9" {{ $data->size == 9 ? 'selected' : '' }}>80mm</option>
                                    </select>
                                    <span class="text-danger is-invalid size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="comment">Comment / टिप्पणी</label>
                                    <input class="form-control" id="comment" name="comment" type="text" placeholder="Enter Comment " value="{{ $data->comment }}">
                                    <span class="text-danger is-invalid comment_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application / अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_document" type="file">
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
        var updateUrl = '{{ route("water-defective-meter.update", $data->id) }}';
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
                            window.location.href = '{{ route("water-defective-meter.create") }}';
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

