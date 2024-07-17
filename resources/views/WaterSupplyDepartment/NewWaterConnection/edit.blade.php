<x-admin.layout>
    <x-slot name="title">New Water Connection / नविन नळजोडणी</x-slot>
    <x-slot name="heading">New Water Connection / नविन नळजोडणी</x-slot>

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
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" value="{{ $data->applicant_full_name }}">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>



                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" value="{{ $data->email_id }}">
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
                                        <option value="1" {{ $data->ward_area == 1 ? 'selected' : '' }}>firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="city_servey_no">City Survey Number / सिटी सर्व्हे क्र.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_servey_no" name="city_servey_no" type="text" value="{{ $data->city_servey_no }}">
                                    <span class="text-danger is-invalid city_servey_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2" >{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / हद्द खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" value="{{ $data->landmark }}">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property Number / मालमत्ता क्र.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" value="{{ $data->property_no }}">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="total_person">Total Person / एकूण व्यक्ती<span class="text-danger">*</span></label>
                                    <input class="form-control" id="total_person" name="total_person" type="text" value="{{ $data->total_person }}">
                                    <span class="text-danger is-invalid total_person_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="distance">Distance / अंतर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="distance" name="distance" type="text" value="{{ $data->distance }}">
                                    <span class="text-danger is-invalid distance_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="water_connection_use">Usage Of Water Connection / पाणी कनेक्शनचा वापर<span class="text-danger">*</span></label>
                                    <select class="form-control" name="water_connection_use" id="water_connection_use">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->water_connection_use == 1 ? 'selected' : '' }}>अनिवासी व्यवसाय</option>
                                        <option value="2" {{ $data->water_connection_use == 2 ? 'selected' : '' }}>औद्योगीक</option>
                                        <option value="3" {{ $data->water_connection_use == 3 ? 'selected' : '' }}>निवासी</option>
                                        <option value="4" {{ $data->water_connection_use == 4 ? 'selected' : '' }}>विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)</option>
                                        <option value="5" {{ $data->water_connection_use == 5 ? 'selected' : '' }}>व्यावसायिक अथवा वाणिज्य</option>
                                    </select>
                                    <span class="text-danger is-invalid water_connection_use_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="pipe_size">Pipe Size / पाईपचा आकार <span class="text-danger">*</span></label>
                                    <select class="form-control" name="pipe_size" id="pipe_size">
                                        <option value="">Select option</option>
                                        <option value="1" {{ $data->pipe_size == 1 ? 'selected' : '' }}>100mm</option>
                                        <option value="2" {{ $data->pipe_size == 2 ? 'selected' : '' }}>15mm</option>
                                        <option value="3" {{ $data->pipe_size == 3 ? 'selected' : '' }}>150mm</option>
                                        <option value="4" {{ $data->pipe_size == 4 ? 'selected' : '' }}>20mm</option>
                                        <option value="5" {{ $data->pipe_size == 5 ? 'selected' : '' }}>25mm</option>
                                        <option value="6" {{ $data->pipe_size == 6 ? 'selected' : '' }}>300mm</option>
                                        <option value="7" {{ $data->pipe_size == 7 ? 'selected' : '' }}>40mm</option>
                                        <option value="8" {{ $data->pipe_size == 8 ? 'selected' : '' }}>50mm</option>
                                        <option value="9" {{ $data->pipe_size == 9 ? 'selected' : '' }}>80mm</option>
                                    </select>
                                    <span class="text-danger is-invalid pipe_size_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_tap">Required No Of Tap Connection / नळ टॅप ची आवश्यक संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="no_of_tap" id="no_of_tap" value="{{ $data->no_of_tap }}">
                                    <span class="text-danger is-invalid no_of_tap_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_no_of_tap">Number Of Existing Tap Connections / नळ टॅप ची सध्याची एकूण संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="current_no_of_tap" id="current_no_of_tap" value="{{ $data->current_no_of_tap }}">
                                    <span class="text-danger is-invalid current_no_of_tap_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="total_tenants">Total Tenants / एकूण भाडेकरू<span class="text-danger">*</span></label>
                                    <input class="form-control" id="total_tenants" name="total_tenants" type="text" value="{{ $data->total_tenants }}">
                                    <span class="text-danger is-invalid total_tenants_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="written_application_document">Upload Written Application Of Applicant<span class="text-danger">*</span></label>
                                    <input class="form-control" id="written_application_document" name="written_application_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->written_application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid written_application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ownership_document">Upload Ownership Documents / मालकी हक्काची कागदपत्रे अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ownership_document" name="ownership_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->ownership_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid ownership_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
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
        var updateUrl = '{{ route("water-new-connection.update", $data->id) }}';

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
                            window.location.href = '{{ route("water-new-connection.create") }}';
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

