<x-admin.layout>
    <x-slot name="title">Final Fire No Objection Certificate (Fire) / अग्निशमन अंतिम ना हरकत दाखला</x-slot>
    <x-slot name="heading">Final Fire No Objection Certificate (Fire) / अग्निशमन अंतिम ना हरकत दाखला</x-slot>

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
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Address / पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
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
                                    <label class="col-form-label" for="building_type">Building Type / इमारतीचा प्रकार<span class="text-danger">*</span></label>
                                    <select class="form-control" name="building_type" id="building_type">
                                        <option value="">Select Type</option>
                                        <option value="1">इमारत</option>
                                        <option value="2">थिएटर</option>
                                        <option value="3">दवाखाना</option>
                                        <option value="4">दुकान</option>
                                        <option value="5">बंगला</option>
                                        <option value="6">मॉल</option>
                                    </select>
                                    <span class="text-danger is-invalid building_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="building_name">Building name / इमारतीचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="building_name" id="building_name" placeholder="Enter building name">
                                    <span class="text-danger is-invalid building_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House Number / घर नं<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House No">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="city_structure">City structure / नगर रचना<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_structure" name="city_structure" type="text" placeholder="Enter City structure">
                                    <span class="text-danger is-invalid city_structure_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="uploaded_application">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="uploaded_application" name="uploaded_application" type="file">
                                    <span class="text-danger is-invalid uploaded_application_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_document" type="file">
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="architect_application_document">Upload Architect Application / वास्तुविशारद अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="architect_application_document" name="architect_application_document" type="file">
                                    <span class="text-danger is-invalid architect_application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="erection_of_fire_document">Upload Certificate Of Erection Of Fire Fighting System / अग्निशमन यंत्रणेच्या उभारणीचे प्रमाणपत्र अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="erection_of_fire_document" name="erection_of_fire_document" type="file">
                                    <span class="text-danger is-invalid erection_of_fire_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="licensing_agency_document">Upload Sample A Certificate From Licensing Agency / परवाना देणार्‍या एजन्सीकडून प्रमाणपत्राचा नमुना अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="licensing_agency_document" name="licensing_agency_document" type="file">
                                    <span class="text-danger is-invalid licensing_agency_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="guarantee_of_developer_document">Upload Guarantee Of The Developer Society To Keep The Fire Figh / आग विझवण्यासाठी विकासक सोसायटीची हमी अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="guarantee_of_developer_document" name="guarantee_of_developer_document" type="file">
                                    <span class="text-danger is-invalid guarantee_of_developer_document_err"></span>
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

