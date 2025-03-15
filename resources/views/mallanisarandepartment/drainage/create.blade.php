<x-admin.layout>
    <x-slot name="title">To issue drainage / sewer connection / ड्रेनेज / सीवर कनेक्शन देणे</x-slot>
    <x-slot name="heading">To issue drainage / sewer connection / ड्रेनेज / सीवर कनेक्शन देणे</x-slot>

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
                            <div class="mb-4 row">
                                <div class="alert alert-warning fw-bold" role="alert">
                                    Applicant Details
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="connection_type">Connection Type (कनेक्शन प्रकार)<span class="text-danger">*</span></label>
                                    <select class="form-select" name="connection_type" id="connection_type">
                                        <option value="">Select</option>
                                        <option value="New Connection">New Connection (नवीन कनेक्शन)</option>
                                        <option value="Old Connection">Old Connection (जुने कनेक्शन)</option>
                                        <option value="Re-Connection">Re-Connection (पुनर्रजोडणी)</option>
                                    </select>
                                    <span class="text-danger is-invalid connection_type_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="conn_property_type">Connection Property Type (कनेक्शन मालमत्ता प्रकार)<span class="text-danger">*</span></label>
                                    <select class="form-select" name="conn_property_type" id="conn_property_type">
                                        <option value="">Select</option>
                                        <option value="Residential">Residential (निवासी)</option>
                                        <option value="Residential+ Commercial">Residential+ Commercial (निवासी + व्यावसायिक)<span class="text-danger">*</span></option>
                                        <option value="Individual">Individual (वैयक्तिक)</option>
                                        <option value="Educational">Educational (शैक्षणिक)</option>
                                        <option value="Other">Other (इतर)</option>
                                    </select>
                                    <span class="text-danger is-invalid conn_property_type_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="application_category">Applicant Category (अर्जदाराचा प्रकार )<span class="text-danger">*</span></label>
                                    <select class="form-select" name="application_category" id="application_category">
                                        <option value="">Select</option>
                                        <option value="Owner">Owner (मालक)</option>
                                        <option value="Tenentl">Tenent (भाडेकरू)</option>
                                        <option value="GPA Holder">GPA Holder (GPA धारक)</option>
                                        <option value="Other">Other (इतर)</option>
                                    </select>
                                    <span class="text-danger is-invalid application_category_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="title">Title (शीर्षक )<span class="text-danger">*</span></label>
                                    <select class="form-select" name="title" id="title">
                                        <option value="">Select</option>
                                        <option value="Mr">Mr (श्री)</option>
                                        <option value="Mrs">Mrs (सौ)</option>
                                        <option value="Ms">Ms (कु)</option>
                                    </select>
                                    <span class="text-danger is-invalid title_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="f_name">First Name (पहिले नाव )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First name">
                                    <span class="text-danger is-invalid f_name_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="m_name">Middle Name(मधले नाव )</label>
                                    <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle name">
                                    <span class="text-danger is-invalid m_name_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="l_name">Last Name(आडनाव)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last name">
                                    <span class="text-danger is-invalid l_name_err"></span>
                                </div>



                                <div class="col-md-3">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                    <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="email">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email" required>
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No(आधार कार्ड)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" placeholder="Enter Aadharcard Number" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>


                                <div class="col-md-3">
                                    <label class="col-form-label" for="gender">Gender (लिंग )<span class="text-danger">*</span></label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="">Select</option>
                                        <option value="Male">Male(पुरुष)</option>
                                        <option value="Female">Female (स्त्रि)</option>
                                        <option value="Transgender">Transgender (ट्रान्सजेंडर)</option>
                                    </select>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="age">Age (In Years) (वय (वर्षांमध्ये) )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="age" name="age" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="4" minlength="4" placeholder="" required>
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="address">Property Address (मालमत्तेचा पत्ता ) <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder=" " required></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="landmark">Landmark (लँडमार्क )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="" required>
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="permanent_address">Permanent Adrress(कायमचा पत्ता )<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="permanent_address" id="permanent_address" cols="30" rows="2" placeholder=" " required></textarea>
                                    <span class="text-danger is-invalid permanent_address_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="city_name">City Name(शहराचे नाव )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_name" name="city_name" type="text" placeholder="" required>
                                    <span class="text-danger is-invalid city_name_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="pincode">Pin Code (पिन कोड )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="number" placeholder="" required>
                                    <span class="text-danger is-invalid pincode_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="state">State(राज्य )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="state" name="state" type="text" placeholder="" required>
                                    <span class="text-danger is-invalid state_err"></span>
                                </div>

                            </div>

                            <div class="mb-3 row">
                                <div class="mb-4 row">
                                    <div class="alert alert-warning fw-bold" role="alert">
                                        Property Details
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="csmc_prop_no">CSMC Property No (CSMC मालमत्ता क्र.)<span class="text-danger">*</span> </label>
                                        <input class="form-control" id="csmc_prop_no" name="csmc_prop_no" type="text" placeholder="" required>
                                        <span class="text-danger is-invalid csmc_prop_no_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="cts_no">CTS NO/Gut No (सीटीएस क्र)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="cts_no" name="cts_no" type="number" placeholder="" required>
                                        <span class="text-danger is-invalid cts_no_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                        <select class="form-select" name="Zone" id="zone" required>
                                            <option value="">Select Zone</option>
                                            @foreach ($zones as $zone)
                                                <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger is-invalid zone_err"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label" for="ward_no">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                        <select class="form-select" name="ward_no" id="ward_no" required>
                                            <option value="">Select Ward Area</option>
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->name }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger is-invalid ward_no_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="detail_address">Detailed Address (संपूर्ण पत्ता)<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="detail_address" id="detail_address" cols="30" rows="2" placeholder=" " required></textarea>
                                        <span class="text-danger is-invalid detail_address_err"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label" for="lacality">Locality (जवळचा परिसर) <span class="text-danger">*</span></label>
                                        <input class="form-control" id="lacality" name="lacality" type="text" placeholder="">
                                        <span class="text-danger is-invalid lacality_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="longitude">GIS Co-ordinates (Longitude)(जीआयएस को-ऑर्डिनेट्स (Longitude))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="longitude" name="longitude" type="text" placeholder="">
                                        <span class="text-danger is-invalid longitude_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="lattitude">GIS Co-ordinates (Lattitude)(जीआयएस को-ऑर्डिनेट्स (Lattitude))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="lattitude" name="lattitude" type="text" placeholder="">
                                        <span class="text-danger is-invalid lattitude_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="near_landmark">Nearest Landmark (जवळची खूण)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="near_landmark" name="near_landmark" type="text" placeholder="">
                                        <span class="text-danger is-invalid near_landmark_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="property_city">City(शहर) <span class="text-danger">*</span></label>
                                        <input class="form-control" id="property_city" name="property_city" type="text" placeholder="">
                                        <span class="text-danger is-invalid property_city_err"></span>
                                    </div>


                                    <div class="col-md-3">
                                        <label class="col-form-label" for="property_state">State(राज्य)<span class="text-danger">*</span> </label>
                                        <input class="form-control" id="property_state" name="property_state" type="text" placeholder="">
                                        <span class="text-danger is-invalid property_state_err"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label" for="property_pincode">Pin code(पिन कोड)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="property_pincode" name="property_pincode" type="number" placeholder="">
                                        <span class="text-danger is-invalid property_pincode_err"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label" for="place_business">Place of Business(व्यवसायाचे ठिकाण)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="place_business" name="place_business" type="number" placeholder="">
                                        <span class="text-danger is-invalid place_business_err"></span>
                                    </div>


                                </div>
                            </div>
                            <div class="mb-3 row">

                                <div class="mb-4 row">
                                    <div class="alert alert-warning fw-bold" role="alert">
                                        Drainage Connection Detail
                                    </div>


                                    <div class="col-md-4">
                                        <label class="col-form-label" for="sewer_diameter">CSMC Nearest Sewer Diameter ( in mm)(CSMC जवळील गटार व्यास (मिमी मध्ये))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="sewer_diameter" name="sewer_diameter" type="number" placeholder="">
                                        <span class="text-danger is-invalid sewer_diameter_err"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label" for="branch_line">Branch Line (MM)(शाखा रेखा (MM))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="branch_line" name="branch_line" type="number" placeholder="">
                                        <span class="text-danger is-invalid branch_line_err"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label" for="sewer_line">Apply For Diameter of Connection (in MM) (कनेक्शनच्या डायमीटरसाठी अर्ज करा (MM मध्ये))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="diameter_connection" name="diameter_connection" type="number" placeholder="">
                                        <span class="text-danger is-invalid diameter_connection_err"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label" for="sewer_line">Distance From CSMC Sewer Line (In Mtr) (CSMC सीवर लाइनपासून अंतर (मीटर मध्ये))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="sewer_line" name="sewer_line" type="number" placeholder="">
                                        <span class="text-danger is-invalid sewer_line_err"></span>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="col-form-label" for="csmc_connection">Difference Of Level Between CSMC MH & Connection (in Mtr) (csmc MH आणि कनेक्शन मधील पातळीतील फरक (मीटर मध्ये))<span class="text-danger">*</span></label>
                                        <input class="form-control" id="csmc_connection" name="csmc_connection" type="number" placeholder="">
                                        <span class="text-danger is-invalid csmc_connection_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">


                                <div class="mb-4 row">
                                    <div class="alert alert-warning fw-bold" role="alert">
                                        Plumber Details
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label" for="name_plumber">Name of Plumber (प्लंबरचे नाव)<span class="text-danger">*</span></label>
                                        <select class="form-select" name="name_plumber" id="name_plumber">
                                            <option value="">Select</option>
                                            <option value="1">Mr. Ashok Pandharinath Kharat</option>
                                            <option value="2">Mr. Sheikh Afif Sheikh Abdul Rahman</option>
                                            <option value="3">Mr. Laxman Limbaji Sathe</option>
                                        </select>
                                        <span class="text-danger is-invalid name_plumber_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">

                                <div class="alert alert-warning fw-bold" role="alert">
                                    Documents Attachment List
                                </div>
                                <div class="alert alert-info fw-bold" role="alert">
                                    Note:(टीप) Upload Below Files only pdf, .jpg, .jpeg, .bmp Max upto 5MB. ( खाली फक्त pdf, .jpg, .jpeg, .bmp इत्यादी फाइल अपलोड करा. कमाल 5MB पर्यंत.)
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="property_tax">Property Tax Upto Current year (चालू वर्षापर्यंत मालमत्ता कर)</label>
                                    <input class="form-control" id="property_tax" name="property_taxs" type="file" required>
                                    <span class="text-danger is-invalid property_tax_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="property_photo">Property Photo With Lat /Long(अक्षांश/लांब सह मालमत्ता फोटो) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_photo" name="property_photos" type="file" required>
                                    <span class="text-danger is-invalid property_photo_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="water_tax">Water Tax Upto Current Year (चालू वर्षापर्यंत पाणी कर)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="water_tax" name="water_taxs" type="file" required>
                                    <span class="text-danger is-invalid water_tax_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="passport_size_photo">Owner/Tenant Passport Size Photo ( Colour) (मालक/भाडेकरूचा पासपोर्ट आकाराचा फोटो (रंगीत))<span class="text-danger">*</span></label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photos" type="file">
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>


                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="aadharcard_photo">Aadhaar Card (आधार कार्ड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadharcard_photo" name="aadharcard_photos" type="file">
                                    <span class="text-danger is-invalid aadharcard_photo_err"></span>
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
            url: '{{ route('drainage.store') }}',
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
