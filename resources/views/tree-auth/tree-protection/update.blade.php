<x-admin.layout>
    <x-slot name="title">Urban Areas Tree Protection/शहरी भागात वृक्ष संरक्षण</x-slot>
    <x-slot name="heading">Urban Areas Tree Protection/शहरी भागात वृक्ष संरक्षण</x-slot>

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


                        <div class="col-md-4">
                            <label class="col-form-label" for="zone">Zone Id / झोन<span class="text-danger">*</span></label>
                            <select class="form-select" name="zone" id="zone" required>
                                <option value="">Select Zone</option>
                                @foreach ($zones as $zone)
                                    <option @if ($treeProtection->zone == $zone->name) selected @endif value="{{ $zone->name }}">{{ $zone->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger is-invalid zone_err"></span>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-3">
                                <label class="col-form-label" for="title_of_application">Title of Applicant<span class="text-danger">*</span></label>
                                <select name="title_of_application" id="title_of_application" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="mr" {{ $treeProtection->title_of_application == 'mr' ? 'selected' : '' }}>Mr</option>
                                    <option value="mrs"{{ $treeProtection->title_of_application == 'mrs' ? 'selected' : '' }}>Mrs</option>
                                    <option value="ms"{{ $treeProtection->title_of_application == 'ms' ? 'selected' : '' }}>Ms</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" value="{{ $treeProtection->f_name ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="m_name">Middle Name</label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" value="{{ $treeProtection->m_name ?? '' }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" value="{{ $treeProtection->l_name ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="flat_no">Plot/Flat No <span class="text-danger">*</span></label>
                                <input class="form-control" id="flat_no" name="flat_no" type="text" placeholder="Enter Last Name" value="{{ $treeProtection->flat_no ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="building_no">Name of the Building/Colony<span class="text-danger">*</span></label>
                                <input class="form-control" id="building_no" name="building_no" type="text" placeholder="Enter Last Name" value="{{ $treeProtection->building_no ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="area">Name of the Area<span class="text-danger">*</span></label>
                                <input class="form-control" id="area" name="area" type="text" placeholder="Enter Last Name" value="{{ $treeProtection->area ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="city">Name of City<span class="text-danger">*</span></label>
                                <input class="form-control" id="city" name="city" type="text" placeholder="Enter Last Name" value="{{ $treeProtection->city ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="pincode">Pin Code<span class="text-danger">*</span></label>
                                <input class="form-control" id="pincode" name="pincode" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Pincode" value="{{ $treeProtection->pincode ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="landmark">Near By Landmark<span class="text-danger">*</span></label>
                                <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Lamd mark" value="{{ $treeProtection->landmark ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="gut_number">City Survey/ Gut Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="gut_number" name="gut_number" type="text" placeholder="Enter City" value="{{ $treeProtection->gut_number ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="mobile_num">Mobile No</label><span class="text-danger">*</span>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="{{ $treeProtection->mobile_num ?? '' }}">
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" value="{{ $treeProtection->email ?? '' }}"required>
                                <span class="text-danger is-invalid email_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Type of Applicant <span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Citizen" {{ isset($treeProtection) && $treeProtection->type_application == 'Citizen' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="citizen">Citizen</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Builder" {{ isset($treeProtection) && $treeProtection->type_application == 'Builder' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="builder">Builder</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Advertising Media" {{ isset($treeProtection) && $treeProtection->type_application == 'Advertising Media' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="advertising">Advertising Media</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="other" value="Other" {{ isset($treeProtection) && $treeProtection->type_application == 'Other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label">Reason For Trimming <span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Trimming Down Dangerous Branches" {{ isset($treeProtection) && $treeProtection->reason_trim == 'Trimming Down Dangerous Branches<' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="trimming">Trimming Down Dangerous Branches</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Obstruction To Electrical Wires" {{ isset($treeProtection) && $treeProtection->reason_trim == 'Obstruction To Electrical Wires' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wires">Obstruction To Electrical Wires</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Obstruction To Construction" {{ isset($treeProtection) && $treeProtection->reason_trim == 'Obstruction To Construction' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="construction">Obstruction To Construction</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Obstruction To Hoardings" {{ isset($treeProtection) && $treeProtection->reason_trim == 'Obstruction To Hoardings' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="hoardings">Obstruction To Hoardings</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="applicant_type" id="other" value="Other" {{ isset($treeProtection) && $treeProtection->applicant_type == 'Other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="owner">Type of Owner<span class="text-danger">*</span></label>
                                <select name="owner" id="owner" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="private" {{ $treeProtection->owner == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="corporation" {{ $treeProtection->owner == 'corporation' ? 'selected' : '' }}>Corporation</option>
                                    <option value="government" {{ $treeProtection->owner == 'government' ? 'selected' : '' }}>Government</option>
                                    <option value="semi_govt" {{ $treeProtection->owner == 'semi_govt' ? 'selected' : '' }}>Semi Govt</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="type_of_tree">Type of Tree<span class="text-danger">*</span></label>
                                <select name="type_of_tree" id="type_of_tree" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="fruit" {{ $treeProtection->type_of_tree == 'fruit' ? 'selected' : '' }}>Fruit Tree</option>
                                    <option value="other" {{ $treeProtection->type_of_tree == 'other' ? 'selected' : '' }}>Other Tree</option>

                                </select>
                            </div>

                            <div class="col-mb-3">
                                <label class="col-form-label fw-bold">
                                    List of Documents (Attachment) For Tree Branches Trimming <span class="text-danger">*</span>
                                </label>
                                <div class="alert alert-info p-2">
                                    <strong>Note:</strong> Upload Below Files only <strong>pdf, jpg, jpeg</strong>, etc. Max up to <strong>5MB</strong>.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="paid_receipt">Current Year Property Tax Paid Receipt <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="paid_receipt" name="paid_receipt" accept="image/*" required onchange="previewImage(event)">
                                @if ($treeProtection->paid_receipt)
                                    <small><a href="{{ asset('storage/' . $treeProtection->paid_receipt) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="photo_tree">Photograph of Tree <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="photo_tree" name="photo_tree" accept="image/*" required onchange="previewImage(event)">
                                @if ($treeProtection->photo_tree)
                                    <small><a href="{{ asset('storage/' . $treeProtection->photo_tree) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="aadhar">Aadhaar Card <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="aadhar" name="aadhar" accept="image/*" required onchange="previewImage(event)">
                                @if ($treeProtection->aadhar)
                                    <small><a href="{{ asset('storage/' . $treeProtection->aadhar) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="building_permission">Building Permission</label>
                                <input type="file" class="form-control" id="building_permission" name="building_permission" accept="image/*" onchange="previewImage(event)">
                                @if ($treeProtection->building_permission)
                                    <small><a href="{{ asset('storage/' . $treeProtection->building_permission) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="plan_construction">Sanctioned Plan of Construction <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="plan_construction" name="plan_construction" accept="image/*" required onchange="previewImage(event)">
                                @if ($treeProtection->plan_construction)
                                    <small><a href="{{ asset('storage/' . $treeProtection->plan_construction) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="noc_letter">NOC Letter <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="noc_letter" name="noc_letter" accept="image/*" required onchange="previewImage(event)">
                                @if ($treeProtection->noc_letter)
                                    <small><a href="{{ asset('storage/' . $treeProtection->noc_letter) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid paid_receipt_err"></span>
                            </div>


                            <label class="col-form-label" for="is_correct_info"><b>Terms And Conditions</b></label>

                            <br>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="selectAll" name="select_all">
                                    <label class="form-check-label ms-2" for="selectAll">
                                        Select All
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item1" value="1">
                                    <label class="form-check-label">In case of any kind of accident or loss of life or damage to government and private property and damage to electric wire, phone wire, cable etc. while cutting the said tree, it will be the responsibility of the applicant to compensate the same.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item2" value="2">
                                    <label class="form-check-label">In case of any kind of dispute regarding the ownership of the land or the trees or if any objection or objection is raised by the interested parties, the applicant will be responsible for the same.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">Under the provisions of section 8 sub-section 3 (c) of the Maharashtra Urban Area Tree Preservation Act, 1975, the act of felling a tree shall remain valid for one month from the date of the said permission.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">After pruning the tree, the branches, leaves and wood chips of the tree should be picked up immediately.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">In the presence of the garden assistant of the park department or the representative of the park department, the process of cutting the said tree should be done.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">It should be noted that in case of pruning of tree branches in excess of the permit, legal action will be taken against you as per the rules for violation of Section 21 (1) of the Maharashtra (Urban Area) Protection and Preservation of Trees Act, 1975.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">If there are birds, nests of birds on the trees, they should be shifted to a suitable place with the advice of wildlife experts. So that vigilance should be taken to ensure that there is no loss/damage to biodiversity at that place. It should also be noted that in case of any such damage/accident, the applicant will be fully responsible for it.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">Tree trimming should not be done on Sundays and public holidays.</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkItem" name="item3" value="3">
                                    <label class="form-check-label">If the above conditions are acceptable, the tree should be felled.</label>
                                </div>


                                <!-- JavaScript to handle select all functionality -->
                                <script>
                                    document.getElementById('selectAll').addEventListener('change', function() {
                                        let checkboxes = document.querySelectorAll('.checkItem');
                                        checkboxes.forEach(checkbox => {
                                            checkbox.checked = this.checked;
                                        });
                                    });
                                </script>


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
        var updateUrl = '{{ route('tree-protection.update', $treeProtection->id) }}';
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
