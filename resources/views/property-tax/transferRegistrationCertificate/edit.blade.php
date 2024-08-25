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
                            <h4 class="card-title">Edit Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4">
                                    <label class="col-form-label" for="upic_id">UPIC No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upic_id" name="upic_id" type="text" placeholder="Enter UPIC No" required>
                                    <span class="text-danger is-invalid upic_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" required>
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address" id="applicant_full_address" cols="30" rows="2"  placeholder="Enter Applicant Address" required></textarea>
                                    <span class="text-danger is-invalid applicant_full_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" type="number" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/\D/g, '')"  required>
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" oninput="this.value = this.value.replace(/\D/g, '')" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_owner_name">Property Owner Name / मालमत्तेच्या मालकाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_owner_name" name="property_owner_name" type="text" placeholder="Enter Property Owner Name" required>
                                    <span class="text-danger is-invalid property_owner_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address" required></textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
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
                                <div class="col-md-6">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file" required>
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="survey_number">Survey No / सर्व्हे क्र.</label>
                                    <input class="form-control" id="survey_number" name="survey_number" type="text" placeholder="Enter Survey Number">
                                    <span class="text-danger is-invalid survey_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_notice">Date Of Notice / नोटीसाची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control datepicker" id="date_of_notice" name="date_of_notice" type="text" required>
                                    <span class="text-danger is-invalid date_of_notice_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_documentation">Date Of Documentation / लेख करून दिल्याची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control datepicker" id="date_of_documentation" name="date_of_documentation" placeholder="Select documentation date" type="text" required>
                                    <span class="text-danger is-invalid date_of_documentation_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_seller">Name Of Seller / विकणाऱ्याचे किंवा अभिहस्तांकन केल्याचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_seller" name="name_of_seller" type="text" required>
                                    <span class="text-danger is-invalid name_of_seller_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_buyer">Name Of Buyer / खरेदीदाराचे किंवा अभिहस्तांकतींचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_buyer" name="name_of_buyer" type="text" required>
                                    <span class="text-danger is-invalid name_of_buyer_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="compensation_amount">Compensation Amount / मोबदल्याची रक्कम</label>
                                    <input class="form-control" id="compensation_amount" name="compensation_amount" type="number">
                                    <span class="text-danger is-invalid compensation_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="what_are_they">What Are They?<span class="text-danger">*</span></label>
                                    <input class="form-control" id="what_are_they" name="what_are_they" type="text" required>
                                    <span class="text-danger is-invalid what_are_they_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_registration_document">Date of Registration if any Document has been Registered / कोणताही लेख नोंदण्यात आला असेल तर नोंदणीची तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control datepicker" id="date_of_registration_document" name="date_of_registration_document" placeholder="Select date of registration" type="text" required>
                                    <span class="text-danger is-invalid date_of_registration_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="place">Place / ठिकाण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="place" name="place" type="text" required>
                                    <span class="text-danger is-invalid place_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_from_determined_book">Number From Determined Book / निर्धारण पुस्तकातील क्रमांक</label>
                                    <input class="form-control" id="no_from_determined_book" name="no_from_determined_book" type="number" oninput="this.value = this.value.replace(/\D/g, '')">
                                    <span class="text-danger is-invalid no_from_determined_book_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_officer">Number of the Officer / अधिकाऱ्याची संख्या</label>
                                    <input class="form-control" id="no_of_officer" name="no_of_officer" type="text">
                                    <span class="text-danger is-invalid no_of_officer_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="length_width_of_land">Length and Width Of Land / जमिनीची लांबी रुंदी <span class="text-danger">*</span></label>
                                    <input class="form-control" id="length_width_of_land" name="length_width_of_land" type="text" required>
                                    <span class="text-danger is-invalid length_width_of_land_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="border">Border / सिमा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="border" name="border" type="text" required>
                                    <span class="text-danger is-invalid border_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="no_dues_documents">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_documents" name="no_dues_documents" type="file" required>
                                    <span class="text-danger is-invalid no_dues_documents_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="copy_of_documents">Upload Copy Of Deed Purchase Deed Prize Letter Allotment / दस्तएवाजाची प्रत (खरेदी खत / बक्षीस पत्र /वाटणी पत्र व इतर )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="copy_of_documents" name="copy_of_documents" type="file" required>
                                    <span class="text-danger is-invalid copy_of_documents_err"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label" for="remark">Remark / शेरा<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="remark" id="remark" cols="30" rows="2"  placeholder="Enter Remark" required></textarea>
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन.
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
            url: '{{ route("transfer-registration-certificate.edit") }}',
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
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>

