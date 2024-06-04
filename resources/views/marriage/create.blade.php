<x-layout>
    <x-slot name="title">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot>
    {{-- <x-slot name="heading">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot> --}}


    
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 text-dark" style="font-weight: 600">
                                ISSUANCE OF MARRIAGE REGISTRATION CERTIFICATE / विवाह नोंदणी प्रमाणपत्र देणे
                            </h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="step-arrow-nav mb-4">
                                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="marriage-registration-form-tab" data-bs-toggle="pill" data-bs-target="#marriage-registration-form" type="button" role="tab" aria-controls="marriage-registration-form" aria-selected="true">Marriage Registration Form (विवाह नोंदणी फॉर्म)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="marriage-registration-details-tab" data-bs-toggle="pill" data-bs-target="#marriage-registration-details" type="button" role="tab" aria-controls="marriage-registration-details-form" aria-selected="false">Marriage Registration Details (विवाह नोंदणी माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="groom-information-tab" data-bs-toggle="pill" data-bs-target="#groom-information" type="button" role="tab" aria-controls="groom-information" aria-selected="false">Groom Information (वराची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="bride-information-tab" data-bs-toggle="pill" data-bs-target="#bride-information" type="button" role="tab" aria-controls="bride-information" aria-selected="false">Bride Information (वधूची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="priest-information-tab" data-bs-toggle="pill" data-bs-target="#priest-information" type="button" role="tab" aria-controls="priest-information" aria-selected="false">Priest Information (पुरोहिताची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="witness-information-tab" data-bs-toggle="pill" data-bs-target="#witness-information" type="button" role="tab" aria-controls="witness-information" aria-selected="false">Witness Information (साक्षीदाराची माहिती)</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="marriage-registration-form" role="tabpanel" aria-labelledby="marriage-registration-form-tab">
                                    <form name="marriageRegistrationForm" id="marriageRegistrationForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Mobile Number (अर्जदाराचा मोबाईल क्रमांक) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" oninput="this.value = this.value.replace(/\D/g, '')" name="applicant_mobile_number" placeholder="Enter applicant mobile number" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Full Name (अर्जदाराचे पूर्ण नाव)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="applicant_full_name" placeholder="Enter applicant full name" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Home Address (अर्जदाराच्या घराचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="applicant_home_address" placeholder="Enter applicant home address"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="pincode" placeholder="Enter pincode" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant E-mail (अर्जदाराचा ई-मेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="applicant_email" placeholder="Enter applicant email" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. (आधार कार्ड क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="aadhar_card_no" placeholder="Enter aadhar card no." />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant alternate Mobile Number (अर्जदाराचा पर्यायी मोबाईल क्रमांक)</label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="applicant_alternate_mobile_number" placeholder="Enter applicant alternate mobile number" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pan Card No. (पॅन कार्ड क्र.) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="pan_card_no" placeholder="Enter pan card no." />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Ward Name (रहिवाशीच्या प्रभागाचे नाव) <span class="text-danger">*</span></label>
                                                    <select name="residential_ward_name" class="form-select">
                                                        <option value="">Select Ward</option>
                                                        <option value="1">Kharghar</option>
                                                        <option value="2">Kalamboli</option>
                                                        <option value="3">Kamothe</option>
                                                        <option value="4">Panvel</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage solemnized within Maharashtra State? (विवाह सोहळा महाराष्ट्र राज्यात झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="marriage_solemnized_within_maharashtra_state" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Affidavit for Marriage Outside Maharashtra <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="affidavit_for_marriage_outside_maharashtra" placeholder="Enter affidavit for marriage outside maharashtra" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="marriageRegistrationFormBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="marriage-registration-details" role="tabpanel" aria-labelledby="marriage-registration-details-tab">
                                    <form name="marriageRegistrationDetails" id="marriageRegistrationDetails" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Form Filled Date (फॉर्म भरण्याची तारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ date('Y-m-d') }}" class="form-control datepicker" name="form_filled_date" placeholder="Enter form filled date" autocomplete="off" readonly />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Date in English (लग्नाची तारीख इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="marriage_date_in_english" placeholder="Enter marriage date in english" max="{{ date('Y-m-d') }}" autocomplete="off" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Date in Marathi (लग्नाची तारीख मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="marriage_date_in_marathi" placeholder="Enter marriage date in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Place, Full Address in English (इंग्रजीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="marriage_place_in_english" placeholder="Enter marriage place, full address in english" ></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Place, Full Address in Marathi (मराठीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="marriage_place_in_marathi" placeholder="Enter marriage place, full address in marathi"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Couple Photo of Wedding (लग्न विधी चा फोटो) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="couple_photo_of_wedding" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Husband/Wife Widower/Widow? (वर/वधू -- विधुर / विधवा आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="is_husband_wife_widower_widow" class="form-select">
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Husband/Wife previously divorced? (वर वधू यांचे घटस्पोट झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="is_husband_wife_previously_divorced" class="form-select">
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Marriage Intercaste?  (आंतरजातीय विवाह झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="is_marriage_intercaste" class="form-select">
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Wedding card Image. If not available, attach Affidavit (लग्न पत्रिका चा फोटो नसल्यास, प्रतिज्ञापत्र जोडावे ) <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="File" class="form-control" name="wedding_card_image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="marriageRegistrationDetailsBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="groom-information" role="tabpanel" role="tabpanel" aria-labelledby="groom-information-tab">
                                    <form name="groomInformation" id="groomInformation" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_english" placeholder="Enter first name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_english" placeholder="Enter middle name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_english" placeholder="Enter last name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_marathi" placeholder="Enter first name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_marathi" placeholder="Enter middle name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_marathi" placeholder="Enter last name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address_in_english" placeholder="Enter address in english"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="pincode" placeholder="Enter pincode" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="pincode_in_marathi" placeholder="Enter pincode in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="mobile_no" placeholder="Enter mobile no." />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="email" placeholder="Enter email" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="aadhar_card_no" placeholder="Enter aadhar card no." />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="date_of_birth" placeholder="Select date of birth" autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="age" placeholder="Enter age" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                    <select name="religion_by_birth" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Christian</option>
                                                        <option value="7">Parsi</option>
                                                        <option value="8">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                    <select name="religion_by_adoption" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Christian</option>
                                                        <option value="7">Parsi</option>
                                                        <option value="8">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Groom Photo (वराचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_photo" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="id_proof" class="form-select">
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                        <option value="5">Pan Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="residential_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Ration Card</option>
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="age_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Birth Certificate</option>
                                                        <option value="2">School Leaving Certificate</option>
                                                        <option value="3">SSC Board Certificate</option>
                                                        <option value="4">HSC Board Certificate</option>
                                                        <option value="5">Higher Education</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_id_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_residential_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_age_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_signature" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                    <select name="previous_status" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Unmarried</option>
                                                        <option value="2">Widow/Widower</option>
                                                        <option value="3">Divorce</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="previous_status_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_previous_status_proof" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="groomInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="bride-information" role="tabpanel" aria-labelledby="bride-information-tab">
                                    <form name="brideInformation" id="brideInformation" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_english" placeholder="Enter first name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_english" placeholder="Enter middle name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_english" placeholder="Enter last name in english" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_marathi" placeholder="Enter first name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_marathi" placeholder="Enter middle name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_marathi" placeholder="Enter last name in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address_in_english" placeholder="Enter address in english"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="pincode" placeholder="Enter pincode" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="pincode_in_marathi" placeholder="Enter pincode in marathi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="mobile_no" placeholder="Enter mobile no" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="email" placeholder="Enter email" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="aadhar_card_no" placeholder="Enter name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="date_of_birth" autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="age" placeholder="Enter age" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                    <select name="religion_by_birth" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Christian</option>
                                                        <option value="7">Parsi</option>
                                                        <option value="8">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                    <select name="religion_by_adoption" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Christian</option>
                                                        <option value="7">Parsi</option>
                                                        <option value="8">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Bride Photo (वधूचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_photo"  />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="id_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <!--<option value="1">Ration Card</option>-->
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                        <option value="5">Pan Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="residential_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Ration Card</option>
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="age_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Birth Certificate</option>
                                                        <option value="2">School Leaving Certificate</option>
                                                        <option value="3">SSC Board Certificate</option>
                                                        <option value="4">HSC Board Certificate</option>
                                                        <option value="5">Higher Education</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_id_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_residential_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_age_proof" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="name" placeholder="Enter name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                    <select name="previous_status" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Unmarried</option>
                                                        <option value="2">Widow/Widower</option>
                                                        <option value="3">Divorce</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="previous_status_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_previous_status_proof" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="brideInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->


                                <div class="tab-pane fade" id="priest-information" role="tabpanel" aria-labelledby="priest-information-tab">
                                    <form name="priestInformation" id="priestInformation" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_english" placeholder="Enter first name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_english" placeholder="Enter middle name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_english" placeholder="Enter last name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name_in_marathi" placeholder="Enter first name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="middle_name_in_marathi" placeholder="Enter middle name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name_in_marathi" placeholder="Enter last name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="address_in_english" placeholder="Enter address in english"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="address_in_marathi" placeholder="Enter name"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="mobile_no" placeholder="Enter mobile no" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="age" placeholder="Enter age" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion (धर्म) <span class="text-danger">*</span></label>
                                                    <select name="religion" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Other</option>
                                                        </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="upload_signature" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="priestInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->


                                <div class="tab-pane fade" id="witness-information" role="tabpanel" aria-labelledby="witness-information-tab">
                                    <form name="witnessInformation" id="witnessInformation" enctype="multipart/form-data">
                                        @csrf
                                        <h5 style="font-weight: 800;" class="text-dark">First Witness Information (प्रथम साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_full_name_in_english" placeholder="Enter full name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_full_name_in_marathi" placeholder="Enter full name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="first_witness_mobile_no" placeholder="Enter mobile no" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="first_witness_date_of_birth" placeholder="Select date of birth" autocomplete="off" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="first_witness_age" placeholder="Enter age" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="first_witness_gender" class="form-select">
                                                        <option value="">Select gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_relation" placeholder="Enter relation" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="first_witness_address" placeholder="Enter address"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="first_witness_address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="first_witness_id_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_witness_photo" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_upload_signature" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_upload_document" />
                                                </div>
                                            </div>
                                        </div>



                                        <h5 style="font-weight: 800;" class="text-dark">Second Witness Information (दुसऱ्या साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_full_name_in_english" placeholder="Enter full name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_full_name_in_marathi" placeholder="Enter full name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="second_witness_mobile_no" placeholder="Enter mobile no" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="second_witness_date_of_birth" placeholder="Select date of birth" autocomplete="off" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="second_witness_age" placeholder="Age" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="second_witness_gender" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_relation" placeholder="Enter relation" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="second_witness_address_in_english" placeholder="Enter address in english"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="second_witness_address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="second_witness_id_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_photo" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_upload_signature" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_upload_document" />
                                                </div>
                                            </div>
                                        </div>


                                        <h5 style="font-weight: 800;" class="text-dark">Third Witness Information (तिसरा साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_full_name_in_english" placeholder="Enter full name in english" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_full_name_in_marathi" placeholder="Enter full name in marathi" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="third_witness_mobile_no" placeholder="Enter mobile no" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="third_witness_date_of_birth" placeholder="Enter date of birth" autocomplete="off" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="third_witness_age" placeholder="Enter age" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="third_witness_gender" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_relation" placeholder="Enter relation" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="third_witness_address_in_english" placeholder="Enter address in english"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="third_witness_address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="third_witness_id_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_photo" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_upload_signature" />
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_upload_document" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="witnessInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</x-layout>


{{-- Add marriage registration form --}}
<script>
    $("#marriageRegistrationForm").submit(function(e) {
        e.preventDefault();
        $("#marriageRegistrationFormBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-marriage-registration-form') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#marriageRegistrationFormBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#marriageRegistrationFormBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#marriageRegistrationFormBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add marriage registration form --}}


{{-- Add marriage registration details --}}
<script>
    $("#marriageRegistrationDetails").submit(function(e) {
        e.preventDefault();
        $("#marriageRegistrationDetailsBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-marriage-registration-details') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#marriageRegistrationDetailsBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#marriageRegistrationDetailsBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#marriageRegistrationDetailsBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add marriage registration details --}}


{{-- Add groom information --}}
<script>
    $("#groomInformation").submit(function(e) {
        e.preventDefault();
        $("#groomInformationBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-groom-information') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#groomInformationBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#groomInformationBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#groomInformationBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add groom information --}}

{{-- Add bride information --}}
<script>
    $("#brideInformation").submit(function(e) {
        e.preventDefault();
        $("#brideInformationBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-bride-information') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#brideInformationBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#brideInformationBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#brideInformationBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add bride information --}}

{{-- Add priest information --}}
<script>
    $("#priestInformation").submit(function(e) {
        e.preventDefault();
        $("#priestInformationBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-priest-information') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#priestInformationBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#priestInformationBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#priestInformationBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add bride information --}}

{{-- Add witness information --}}
<script>
    $("#witnessInformation").submit(function(e) {
        e.preventDefault();
        $("#witnessInformationBtn").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('marriage-registration.store-witness-information') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data) {
                $("#witnessInformationBtn").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        console.log(data)
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#witnessInformationBtn").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#witnessInformationBtn").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });
</script>
{{-- End of add bride information --}}