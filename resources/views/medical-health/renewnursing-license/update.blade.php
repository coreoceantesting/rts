<x-admin.layout>
    <x-slot name="title">Renewal of Nursing Home License under Maharashtra Nursing Home Registration Act 1949/महाराष्ट्र शुश्रूषा-गृह नोंदणी अधिनियम 1949 अंतर्गत शुश्रूषा-गृह परवानाचे नूतनीकरण</x-slot>
    <x-slot name="heading">Renewal of Nursing Home License under Maharashtra Nursing Home Registration Act 1949/महाराष्ट्र शुश्रूषा-गृह नोंदणी अधिनियम 1949 अंतर्गत शुश्रूषा-गृह परवानाचे नूतनीकरण</x-slot>

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
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone">
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option @if ($renewNursingLicense->zone == $zone->name) selected @endif value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="noc_type">NOC Type<span class="text-danger">*</span></label>
                                <select name="noc_type" id="noc_type" class="form-select">
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="Noc 1"{{ $renewNursingLicense->noc_type == 'Noc 1' ? 'selected' : '' }}>Noc 1</option>
                                    <option value="Noc 2"{{ $renewNursingLicense->noc_type == 'Noc 2' ? 'selected' : '' }}>Noc 2</option>
                                    <option value="Noc 3"{{ $renewNursingLicense->noc_type == 'Noc 3' ? 'selected' : '' }}>Noc 3 </option>
                                </select>
                                <span class="text-danger is-invalidnoc_type_err"></span>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" value="{{ $renewNursingLicense->f_name }}">
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" value="{{ $renewNursingLicense->m_name }}">
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" value="{{ $renewNursingLicense->l_name }}">
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ $renewNursingLicense->mobile_num }}">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" value="{{ $renewNursingLicense->email }}">
                                <span class="text-danger is-invalid email_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number" value="{{ $renewNursingLicense->aadhar_num }}">
                                <span class="text-danger is-invalid aadhar_num_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="property_number">Property Number</label>
                                <input class="form-control" id="property_number" name="property_number" type="number" placeholder="Enter Property Number" value="{{ $renewNursingLicense->property_number ?? '' }}">
                                <span class="text-danger is-invalid property_number_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="address"> Residential Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Address">{{ $renewNursingLicense->address }}</textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>


                            <div class="col-md-6">
                                <label class="col-form-label" for="name_institute">Name of Institution (If Applicable)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="name_institute" id="name_institute" cols="30" rows="2" placeholder="Enter Name of Institution">{{ $renewNursingLicense->name_institute }}</textarea>
                                <span class="text-danger is-invalid name_institute_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="institute_address">Institution Address (If Applicable)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="institute_address" id="institute_address" cols="30" rows="2" placeholder="Enter Institution Address">{{ $renewNursingLicense->institute_address }}</textarea>
                                <span class="text-danger is-invalid institute_address_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="hospital_name" name="hospital_name" type="text" placeholder="Enter Hospital Name" value="{{ $renewNursingLicense->hospital_name ?? '' }}">
                                <span class="text-danger is-invalid hospital_name_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_mobile">Mobile Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="alternet_mobile" name="alternet_mobile" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ $renewNursingLicense->alternet_mobile ?? '' }}">
                                <span class="text-danger is-invalid alternet_mobile_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_email">Email</label>
                                <input class="form-control" id="alternet_email" name="alternet_email" type="email" placeholder="Enter Email" value="{{ $renewNursingLicense->alternet_email ?? '' }}">
                                <span class="text-danger is-invalid alternet_email_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Property Tax Number<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="property_tax" id="property_tax" value="Yes" {{ isset($renewNursingLicense) && $renewNursingLicense->property_tax == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="property_tax" id="property_tax" value="No"  {{ isset($renewNursingLicense) && $renewNursingLicense->property_tax == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="No">No</label>
                                    </div>
                                    <span class="text-danger is-invalid property_tax_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Water Connection Number</label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_connection" id="water_connection" value="Yes"  {{ isset($renewNursingLicense) && $renewNursingLicense->water_connection == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_connection" id="water_connection" value="No"  {{ isset($renewNursingLicense) && $renewNursingLicense->water_connection == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="No">No</label>
                                    </div>
                                    <span class="text-danger is-invalid water_connection_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Fire NOC<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fire_noc" id="fire_noc" value="Provisional"  {{ isset($renewNursingLicense) && $renewNursingLicense->fire_noc == 'Provisional' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Provisional">Provisional</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fire_noc" id="fire_noc" value="Final"  {{ isset($renewNursingLicense) && $renewNursingLicense->fire_noc == 'Final' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Final">Final</label>
                                    </div>
                                    <span class="text-danger is-invalid fire_noc_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="noc_number">NOC Document Number</label>
                                <input class="form-control" id="noc_number" name="noc_number" type="number" placeholder="Enter NOC Document Number" value="{{ $renewNursingLicense->noc_number ?? '' }}">
                                <span class="text-danger is-invalid noc_number_err"></span>
                            </div>

                            <div class="col-md-5">
                                <label class="col-form-label" for="hospital_address">Hospital Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="hospital_address" id="hospital_address" cols="30" rows="2" placeholder="Enter Hospital Address ">{{ $renewNursingLicense->hospital_address }}</textarea>
                                <span class="text-danger is-invalid hospital_address_err"></span>
                            </div>

                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes">
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
        var updateUrl = '{{ route('renewnursing-license.update', $renewNursingLicense->id) }}';
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
