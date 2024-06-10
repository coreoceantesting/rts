<x-admin.layout>
    <x-slot name="title">TRANSFER OF PROPERTY CERTIFICATE / मालमत्ता हस्तांतरण नोंद प्रमाणपत्र( इतर मार्गाने )</x-slot>
    <x-slot name="heading">TRANSFER OF PROPERTY CERTIFICATE / मालमत्ता हस्तांतरण नोंद प्रमाणपत्र( इतर मार्गाने )</x-slot>

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
                                    <label class="col-form-label" for="applicant_full_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address"></textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्तेच्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name">
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address"></textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="survey_number">Survey No / सर्व्हे क्र.</label>
                                    <input class="form-control" id="survey_number" name="survey_number" type="text" placeholder="Enter Survey Number">
                                    <span class="text-danger is-invalid survey_number_err"></span>
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
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_notice">Date Of Notice / नोटीसाची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_notice" name="date_of_notice" type="date">
                                    <span class="text-danger is-invalid date_of_notice_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_documentation">Date Of Documentation / लेख करून दिल्याची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_documentation" name="date_of_documentation" type="date">
                                    <span class="text-danger is-invalid date_of_documentation_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_seller">Name Of Seller / विकणाऱ्याचे किंवा अभिहस्तांकन केल्याचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_seller" name="name_of_seller" type="text">
                                    <span class="text-danger is-invalid name_of_seller_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_buyer">Name Of Buyer / खरेदीदाराचे किंवा अभिहस्तांकतींचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_buyer" name="name_of_buyer" type="text">
                                    <span class="text-danger is-invalid name_of_buyer_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="compensation_amount">Compensation Amount / मोबदल्याची रक्कम</label>
                                    <input class="form-control" id="compensation_amount" name="compensation_amount" type="number">
                                    <span class="text-danger is-invalid compensation_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="what_are_they">What Are They?<span class="text-danger">*</span></label>
                                    <input class="form-control" id="what_are_they" name="what_are_they" type="text">
                                    <span class="text-danger is-invalid what_are_they_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_registration_document">Date of Registration if any Document has been Registered / कोणताही लेख नोंदण्यात आला असेल तर नोंदणीची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_registration_document" name="date_of_registration_document" type="date">
                                    <span class="text-danger is-invalid date_of_registration_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place">Place / ठिकाण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="place" name="place" type="text">
                                    <span class="text-danger is-invalid place_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_from_determined_book">Number From Determined Book / निर्धारण पुस्तकातील क्रमांक</label>
                                    <input class="form-control" id="no_from_determined_book" name="no_from_determined_book" type="number">
                                    <span class="text-danger is-invalid no_from_determined_book_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_officer">Number of the Officer / अधिकाऱ्याची संख्या</label>
                                    <input class="form-control" id="no_of_officer" name="no_of_officer" type="text">
                                    <span class="text-danger is-invalid no_of_officer_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="length_width_of_land">Length and Width Of Land / जमिनीची लांबी रुंदी <span class="text-danger">*</span></label>
                                    <input class="form-control" id="length_width_of_land" name="length_width_of_land" type="text">
                                    <span class="text-danger is-invalid length_width_of_land_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="border">Border / सिमा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="border" name="border" type="text">
                                    <span class="text-danger is-invalid border_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="uploaded_application">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="uploaded_application" name="uploaded_application" type="file">
                                    <span class="text-danger is-invalid uploaded_application_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="certificate_of_no_dues">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="certificate_of_no_dues" name="certificate_of_no_dues" type="file">
                                    <span class="text-danger is-invalid certificate_of_no_dues_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="copy_of_document">Upload Copy Of Deed Purchase Deed Prize Letter Allotment / दस्तएवाजाची प्रत (खरेदी खत / बक्षीस पत्र /वाटणी पत्र व इतर )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="copy_of_document" name="copy_of_document" type="file">
                                    <span class="text-danger is-invalid copy_of_document_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="remark">Remark / शेरा<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="remark" id="remark" cols="30" rows="2"  placeholder="Enter Remark"></textarea>
                                    <span class="text-danger is-invalid remark_err"></span>
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
            url: '',
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
                            window.location.href = '';
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
