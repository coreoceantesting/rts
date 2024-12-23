<x-admin.layout>
    <x-slot name="title">Occupancy Completion Certificate / जोते प्रमाणपत्र देणे</x-slot>
    <x-slot name="heading">Occupancy Completion Certificate / जोते प्रमाणपत्र देणे</x-slot>

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
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option @if ($occupancyCertificate->zone == $zone->name) selected @endif value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="ward">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward" id="ward" required>
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option @if ($occupancyCertificate->ward == $ward->name) selected @endif value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="survey_no">Survey No/ सर्व्हे क्र<span class="text-danger">*</span></label>
                                <input class="form-control" id="survey_no" value="{{ $occupancyCertificate->survey_no }}" name="survey_no" type="text" placeholder="Enter Survey No" required>
                                <span class="text-danger is-invalid survey_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" value="{{ $occupancyCertificate->applicant_name }}" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" value="{{ $occupancyCertificate->applicant_mobile_no }}" type="text" oninput="this.value = this.value.replace(/\D/g, '')"
                                    maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $occupancyCertificate->applicant_full_address }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $occupancyCertificate->email_id }}" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="documents">Document<span class="text-danger">*</span></label>
                                @if ($occupancyCertificate->document)
                                    <a href="{{ asset('storage/' . $occupancyCertificate->document) }}" class="btn btn-primary">View File</a>
                                @endif
                                <input class="form-control" id="documents" name="documents" type="file" placeholder="Enter Document" required>
                                <span class="text-danger is-invalid documents_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="commencement_certificate_no">Commencement Certificate Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="commencement_certificate_no" name="commencement_certificate_no" value="{{ $occupancyCertificate->commencement_certificate_no }}" type="text" placeholder="Enter Building No"
                                    required>
                                <span class="text-danger is-invalid commencement_certificate_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="plinth_number">Jote/Plinth Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="plinth_number" name="plinth_number" type="text" value="{{ $occupancyCertificate->plinth_number }}" placeholder="Enter Building No" required>
                                <span class="text-danger is-invalid plinth_number_err"></span>
                            </div>

                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes" required>
                                    <label class="form-check-label ms-2" for="is_correct_info">
                                        "All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार
                                        असेन."
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
        var updateUrl = '{{ route('occupancy-certificate.update', $occupancyCertificate->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('my-application') }}';
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
