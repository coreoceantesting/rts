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

                            <div class="col-md-3">
                                <label class="col-form-label" for="title_of_application">Title of Applicant<span class="text-danger">*</span></label>
                                <select name="title_of_application" id="title_of_application" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="mr">Mr</option>
                                    <option value="mrs">Mrs</option>
                                    <option value="ms">Ms</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="f_name">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="m_name">Middle Name</label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="l_name">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            {{-- <div class="col-md-4">
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
                            </div> --}}

                            <div class="col-md-3">
                                <label class="col-form-label" for="flat_no">Plot/Flat No <span class="text-danger">*</span></label>
                                <input class="form-control" id="flat_no" name="flat_no" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="building_no">Name of the Building/Colony<span class="text-danger">*</span></label>
                                <input class="form-control" id="building_no" name="building_no" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="area">Name of the Area<span class="text-danger">*</span></label>
                                <input class="form-control" id="area" name="area" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="city">Name of City<span class="text-danger">*</span></label>
                                <input class="form-control" id="city" name="city" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="pincode">Pin Code<span class="text-danger">*</span></label>
                                <input class="form-control" id="pincode" name="pincode" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Pincode" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="landmark">Near By Landmark<span class="text-danger">*</span></label>
                                <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="gut_number">City Survey/ Gut Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="gut_number" name="gut_number" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="mobile_num">Mobile No</label><span class="text-danger">*</span>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" required>
                                <span class="text-danger is-invalid email_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Type of Applicant <span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Citizen" required>
                                        <label class="form-check-label" for="citizen">Citizen</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Builder">
                                        <label class="form-check-label" for="builder">Builder</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="type_application" value="Advertising Media">
                                        <label class="form-check-label" for="advertising">Advertising Media</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_application" id="other" value="Other">
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label">Reason For Trimming <span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Citizen" required>
                                        <label class="form-check-label" for="citizen">Trimming Down Dangerous Branches</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Builder">
                                        <label class="form-check-label" for="builder">Obstruction To Electrical Wires</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Advertising Media">
                                        <label class="form-check-label" for="advertising">Obstruction To Construction</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="reason_trim" id="reason_trim" value="Advertising Media">
                                        <label class="form-check-label" for="advertising">Obstruction To Hoardings</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="applicant_type" id="other" value="Other">
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="owner">Type of Owner<span class="text-danger">*</span></label>
                                <select name="owner" id="owner" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="private">Private</option>
                                    <option value="corporation">Corporation</option>
                                    <option value="government">Government</option>
                                    <option value="semi_govt">Semi Govt</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="type_of_tree">Type of Tree<span class="text-danger">*</span></label>
                                <select name="type_of_tree" id="type_of_tree" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="fruit">Fruit Tree</option>
                                    <option value="other">Other Tree</option>

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
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="photo_tree">Photograph of Tree <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="photo_tree" name="photo_tree" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="aadhar">Aadhaar Card <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="aadhar" name="aadhar" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="building_permission">Building Permission</label>
                                <input type="file" class="form-control" id="building_permission" name="building_permission" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="plan_construction">Sanctioned Plan of Construction <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="plan_construction" name="plan_construction" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="noc_letter">NOC Letter <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="noc_letter" name="noc_letter" accept="image/*" required onchange="previewImage(event)">
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
        $.ajax({
            url: '{{ route('tree-protection.store') }}',
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#selectAll').change(function() {
            $('.checkItem').prop('checked', $(this).prop('checked'));
        });
    });
</script>
