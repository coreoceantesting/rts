<x-admin.layout>
    <x-slot name="title">No Dues Certificate (Property) / थकबाकी नसल्याचा दाखला(मालमत्ता)</x-slot>
    <x-slot name="heading">No Dues Certificate (Property) / थकबाकी नसल्याचा दाखला(मालमत्ता)</x-slot>

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
                                    <label class="col-form-label" for="upic_id">UPIC No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upic_id" name="upic_id" type="text" placeholder="PNVL000045" required>
                                    <span class="text-danger is-invalid upic_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_name_eng">Applicant's Name ( English ) / अर्जदाराचे नाव ( इंग्रजी )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name_eng" name="applicant_name_eng" type="text" placeholder="Enter Applicant Name" required>
                                    <span class="text-danger is-invalid applicant_name_eng_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_name_mar">Applicant's Name ( Marathi ) / अर्जदाराचे नाव ( मराठी )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name_mar" name="applicant_name_mar" type="text" placeholder="Enter Applicant Name" required>
                                    <span class="text-danger is-invalid applicant_name_mar_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address_eng">Permanent Address ( English ) / कायमचा पत्ता ( इंग्रजी )<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address_eng" id="applicant_full_address_eng" cols="30" rows="2"  placeholder="Enter Applicant Address" required></textarea>
                                    <span class="text-danger is-invalid applicant_full_address_eng_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_address_mar">Permanent Address ( Marathi ) / कायमचा पत्ता ( मराठी )<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_full_address_mar" id="applicant_full_address_mar" cols="30" rows="2"  placeholder="Enter Applicant Address" required></textarea>
                                    <span class="text-danger is-invalid applicant_full_address_mar_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_mobile_no" name="applicant_mobile_no" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" placeholder="Enter Mobile Number" required>
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Number / आधार क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" type="text" name="aadhar_no" placeholder="Enter Aadhar Card No" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
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
                                    <label class="col-form-label" for="ward_area">Ward / प्रभाग<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>
                                       
                                        @foreach($wards as $ward)
                                        <option value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address">Property Address / मालमत्तेचा पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" id="property_address" cols="30" rows="2"  placeholder="Enter Property Address" required></textarea>
                                    <span class="text-danger is-invalid property_address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="house_no">House No / घर क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House Number" required>
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="index_number">Index Number / निर्देशांक क्रमांक (घर)</label>
                                    <input class="form-control" id="index_number" name="index_number" type="text" placeholder="Enter Index Number">
                                    <span class="text-danger is-invalid index_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property No / मालमत्ता क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="text" placeholder="Enter Property Number" required>
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="annual_period">Annual Period / वार्षिक कालावधी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="annual_period" name="annual_period" type="text" placeholder="Enter Annual Period" required>
                                    <span class="text-danger is-invalid annual_period_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="uploaded_applications">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="uploaded_applications" name="uploaded_applications" type="file" required>
                                    <span class="text-danger is-invalid uploaded_applications_err"></span>
                                </div>
                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
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
        $.ajax({
            url: '{{ route("no-dues.store") }}',
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

