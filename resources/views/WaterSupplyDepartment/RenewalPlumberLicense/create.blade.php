<x-admin.layout>
    <x-slot name="title">Renewal Of Plumber License / प्लंबर परवाना नुतनीकरण करणे</x-slot>
    <x-slot name="heading">Renewal Of Plumber License / प्लंबर परवाना नुतनीकरण करणे</x-slot>
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
                                    <label class="col-form-label" for="plumber_license_no">Plumber License Number / प्लंबर परवाना क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="plumber_license_no" name="plumber_license_no" type="text" placeholder="Enter Plumber License Number">
                                    <span class="text-danger is-invalid plumber_license_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant's Full Name  ">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार नं <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Number">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone">
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
                                    <select class="form-control" name="ward_area" id="ward_area">
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
                                    <label class="col-form-label" for="training_institute_name">Name of industrial training institute / औद्योगिक प्रशिक्षण संस्थेचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="training_institute_name" name="training_institute_name" type="text" placeholder="Enter Name of industrial training institute">
                                    <span class="text-danger is-invalid training_institute_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="education_institutation">Educational Institution / शैक्षणिक संस्था</label>
                                    <input class="form-control" id="education_institutation" name="education_institutation" type="text" placeholder="Enter Educational Institution">
                                    <span class="text-danger is-invalid education_institutation_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="education_qualification">Educational Qualification / शैक्षणिक पात्रता</label>
                                    <input class="form-control" id="education_qualification" name="education_qualification" type="text" placeholder="Enter Educational Qualification">
                                    <span class="text-danger is-invalid education_qualification_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="year_of_passing">Year Of Passing / उत्तीर्ण झाल्याचे वर्ष<span class="text-danger">*</span></label>
                                    <input class="form-control" id="year_of_passing" name="year_of_passing" type="text" placeholder="Enter Year Of Passing">
                                    <span class="text-danger is-invalid year_of_passing_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="have_experience">Have Experience / अनुभव आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="have_experience" id="have_experience">
                                        <option value="">Select option</option>
                                        @php
                                            $options = ["Yes", "No"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid have_experience_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark">Remark For Plumber License Renewal / प्लंबर लायसन्स नूतनीकरण साठी टिप्पणी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark For Plumber License Renewal">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file" required>
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="nodues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="nodues_document" name="nodues_documents" type="file" required>
                                    <span class="text-danger is-invalid nodues_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="educational_certificate_document">Upload Certificate Of Educational Qualification / शैक्षणिक पात्रतेचे प्रमाणपत्र अपलोड करा *<span class="text-danger">*</span></label>
                                    <input class="form-control" id="educational_certificate_document" name="educational_certificate_documents" type="file" required>
                                    <span class="text-danger is-invalid educational_certificate_document_err"></span>
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
            url: '{{ route("water-renewal-plumber-license.store") }}',
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
                            window.location.href = '{{ route("water-renewal-plumber-license.create") }}';
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

