<x-admin.layout>
    <x-slot name="title">License Partner Name Change / परवाना धारक अथवा भागीदाराचे नाव बदलणे</x-slot>
    <x-slot name="heading"> License Partner Name Change / परवाना धारक अथवा भागीदाराचे नाव बदलणे</x-slot>

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
                                    <label class="col-form-label" for="current_permission_no">Current Permission No / चालू परवाना क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_no" name="current_permission_no" type="text" placeholder="Enter Current Permission No" value="{{ $data->current_permission_no }}">
                                    <span class="text-danger is-invalid current_permission_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" value="{{ $data->applicant_full_name }}">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_owner_name">Trade license old owner name / परवानाधारक जुन्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="old_owner_name" name="old_owner_name" type="text" placeholder="Enter Trade license old owner name" value="{{ $data->old_owner_name }}">
                                    <span class="text-danger is-invalid old_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_owner_name">Trade license new owner name / परवानाकरिता नवीन मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="new_owner_name" name="new_owner_name" type="text" placeholder="Enter Trade license new owner name " value="{{ $data->new_owner_name }}">
                                    <span class="text-danger is-invalid new_owner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_partner_name">Trade license old partner names / परवानाधारक जुन्या भागीदाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="old_partner_name" name="old_partner_name" type="text" placeholder="Enter Trade license old partner names" value="{{ $data->old_partner_name }}">
                                    <span class="text-danger is-invalid old_partner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_partner_name">Trade license new partner names / परवानाकरिता नवीन भागीदाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="new_partner_name" name="new_partner_name" type="text" placeholder="Enter Trade license new partner names" value="{{ $data->new_partner_name }}">
                                    <span class="text-danger is-invalid new_partner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address">{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
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
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option value="1"  {{ $data->ward_area == 1 ? 'selected' : '' }}>firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark">Remark / शेरा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark " value="{{ $data->remark }}">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Tax No Dues Certificate / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes">
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
        var updateUrl = '{{ route("trade-change-owner-name.update", $data->id) }}';
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
                            window.location.href = '{{ route("trade-change-owner-name.create") }}';
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

