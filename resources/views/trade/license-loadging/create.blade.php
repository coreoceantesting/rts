<x-admin.layout>
    <x-slot name="title">Licensing Of Lodging Houses/ लॉजिंग हाऊस परवाना देणे</x-slot>
    <x-slot name="heading">Licensing Of Lodging Houses/ लॉजिंग हाऊस परवाना देणे</x-slot>

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
                            <div class="alert alert-warning fw-bold" role="alert">
                                प्राथमिक माहिती/Basic information
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="shop_name">दुकानाचे नाव इंग्रजी<span class="text-danger">*</span></label>
                                <input class="form-control" id="shop_name" name="shop_name" type="text" placeholder="Enter Shop name  in English" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="marathi_shop_name"> दुकानाचे नाव मराठी<span class="text-danger">*</span></label>
                                <input class="form-control" id="marathi_shop_name" name="marathi_shop_name" type="text" placeholder="Enter Shop name Marathi" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pencard_num"> पैन कार्ड क्रमांक </label>
                                <input class="form-control" id="pencard_num" name="pencard_num" type="text" placeholder="Enter Pancard Number">
                                <span class="text-danger is-invalid pancard_number_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="e_mail">ई-मेल</label>
                                <input class="form-control" id="e_mail" name="e_mail" type="email" placeholder="Enter Email">
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="address">दुकानाचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Applicant Address" required type="text"></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward_area" id="ward_area" required>
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_area_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="financial_year">License Financial From Year</label>
                                <select class="form-control" id="financial_year" name="financial_year" required>
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="to_year"> To Year</label>
                                <select class="form-control" id="to_year" name="to_year" required>
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="amount">रक्कम<span class="text-danger">*</span></label>
                                <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">वस्तू निर्मित आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="होय" required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="नाही">
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">स्वते चे: मालकीचे जागेत व्यवसाय करीत आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="होय" required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="नाही">
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="owner_place">जागा मालकीचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="owner_place" name="owner_place" type="text" placeholder="Enter Name of the owner of the place" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="address_owner_premises">जागा मालकाचा पत्ता<span class="text-danger">*</span></label>
                                <input class="form-control" id="address_owner_premises" name="address_owner_premises" type="text" placeholder="Enter Name of the owner of the place" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="rental_agreement">भाडे करार कोणासोबत केलेले आहे<span class="text-danger">*</span></label>
                                <input class="form-control" id="rental_agreement" name="rental_agreement" type="text" placeholder="Enter rental agreement" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="area_used">वापरात आलेले जागेचे क्षेत्र चौ. फु. मध्ये<span class="text-danger">*</span></label>
                                <input class="form-control" id="area_used" name="area_used" type="number" placeholder="Enter" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">व्यवसायासाठी म. न. पा. चे नाहरकत प्रमाणपत्र घेतले आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="होय" required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="नाही">
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_start">व्यवसाय सुरु केल्याचे वर्ष<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_start" name="business_start" type="number" placeholder="Year of business start" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="registration_no">शॉप ऍक्ट नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="registration_no" name="registration_no" type="number" placeholder="" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="food_drug">अन्न व ओषध प्रशासन कायद्यान्वये नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="food_drug" name="food_drug" type="text" placeholder="" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="alert alert-warning fw-bold" role="alert">
                                संचालक माहिती/ Director information
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_num">संचालकांचा आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="number" placeholder="Enter Aadhar Card No">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="director_name">संचालकांचा नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_name" name="director_name" type="text" placeholder="Enter Director Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="contact_no">संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="contact_no" name="contact_no" type="number" placeholder="Enter  Number" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_email">ई-मेल.<span class="text-danger">*</span></label>
                                <input class="form-control" id="alternet_email" name="alternet_email" type="email" placeholder="Enter  Number" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_address">पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alternet_address" id="alternet_address" cols="30" rows="2" placeholder="Enter Address" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label">लिंग<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="स्त्री" required>
                                        <label class="form-check-label" for="स्त्री">स्त्री</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="पुरुष">
                                        <label class="form-check-label" for="पुरुष">पुरुष</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="ईतर">
                                        <label class="form-check-label" for="ईतर">ईतर</label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="application_type">अर्जदार प्रकार</label>
                                <select class="form-select" name="application_type" id="application_type">
                                    <option value="">Select Option</option>
                                    <option value="1">परितक्ता</option>
                                    <option value="2">प्रकल्पग्रस्त</option>
                                    <option value="3">पूरग्रस्त</option>
                                    <option value="4">अपंग</option>
                                    <option value="5">विधवा </option>
                                    <option value="6">सामान्य </option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="director_photos">संचालकाचां फोटो<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_photos" name="director_photos" type="file" required>
                                <span class="text-danger is-invalid director_photos_err" required></span>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                कागदपत्र जोडणे/Attaching documents
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="upload_prescribed_formats">इतर कागद पत्रे (भागीदार फॉर्म_भाडेकरारनामा_एक्साईट परवाना)<span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" required type="file">
                                <span class="text-danger is-invalid upload_prescribed_formats_err" required></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">अग्निशमन नाहरकत प्रमाणपत्र<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file" required>
                                <span class="text-danger is-invalid place_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">बाजार परवाना (नुतनिकरणावेळेस)</label>
                                <input class="form-control" id="ownership" name="ownership" type="file" >
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">अन्न व औषध प्रशासन कायद्यान्वये नोंदणी प्रत</label>
                                <input class="form-control" id="water_bill" name="water_bills" type="file" >
                                <span class="text-danger is-invalid water_bills_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">शॉप ऍक्ट<span class="text-danger">*</span></label>
                                <input class="form-control" id="society" name="society" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">संचालकांचे पॅन कार्ड (मुळ प्रत)<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">संचालकांचे आधार कार्ड (मुळ प्रत)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">चालु वर्षाची कर पावती<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">दुकानाचे आतील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">दुकानाचे बाहेरील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
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
            url: '{{ route('trade-license-loading.store') }}',
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
