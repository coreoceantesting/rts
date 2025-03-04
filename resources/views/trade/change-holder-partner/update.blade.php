<x-admin.layout>
    <x-slot name="title">Change The Business Holder/Partner/व्यवसाय धारक/भागीदार बदला</x-slot>
    <x-slot name="heading">Change The Business Holder/Partner/व्यवसाय धारक/भागीदार बदला</x-slot>
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


                        <div class="mb-4 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone">
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}" @if ($zone->name == $changeHolderPartner->zone) selected @endif>{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="service_type">Service Type<span class="text-danger">*</span></label>
                                <select name="service_type" id="service_type" class="form-select" disabled>
                                    <option value="" disabled selected> Service 2 </option>
                                    <option value="Service 1">Service 1</option>
                                    <option value="Service 2">Service 2</option>
                                    <option value="Service 3">Service 3 </option>
                                </select>
                                <span class="text-danger is-invalid service_type_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="licenses_no">License No<span class="text-danger">*</span></label>
                                <input class="form-control" id="licenses_no" name="licenses_no" type="text" placeholder="Enter License No">
                                {{-- <span class="text-danger is-invalid licenses_no_err"></span> --}}
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button class="btn btn-primary w-100">Search</button>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" required value="{{ old('f_name', $changeHolderPartner->f_name) }}">
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name">Middle Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" required value="{{ old('m_name', $changeHolderPartner->f_name) }}">
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" required value="{{ old('l_name', $changeHolderPartner->f_name) }}">
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">Mobile Number</label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ old('mobile_num', $changeHolderPartner->mobile_num) }}">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email">E-mail<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" required value="{{ old('email', $changeHolderPartner->email) }}">
                                <span class="text-danger is-invalid email_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="aadhar_num">Aadhar Card No<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadhar  Card Number" value="{{ old('aadhar_num', $changeHolderPartner->aadhar_num) }}">
                                <span class="text-danger is-invalid aadhar_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="propert_number">Property Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="propert_number" name="propert_number" type="number" placeholder="Enter Property Number" value="{{ old('propert_number', $changeHolderPartner->propert_number) }}">
                                <span class="text-danger is-invalid propert_number_err"></span>
                            </div>
                            <div class="col-md-5">
                                <label class="col-form-label" for="resi_address">Residential Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="resi_address" id="resi_address" cols="30" rows="2" placeholder="Enter Address">{{ old('resi_address', $changeHolderPartner->resi_address) }}</textarea>
                                <span class="text-danger is-invalid resi_address_err"></span>
                            </div>

                        </div>

                        <div class="row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                Owner Detail
                            </div>
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Owner/Partner</th>
                                            <th>Aadhar No</th>
                                            <th>Existing Name</th>
                                            <th>New Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Initial row (this can be used as a template) -->
                                        <tr>
                                            <th>
                                                <input class="form-control" name="owner_name" type="text" value="{{ old('owner_name', $changeHolderPartner->owner_name) }}">

                                            </th>
                                            <th>
                                                <input class="form-control" name="owner_aadhar_num" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" value="{{ old('owner_aadhar_num', $changeHolderPartner->owner_aadhar_num) }}">
                                            </th>
                                            <th>
                                                <input class="form-control" name="existing_name" type="text" value="{{ old('existing_name', $changeHolderPartner->existing_name) }}">
                                            </th>
                                            <th>
                                                <input class="form-control" name="new_name" type="text" value="{{ old('new_name', $changeHolderPartner->new_name) }}">

                                            </th>
                                            <th>
                                                <select name="owner_status" class="form-select" required>
                                                    <option value="" selected>--Select--</option>
                                                    <option value="1" {{ $changeHolderPartner->owner_status == '1' ? 'selected' : '' }}><label class="form-check-label" for="Active">Active</label></option>
                                                    <option value="2" {{ $changeHolderPartner->owner_status == '2' ? 'selected' : '' }}><label class="form-check-label" for="InActive">InActive</label></option>
                                                </select>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                Partner Detail
                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Partner Name</th>
                                                <th>Aadhar No</th>
                                                <th>Residental Address</th>
                                                <th> Mobile Number </th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="addMoreSegregationButton">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="AcquisitionAssistantBody">
                                            <!-- Initial row (this can be used as a template) -->
                                            @foreach ($partnerchanges as $partner)
                                                <tr>
                                                    <th>
                                                        <input class="form-control" name="partner_name[]" type="text" step="any" value="{{ old('partner_name', $partner->partner_name) }}">
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="partner_aadhar[]" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" step="any" value="{{ old('partner_aadhar', $partner->partner_aadhar) }}">
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="partner_address[]" type="text" step="any" value="{{ old('partner_address', $partner->partner_address) }}">
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="partner_mobile_num[]" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" step="any" value="{{ old('partner_mobile_num', $partner->partner_mobile_num) }}">
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="partner_email[]" type="text" step="any" value="{{ old('partner_email', $partner->partner_email) }}">
                                                    </th>
                                                    <th>
                                                        <select name="partner_status[]" class="form-select" required>
                                                            <option value="" selected>--Select--</option>
                                                            <option value="1" {{ $partner->partner_status == '1' ? 'selected' : '' }}>Active</option>
                                                            <option value="2"{{ $partner->partner_status == '2' ? 'selected' : '' }}>InActive</option>
                                                        </select>
                                                    </th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">New Business Type<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_type" name="business_type" type="text" placeholder="Enter Bussiness Type" required value="{{ old('business_type', $changeHolderPartner->business_type) }}">
                                <span class="text-danger is-invalid business_type_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="new_business_name">New Business Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="new_business_name" name="new_business_name" type="text" placeholder="Enter Bussiness Name" required value="{{ old('new_business_name', $changeHolderPartner->new_business_name) }}">
                                <span class="text-danger is-invalid new_business_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="reason">Reason<span class="text-danger">*</span></label>
                                <input class="form-control" id="reason" name="reason" type="text" placeholder="Enter Reason" required value="{{ old('reason', $changeHolderPartner->reason) }}">
                                <span class="text-danger is-invalid reason_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="application_docs">Document<span class="text-danger">*</span></label>
                                <input class="form-control" id="application_docs" name="application_docs" type="file">
                                @if ($changeHolderPartner->application_doc)
                                    <small><a href="{{ asset('storage/' . $changeHolderPartner->application_doc) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid application_doc_err"></span>
                            </div>
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
</x-admin.layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addMoreButton = document.getElementById('addMoreSegregationButton');
        const acquisitionAssistantBody = document.getElementById('AcquisitionAssistantBody');

        // Add new row when "Add More" button is clicked
        addMoreButton.addEventListener('click', function() {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                    <th>
                   <input class="form-control" name="partner_name[]" type="text" step="any">
                    </th>
                    <th>
                 <input class="form-control" name="partner_aadhar[]"  type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" step="any">
                    </th>
                   <th>
                                                    <input class="form-control" name="partner_address[]" type="text" step="any">
                                                </th>
                                                <th>
                                                    <input class="form-control" name="partner_mobile_num[]" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" step="any">
                                                </th>
                                                <th>
                                                    <input class="form-control" name="partner_email[]" type="text" step="any">
                                                </th>
                                                <th>
                                                    <select name="partner_status[]" class="form-select" required>
                                                        <option value="" disabled selected>--Select--</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">InActive</option>
                                                    </select>
                                                </th>
                    <th>
                        <button type="button" class="btn btn-danger btn-sm deleteButton">Delete</button>
                    </th>
                `;
            acquisitionAssistantBody.appendChild(newRow);
        });

        // Remove row when the delete button is clicked
        acquisitionAssistantBody.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('deleteButton')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    });
</script>

{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);


        var formdata = new FormData(this);
        var updateUrl = '{{ route('trade-change-holder-partner.update', $changeHolderPartner->id) }}';
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
