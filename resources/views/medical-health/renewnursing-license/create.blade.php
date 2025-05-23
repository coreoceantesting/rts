<x-admin.layout>
    <x-slot name="title">Renewal of nursing homes under the Maharashtra Nursing Homes Registration Act, 1949 /महाराष्ट्र शुश्रूषा-गृह नोंदणी अधिनियम 1949 अंतर्गत शुश्रूषा-गृह परवानाचे नूतनीकरण</x-slot>
    <x-slot name="heading">Renewal of nursing homes under the Maharashtra Nursing Homes Registration Act, 1949 /महाराष्ट्र शुश्रूषा-गृह नोंदणी अधिनियम 1949 अंतर्गत शुश्रूषा-गृह परवानाचे नूतनीकरण</x-slot>

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


                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" >
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="noc_type">NOC Type<span class="text-danger">*</span></label>
                                <select name="noc_type" id="noc_type" class="form-select" >
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="Noc 1">Noc 1</option>
                                    <option value="Noc 2">Noc 2</option>
                                    <option value="Noc 3">Noc 3 </option>
                                </select>
                                <span class="text-danger is-invalid noc_type_err"></span>
                            </div>
                        </div>


                        <div class="mb-3 row">

                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" >
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name">
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name">
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email">
                                <span class="text-danger is-invalid email_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number">
                                <span class="text-danger is-invalid aadhar_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="property_number">Property Number</label>
                                <input class="form-control" id="property_number" name="property_number" type="number" placeholder="Enter Property Number">
                                <span class="text-danger is-invalid property_number_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="address"> Residential Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Address"></textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>



                            <div class="col-md-6">
                                <label class="col-form-label" for="name_institute">Name of Institution (If Applicable)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="name_institute" id="name_institute" cols="30" rows="2" placeholder="Enter Name of Institution"></textarea>
                                <span class="text-danger is-invalid name_institute_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="institute_address">Institution Address (If Applicable)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="institute_address" id="institute_address" cols="30" rows="2" placeholder="Enter Institution Address"></textarea>
                                <span class="text-danger is-invalid institute_address_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="hospital_name" name="hospital_name" type="text" placeholder="Enter Hospital Name">
                                <span class="text-danger is-invalid hospital_name_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_mobile">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="alternet_mobile" name="alternet_mobile" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                                <span class="text-danger is-invalid alternet_mobile_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_email">Email</label>
                                <input class="form-control" id="alternet_email" name="alternet_email" type="email" placeholder="Enter Email">
                                <span class="text-danger is-invalid alternet_email_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Property Tax Number<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="property_tax" id="property_tax" value="Yes">
                                        <label class="form-check-label" for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="property_tax" id="property_tax" value="No">
                                        <label class="form-check-label" for="No">No</label>
                                    </div>
                                    <span class="text-danger is-invalid property_tax_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Water Connection Number</label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_connection" id="water_connection" value="Yes">
                                        <label class="form-check-label" for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_connection" id="water_connection" value="No">
                                        <label class="form-check-label" for="No">No</label>
                                    </div>
                                    <span class="text-danger is-invalid water_connection_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Fire NOC<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fire_noc" id="fire_noc" value="Provisional">
                                        <label class="form-check-label" for="Provisional">Provisional</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fire_noc" id="fire_noc" value="Final">
                                        <label class="form-check-label" for="Final">Final</label>
                                    </div>
                                   <span class="text-danger is-invalid fire_noc_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="noc_number">NOC Document Number</label>
                                <input class="form-control" id="noc_number" name="noc_number" type="number" placeholder="Enter NOC Document Number">
                                <span class="text-danger is-invalid noc_number_err"></span>
                            </div>

                            <div class="col-md-5">
                                <label class="col-form-label" for="hospital_address">Hospital Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="hospital_address" id="hospital_address" cols="30" rows="2" placeholder="Enter Hospital Address "></textarea>
                                <span class="text-danger is-invalid hospital_address_err"></span>
                            </div>

                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
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
            url: '{{ route('renewnursing-license.store') }}',
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
