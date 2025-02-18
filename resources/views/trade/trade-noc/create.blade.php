<x-admin.layout>
    <x-slot name="title">New Trade Noc / नवीन कर मूल्यांकन</x-slot>
    <x-slot name="heading">New Trade Noc/नवीन कर मूल्यांकन</x-slot>

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


                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="mb-3 row">

                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="marathi_f_name">प्रथम नाव (मराठी) <span class="text-danger">*</span></label>
                                <input class="form-control" id="marathi_f_name" name="marathi_f_name" type="text" placeholder="नाव प्रविष्ट करा प्रथम" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="marathi_m_name">मधले नाव (मराठी)<span class="text-danger">*</span></label>
                                <input class="form-control" id="marathi_m_name" name="marathi_m_name" type="text" placeholder="प्रविष्ट करा मधले नाव" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="marathi_l_name">आडनाव (मराठी) <span class="text-danger">*</span></label>
                                <input class="form-control" id="marathi_l_name" name="marathi_l_name" type="text" placeholder="आडनाव प्रविष्ट करा" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number</label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Card No</label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" required>
                                <span class="text-danger is-invalid email_err"></span>
                            </div>
                            <div class="col-md-5">
                                <label class="col-form-label" for="address"> Address  <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Address" required></textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>

                            <div class="col-md-5">
                                <label class="col-form-label" for="marathi_address"> पत्ता (मराठी) <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="marathi_address" id="marathi_address" cols="30" rows="2" placeholder="पत्ता" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-5">
                                <label class="col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="purpose" id="purpose" cols="30" rows="2" placeholder="Enter purpose" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>

                            <div class="col-md-5">
                                <label class="col-form-label" for="marathi_purpose">उद्देश (मराठी) <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="marathi_purpose" id="marathi_purpose" cols="30" rows="2" placeholder="उद्देश" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>

                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
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
        $.ajax({
            url: '{{ route('tradenoc.store') }}',
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
