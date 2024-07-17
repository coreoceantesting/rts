<x-admin.layout>
    <x-slot name="title">Complaint Of Illegal Water Connection / अनधिकृत नळ जोडणी तक्रार</x-slot>
    <x-slot name="heading">Complaint Of Illegal Water Connection / अनधिकृत नळ जोडणी तक्रार</x-slot>

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
                                    <label class="col-form-label" for="complainants_full_name">Complainants full name / तक्रारदाराचे संपूर्ण नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="complainants_full_name" name="complainants_full_name" type="text" placeholder="Enter Complainants Full Name">
                                    <span class="text-danger is-invalid complainants_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full address of the complainant / तक्रारदाराचा संपूर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Complainant's Aadhar Number / तक्रारदाराचा आधार क्रमांक  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Complainant's Mobile Number / तक्रारदाराचा मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Complainant's Email Id  / तक्रारदाराचा ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="unauthorized_tap_connection">Information about unauthorized tap connection / अनधिकृत नळ कनेक्शनची माहिती <span class="text-danger">*</span></label>
                                    <input class="form-control" id="unauthorized_tap_connection" name="unauthorized_tap_connection" type="text" placeholder="Enter Information about unauthorized tap connection">
                                    <span class="text-danger is-invalid unauthorized_tap_connection_err"></span>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        <option value="1">Prabhag1</option>
                                        <option value="2">Prabhag2</option>
                                        <option value="3">Prabhag3</option>
                                        <option value="4">Prabhag4</option>
                                        <option value="5">Prabhag5</option>
                                        <option value="6">Prabhag6</option>
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option value="1">firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot Number / प्लॅाट नं किंवा हिस्सा नं <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot Number">
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark / हद्द खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="unauthorized_connection_address">Full adress of property with unauthorised tap connection/ अनाधिकृत नळ कनेक्शन असलेल्या मिळकतीचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="unauthorized_connection_address" id="unauthorized_connection_address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid unauthorized_connection_address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_connection_is_authorized">Currently Existed Tap Connection Unauthorized / मिळकतीस सध्या अस्तित्वात असलेले नळ कनेक्शन अनाधिकृत होते काय ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="current_connection_is_authorized" id="current_connection_is_authorized">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="text-danger is-invalid current_connection_is_authorized_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_or_tenant">Applicant Or Tenant  <span class="text-danger">*</span></label>
                                    <select class="form-control" name="applicant_or_tenant" id="applicant_or_tenant">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="text-danger is-invalid applicant_or_tenant_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="unauthorized_is_tenant">Is the holder of unauthorized tap connection a tenant?/ अनधिकृत नळ कनेक्शन धारक भाडेकरू आहे काय ?   <span class="text-danger">*</span></label>
                                    <select class="form-control" name="unauthorized_is_tenant" id="unauthorized_is_tenant">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="text-danger is-invalid unauthorized_is_tenant_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="criminal_judicial_issue">Criminal Judicial Issues About Existing Tap Connection / मिळकतीस सध्या असलेल्या नळ कनेक्शनाबाबत काही फौजदारी किंवा न्यायालयीन बाबी सुरु आहेत का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="criminal_judicial_issue" id="criminal_judicial_issue">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="text-danger is-invalid criminal_judicial_issue_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="existing_connection_detail">Currently Existing Tap Connection Detail / मिळकतीस सध्या अस्तित्वात असलेल्या नळ कनेक्शनचा तपशील<span class="text-danger">*</span></label>
                                    <select class="form-control" name="existing_connection_detail" id="existing_connection_detail">
                                        <option value="">Select option</option>
                                        <option value="2">औद्योगीक</option>
                                        <option value="3">निवासी</option>
                                        <option value="4">विशेष प्रवर्ग (शैक्षणिक संस्था,शासकीय,निमशासकीय कार्यालय,पथसंस्था,इतर)</option>
                                        <option value="5">व्यावसायिक अथवा वाणिज्य</option>
                                    </select>
                                    <span class="text-danger is-invalid existing_connection_detail_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place_belongs_to_municipal">Place Belongs To Municipal Council Limit / सदर जागा नगरपरिषदेच्या हद्दीत आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="place_belongs_to_municipal" id="place_belongs_to_municipal">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
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
        $.ajax({
            url: '{{ route("water-illegal-connection.store") }}',
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
                            window.location.href = '{{ route("water-illegal-connection.create") }}';
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

