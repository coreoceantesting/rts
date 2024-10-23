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
                                        <button class="nav-link" id="marriage-registration-details-tab" data-bs-toggle="pill" data-bs-target="#marriage-registration-details" type="button" role="tab" disabled aria-controls="marriage-registration-details-form" aria-selected="false">Marriage Registration Details (विवाह नोंदणी माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="groom-information-tab" data-bs-toggle="pill" data-bs-target="#groom-information" type="button" role="tab" disabled aria-controls="groom-information" aria-selected="false">Groom Information (वराची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="bride-information-tab" data-bs-toggle="pill" data-bs-target="#bride-information" type="button" role="tab" disabled aria-controls="bride-information" aria-selected="false">Bride Information (वधूची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="priest-information-tab" data-bs-toggle="pill" data-bs-target="#priest-information" type="button" role="tab" disabled aria-controls="priest-information" aria-selected="false">Priest Information (पुरोहिताची माहिती)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="witness-information-tab" data-bs-toggle="pill" data-bs-target="#witness-information" type="button" role="tab" disabled aria-controls="witness-information" aria-selected="false">Witness Information (साक्षीदाराची माहिती)</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="marriage-registration-form" role="tabpanel" aria-labelledby="marriage-registration-form-tab">
                                    <form name="marriageRegistrationForm" id="marriageRegistrationForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Mobile Number (अर्जदाराचा मोबाईल क्रमांक) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10" name="registration_from_applicant_mobile_no" placeholder="Enter applicant mobile number" required />
                                                    <span class="text-danger is-invalid registration_from_applicant_mobile_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Full Name (अर्जदाराचे पूर्ण नाव)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="registration_from_applicant_full_name" placeholder="Enter applicant full name" required />
                                                    <span class="text-danger is-invalid registration_from_applicant_full_name_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant Home Address (अर्जदाराच्या घराचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="registration_from_applicant_home_address" placeholder="Enter applicant home address" required></textarea>
                                                    <span class="text-danger is-invalid registration_from_applicant_home_address_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="6" minlength="6" class="form-control" name="registration_from_pincode" placeholder="Enter pincode" required />
                                                    <span class="text-danger is-invalid registration_from_pincode_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant E-mail (अर्जदाराचा ई-मेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="registration_from_applicant_email" placeholder="Enter applicant email" required />
                                                    <span class="text-danger is-invalid registration_from_applicant_email_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. (आधार कार्ड क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="12" minlength="12"  class="form-control" name="registration_from_aadhar_card_no" placeholder="Enter aadhar card no." required />
                                                    <span class="text-danger is-invalid registration_from_aadhar_card_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Applicant alternate Mobile Number (अर्जदाराचा पर्यायी मोबाईल क्रमांक)</label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="registration_from_alternate_mobile_number" placeholder="Enter applicant alternate mobile number" />
                                                    <span class="text-danger is-invalid registration_from_alternate_mobile_number_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pan Card No. (पॅन कार्ड क्र.) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="registration_from_pan_card_no" placeholder="Enter pan card no." required />
                                                    <span class="text-danger is-invalid registration_from_pan_card_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Ward Name (रहिवाशीच्या प्रभागाचे नाव) <span class="text-danger">*</span></label>
                                                    <select name="registration_from_residential_ward_name" class="form-select" required>
                                                        <option value="">Select Ward</option>
                                                        <option value="1">Kharghar</option>
                                                        <option value="2">Kalamboli</option>
                                                        <option value="3">Kamothe</option>
                                                        <option value="4">Panvel</option>
                                                    </select>
                                                    <span class="text-danger is-invalid registration_from_residential_ward_name_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage solemnized within Maharashtra State? (विवाह सोहळा महाराष्ट्र राज्यात झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="registration_from_marriage_solemnized_within_maharashtra_state" id="registrationFromMarriageSolemnizedWithinMaharashtraState" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                    <span class="text-danger is-invalid registration_from_marriage_solemnized_within_maharashtra_state_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 d-none" id="registrationFromAffidavitForMarriageOutsideMaharashtras">
                                                <div class="mb-3">
                                                    <label class="form-label">Affidavit for Marriage Outside Maharashtra <br><span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="registration_from_affidavit_for_marriage_outside_maharashtras" placeholder="Enter affidavit for marriage outside maharashtra" />
                                                    <span class="text-danger is-invalid registration_from_affidavit_for_marriage_outside_maharashtras_err"></span>
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
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Form Filled Date (फॉर्म भरण्याची तारीख) <span class="text-danger">*</span></label>
                                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="registration_details_form_filled_date" placeholder="Enter form filled date" autocomplete="off" required readonly />
                                                    <span class="text-danger is-invalid registration_details_form_filled_date_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Date in English (लग्नाची तारीख इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="registration_details_marriage_date_in_english" placeholder="Enter marriage date in english" max="{{ date('Y-m-d') }}" autocomplete="off" required />
                                                    <span class="text-danger is-invalid registration_details_marriage_date_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Date in Marathi (लग्नाची तारीख मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="registration_details_marriage_date_in_marathi" placeholder="Enter marriage date in marathi" required />
                                                    <span class="text-danger is-invalid registration_details_marriage_date_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Place, Full Address in English (इंग्रजीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="registration_details_marriage_place_in_english" placeholder="Enter marriage place, full address in english" required></textarea>
                                                    <span class="text-danger is-invalid registration_details_marriage_place_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Marriage Place, Full Address in Marathi (मराठीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="registration_details_marriage_place_in_marathi" placeholder="Enter marriage place, full address in marathi" required></textarea>
                                                    <span class="text-danger is-invalid registration_details_marriage_place_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Couple Photo of Wedding (लग्न विधी चा फोटो) <br><span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="registration_details_couple_photos" required />
                                                    <span class="text-danger is-invalid registration_details_couple_photos_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Husband/Wife Widower/Widow? (वर/वधू -- विधुर / विधवा आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="registration_details_is_widow" class="form-select" required>
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                    <span class="text-danger is-invalid registration_details_is_widow_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Husband/Wife previously divorced? (वर वधू यांचे घटस्पोट झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="registration_details_is_previously_divorced" class="form-select" required>
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                    <span class="text-danger is-invalid registration_details_is_previously_divorced_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Is Marriage Intercaste?  (आंतरजातीय विवाह झाला आहे का ?) <span class="text-danger">*</span></label>
                                                    <select name="registration_details_is_marriage_intercaste" class="form-select" required>
                                                        <option value="">Select option</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                    <span class="text-danger is-invalid registration_details_is_marriage_intercaste_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Wedding card Image. If not available, attach Affidavit (लग्न पत्रिका चा फोटो नसल्यास, प्रतिज्ञापत्र जोडावे ) <br><span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="registration_details_wedding_card_images" required />
                                                    <span class="text-danger is-invalid registration_details_wedding_card_images_err"></span>
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
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_fname_in_english" placeholder="Enter first name in english" />
                                                    <span class="text-danger is-invalid groom_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_mname_in_english" placeholder="Enter middle name in english" />
                                                    <span class="text-danger is-invalid groom_info_mname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_lname_in_english" placeholder="Enter last name in english" />
                                                    <span class="text-danger is-invalid groom_info_lname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_fname_in_marathi" placeholder="Enter first name in marathi" />
                                                    <span class="text-danger is-invalid groom_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_mname_in_marathi" placeholder="Enter middle name in marathi" />
                                                    <span class="text-danger is-invalid groom_info_mname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_lname_in_marathi" placeholder="Enter last name in marathi" />
                                                    <span class="text-danger is-invalid groom_info_lname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="groom_info_address_in_english" placeholder="Enter address in english"></textarea>
                                                    <span class="text-danger is-invalid groom_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="groom_info_address_in_marathi" placeholder="Enter address in marathi"></textarea>
                                                    <span class="text-danger is-invalid groom_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="6" minlength="6" class="form-control" name="groom_info_pincode" placeholder="Enter pincode" />
                                                    <span class="text-danger is-invalid groom_info_pincode_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_pincode_in_marathi" placeholder="Enter pincode in marathi" maxlength="6" minlength="6" />
                                                    <span class="text-danger is-invalid groom_info_pincode_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="groom_info_mobile_no" placeholder="Enter mobile no." />
                                                    <span class="text-danger is-invalid groom_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="groom_info_email" placeholder="Enter email" />
                                                    <span class="text-danger is-invalid groom_info_email_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="12" minlength="12" class="form-control" name="groom_info_aadhar_card_no" placeholder="Enter aadhar card no." />
                                                    <span class="text-danger is-invalid groom_info_aadhar_card_no_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="groom_info_dob" id="gdate_of_birth" placeholder="Select date of birth" autocomplete="off" />
                                                    <span class="text-danger is-invalid groom_info_dob_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" id="gage" class="form-control" name="groom_info_age" placeholder="Enter age" />
                                                    <span class="text-danger is-invalid groom_info_age_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="groom_info_gender" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_gender_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_religion_by_birth" class="form-select">
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
                                                    <span class="text-danger is-invalid groom_info_religion_by_birth_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_religion_by_adoption" class="form-select">
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
                                                    <span class="text-danger is-invalid groom_info_religion_by_adoption_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Groom Photo (वराचा फोटो) <br><span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_photos" />
                                                    <span class="text-danger is-invalid groom_info_photos_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_id_proof" class="form-select">
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                        <option value="5">Pan Card</option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_id_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_residential_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Ration Card</option>
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_residential_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_age_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Birth Certificate</option>
                                                        <option value="2">School Leaving Certificate</option>
                                                        <option value="3">SSC Board Certificate</option>
                                                        <option value="4">HSC Board Certificate</option>
                                                        <option value="5">Higher Education</option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_age_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Id Proof (आयडी पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_id_proof_files" />
                                                    <span class="text-danger is-invalid groom_info_id_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Residential Proof (निवासी पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_residential_proof_files" />
                                                    <span class="text-danger is-invalid groom_info_residential_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Age Proof (वयाचा पुरावा)  <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_age_proof_files" />
                                                    <span class="text-danger is-invalid groom_info_age_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_upload_signatures" />
                                                    <span class="text-danger is-invalid groom_info_upload_signatures_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_previous_status" class="form-select" id="groomInfoPreviousStatus">
                                                        <option value="">Choose one</option>
                                                        <option value="1">Unmarried</option>
                                                        <option value="2">Widow/Widower</option>
                                                        <option value="3">Divorce</option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_previous_status_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 d-none" id="groomInfoPreviousStatusProof">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="groom_info_previous_status_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                        <option value="1"> Death Certificate </option>
                                                        <option value="2"> Decree &amp; Court Judgement </option>
                                                    </select>
                                                    <span class="text-danger is-invalid groom_info_previous_status_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 d-none" id="groomInfoUploadPreviousStatusProofs">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा)<br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="groom_info_upload_previous_status_proofs" />
                                                    <span class="text-danger is-invalid groom_info_upload_previous_status_proofs_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary d-none" id="groomInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="bride-information" role="tabpanel" aria-labelledby="bride-information-tab">
                                    <form name="brideInformation" id="brideInformation" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_fname_in_english" placeholder="Enter first name in english" required />
                                                    <span class="text-danger is-invalid bride_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_mname_in_english" placeholder="Enter middle name in english" required />
                                                    <span class="text-danger is-invalid bride_info_mname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_lname_in_english" placeholder="Enter last name in english" required />
                                                    <span class="text-danger is-invalid bride_info_lname_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_fname_in_marathi" placeholder="Enter first name in marathi" required />
                                                    <span class="text-danger is-invalid bride_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_mname_in_marathi" placeholder="Enter middle name in marathi" required />
                                                    <span class="text-danger is-invalid bride_info_mname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_lname_in_marathi" placeholder="Enter last name in marathi" required />
                                                    <span class="text-danger is-invalid bride_info_lname_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="bride_info_address_in_english" placeholder="Enter address in english" required></textarea>
                                                    <span class="text-danger is-invalid bride_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="bride_info_address_in_marathi" placeholder="Enter address in marathi" required></textarea>
                                                    <span class="text-danger is-invalid bride_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="6" minlength="6" class="form-control" name="bride_info_pincode" placeholder="Enter pincode" required />
                                                    <span class="text-danger is-invalid bride_info_pincode_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_pincode_in_marathi" maxlength="6" minlength="6" placeholder="Enter pincode in marathi" required />
                                                    <span class="text-danger is-invalid bride_info_pincode_in_marathi_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="bride_info_mobile_no" placeholder="Enter mobile no" required />
                                                    <span class="text-danger is-invalid bride_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="bride_info_email" placeholder="Enter email" required />
                                                    <span class="text-danger is-invalid bride_info_email_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="12" minlength="12" class="form-control" name="bride_info_aadhar_card_no" placeholder="Enter name" required />
                                                    <span class="text-danger is-invalid bride_info_aadhar_card_no_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="bride_info_dob" id="bdate_of_birth" autocomplete="off" required />
                                                    <span class="text-danger is-invalid bride_info_dob_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="bride_info_age" placeholder="Enter age" id="bage" required />
                                                    <span class="text-danger is-invalid bride_info_age_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="bride_info_gender" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_gender_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_religion_by_birth" class="form-select" required>
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
                                                    <span class="text-danger is-invalid bride_info_religion_by_birth_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_religion_by_adoption" class="form-select" required>
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
                                                    <span class="text-danger is-invalid bride_info_religion_by_adoption_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Bride Photo (वधूचा फोटो) <br><span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_photos" required />
                                                    <span class="text-danger is-invalid bride_info_photos_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_id_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <!--<option value="1">Ration Card</option>-->
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                        <option value="5">Pan Card</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_id_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_residential_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Ration Card</option>
                                                        <option value="2">Aadhaar Card</option>
                                                        <option value="3">Passport</option>
                                                        <option value="4">Voter ID</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_residential_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_age_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Birth Certificate</option>
                                                        <option value="2">School Leaving Certificate</option>
                                                        <option value="3">SSC Board Certificate</option>
                                                        <option value="4">HSC Board Certificate</option>
                                                        <option value="5">Higher Education</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_age_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Id Proof (आयडी पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_id_proof_files" required />
                                                    <span class="text-danger is-invalid bride_info_id_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Residential Proof (निवासी पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_residential_proof_files" required />
                                                    <span class="text-danger is-invalid bride_info_residential_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Age Proof (वयाचा पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_age_proof_files" required />
                                                    <span class="text-danger is-invalid bride_info_age_proof_files_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_upload_signatures" placeholder="Enter name" required />
                                                    <span class="text-danger is-invalid bride_info_upload_signatures_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_previous_status" class="form-select" id="brideInfoPreviousStatus" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Unmarried</option>
                                                        <option value="2">Widow/Widower</option>
                                                        <option value="3">Divorce</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_previous_status_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 d-none" id="brideInfoPreviousStatusProof">
                                                <div class="mb-3">
                                                    <label class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                    <select name="bride_info_previous_status_proof" class="form-select">
                                                        <option value="">Choose one</option>
                                                    </select>
                                                    <span class="text-danger is-invalid bride_info_previous_status_proof_err"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 d-none" id="brideInfoUploadPreviousStatusProofs">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <br><span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="bride_info_upload_previous_status_proofs" />
                                                    <span class="text-danger is-invalid bride_info_upload_previous_status_proofs_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary d-none" id="brideInformationBtn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end tab pane -->


                                <div class="tab-pane fade" id="priest-information" role="tabpanel" aria-labelledby="priest-information-tab">
                                    <form name="priestInformation" id="priestInformation" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_fname_in_english" placeholder="Enter first name in english" required />
                                                    <span class="text-danger is-invalid priest_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_mname_in_english" placeholder="Enter middle name in english" required />
                                                    <span class="text-danger is-invalid priest_info_mname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_lname_in_english" placeholder="Enter last name in english" required />
                                                    <span class="text-danger is-invalid priest_info_lname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_fname_in_marathi" placeholder="Enter first name in marathi" required />
                                                    <span class="text-danger is-invalid priest_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_mname_in_marathi" placeholder="Enter middle name in marathi" required />
                                                    <span class="text-danger is-invalid priest_info_mname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="priest_info_lname_in_marathi" placeholder="Enter last name in marathi" required />
                                                    <span class="text-danger is-invalid priest_info_lname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="priest_info_address_in_english" placeholder="Enter address in english" required></textarea>
                                                    <span class="text-danger is-invalid priest_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="priest_info_address_in_marathi" placeholder="Enter name" required></textarea>
                                                    <span class="text-danger is-invalid priest_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="priest_info_mobile_no" placeholder="Enter mobile no" required />
                                                    <span class="text-danger is-invalid priest_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="priest_info_age" placeholder="Enter age" required />
                                                    <span class="text-danger is-invalid priest_info_age_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion (धर्म) <span class="text-danger">*</span></label>
                                                    <select name="priest_info_religion" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Hindu</option>
                                                        <option value="2">Muslim</option>
                                                        <option value="3">Jain</option>
                                                        <option value="4">Shikh</option>
                                                        <option value="5">Buddhism</option>
                                                        <option value="6">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid priest_info_religion_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="priest_info_upload_signatures" required />
                                                    <span class="text-danger is-invalid priest_info_upload_signatures_err"></span>
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
                                        <input type="hidden" name="marriage_reg_form_id" class="marriageRegistrationInsertedId">
                                        <h5 style="font-weight: 800;" class="text-dark">First Witness Information (प्रथम साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_info_fname_in_english" placeholder="Enter full name in english" required />
                                                    <span class="text-danger is-invalid first_witness_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_info_fname_in_marathi" placeholder="Enter full name in marathi" required />
                                                    <span class="text-danger is-invalid first_witness_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="first_witness_info_mobile_no" placeholder="Enter mobile no" required />
                                                    <span class="text-danger is-invalid first_witness_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="first_witness_info_dob" placeholder="Select date of birth" autocomplete="off" required />
                                                    <span class="text-danger is-invalid first_witness_info_dob_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="first_witness_info_age" placeholder="Enter age" required />
                                                    <span class="text-danger is-invalid first_witness_info_age_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="first_witness_info_gender" class="form-select" required>
                                                        <option value="">Select gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid first_witness_info_gender_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_witness_info_relation" placeholder="Enter relation" required />
                                                    <span class="text-danger is-invalid first_witness_info_relation_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="first_witness_info_address_in_english" placeholder="Enter address" required></textarea>
                                                    <span class="text-danger is-invalid first_witness_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="first_witness_info_address_in_marathi" placeholder="Enter address in marathi" required></textarea>
                                                    <span class="text-danger is-invalid first_witness_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="first_witness_info_id_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                    <span class="text-danger is-invalid first_witness_info_id_proof_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <br><span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_info_witness_photos" required />
                                                    <span class="text-danger is-invalid first_witness_info_witness_photos_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_info_upload_signatures" required />
                                                    <span class="text-danger is-invalid first_witness_info_upload_signatures_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="first_witness_info_upload_documents" required />
                                                    <span class="text-danger is-invalid first_witness_info_upload_documents_err"></span>
                                                </div>
                                            </div>
                                        </div>



                                        <h5 style="font-weight: 800;" class="text-dark">Second Witness Information (दुसऱ्या साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_info_fname_in_english" placeholder="Enter full name in english" required />
                                                    <span class="text-danger is-invalid second_witness_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_info_fname_in_marathi" placeholder="Enter full name in marathi" required />
                                                    <span class="text-danger is-invalid second_witness_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="second_witness_info_mobile_no" placeholder="Enter mobile no" required />
                                                    <span class="text-danger is-invalid second_witness_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="second_witness_info_dob" placeholder="Select date of birth" autocomplete="off" required />
                                                    <span class="text-danger is-invalid second_witness_info_dob_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="second_witness_info_age" placeholder="Age" required />
                                                    <span class="text-danger is-invalid second_witness_info_age_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="second_witness_info_gender" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid second_witness_info_gender_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="second_witness_info_relation" placeholder="Enter relation" required />
                                                    <span class="text-danger is-invalid second_witness_info_relation_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="second_witness_info_address_in_english" placeholder="Enter address in english" required></textarea>
                                                    <span class="text-danger is-invalid second_witness_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="second_witness_info_address_in_marathi" placeholder="Enter address in marathi" required></textarea>
                                                    <span class="text-danger is-invalid second_witness_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="second_witness_info_id_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                    <span class="text-danger is-invalid second_witness_info_id_proof_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <br><span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_info_witness_photos" required />
                                                    <span class="text-danger is-invalid second_witness_info_witness_photos_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_info_upload_signatures" required />
                                                    <span class="text-danger is-invalid second_witness_info_upload_signatures_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <br><span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="second_witness_info_upload_documents" required />
                                                    <span class="text-danger is-invalid second_witness_info_upload_documents_err"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <h5 style="font-weight: 800;" class="text-dark">Third Witness Information (तिसरा साक्षीदाराची माहिती)</h5>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In English (पूर्ण नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_info_fname_in_english" placeholder="Enter full name in english" required />
                                                    <span class="text-danger is-invalid third_witness_info_fname_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name In Marathi (पूर्ण नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_info_fname_in_marathi" placeholder="Enter full name in marathi" required />
                                                    <span class="text-danger is-invalid third_witness_info_fname_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value=this.value.replace(/\D/g, '')" maxlength="10" minlength="10"  class="form-control" name="third_witness_info_mobile_no" placeholder="Enter mobile no" required />
                                                    <span class="text-danger is-invalid third_witness_info_mobile_no_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control datepicker" name="third_witness_info_dob" placeholder="Enter date of birth" autocomplete="off" required />
                                                    <span class="text-danger is-invalid third_witness_info_dob_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="third_witness_info_age" placeholder="Enter age" required />
                                                    <span class="text-danger is-invalid third_witness_info_age_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                    <select name="third_witness_info_gender" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Other</option>
                                                    </select>
                                                    <span class="text-danger is-invalid third_witness_info_gender_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Relation (संबंध) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="third_witness_info_relation" placeholder="Enter relation" required />
                                                    <span class="text-danger is-invalid third_witness_info_relation_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="third_witness_info_address_in_english" placeholder="Enter address in english" required></textarea>
                                                    <span class="text-danger is-invalid third_witness_info_address_in_english_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="third_witness_info_address_in_marathi" placeholder="Enter address in marathi" required></textarea>
                                                    <span class="text-danger is-invalid third_witness_info_address_in_marathi_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Proof (कागदपत्र सादर केले) <span class="text-danger">*</span></label>
                                                    <select name="third_witness_info_id_proof" class="form-select" required>
                                                        <option value="">Choose one</option>
                                                        <option value="1">Aadhar Card</option>
                                                        <option value="2">Voter Id</option>
                                                    </select>
                                                    <span class="text-danger is-invalid third_witness_info_id_proof_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Witness Photo (साक्षीदाराचा फोटो) <br><span class="text-danger"> Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_info_witness_photos" required />
                                                    <span class="text-danger is-invalid third_witness_info_witness_photos_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <br><span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_info_upload_signatures" required />
                                                    <span class="text-danger is-invalid third_witness_info_upload_signatures_err"></span>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Document (कागदपत्र सादर केले) <br><span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                    <input type="file" class="form-control" name="third_witness_info_upload_documents" required />
                                                    <span class="text-danger is-invalid third_witness_info_upload_documents_err"></span>
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
                if (!data.error){
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        checkStatuActive("marriage-registration-details")
                        $('.marriageRegistrationInsertedId').val(data.data.id)
                    });
                }
                else{
                    swal("Error!", data.error, "error");
                }
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
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        checkStatuActive("groom-information")
                    });
                else
                    swal("Error!", data.error, "error");
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
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        checkStatuActive("bride-information")
                    });
                else
                    swal("Error!", data.error, "error");
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
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        checkStatuActive("priest-information")
                    });
                else
                    swal("Error!", data.error, "error");
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
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        checkStatuActive("witness-information")
                    });
                else
                    swal("Error!", data.error, "error");
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
                if (!data.error)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = "'{{ route("my-application") }}'"
                    });
                else
                    swal("Error!", data.error, "error");
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
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });

    });

    function checkStatuActive(id){
        $('.nav-link').removeClass('active');
        $('#'+id+'-tab').addClass('active'); 
        $('#'+id+'-tab').prop("disabled", false);
        $('.tab-pane.fade').removeClass('show active');
        $('#'+id).addClass('show active')
    }
</script>
{{-- End of add bride information --}}

{{-- event --}}
<script>
    $(document).ready(function(){
        $('#registrationFromMarriageSolemnizedWithinMaharashtraState').change(function(){
            let checkValue = $(this).val();

            if(checkValue == "1"){
                $('#registrationFromAffidavitForMarriageOutsideMaharashtras').addClass('d-none');
                $('#registrationFromAffidavitForMarriageOutsideMaharashtras').find('input[name="registration_from_affidavit_for_marriage_outside_maharashtras"]').prop('required', false);
            }else{
                $('#registrationFromAffidavitForMarriageOutsideMaharashtras').removeClass('d-none');
                $('#registrationFromAffidavitForMarriageOutsideMaharashtras').find('input[name="registration_from_affidavit_for_marriage_outside_maharashtras"]').prop('required', true);
            }
        });


        $("#gdate_of_birth").change(function() {
            var today = new Date();
            var dateString = $(this).val();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            if (age >= 21) {
                $("#gage").val(age);
                $("#groomInformationBtn").removeClass('d-none');
            } else {
                $("#gage").val("");
                alert("Your Age is less than 21 you are not eligible");
                $("#groomInformationBtn").addClass('d-none');
            }
        });


        $('#groomInfoPreviousStatus').change(function(){
            let checkValue = $(this).val();

            if(checkValue == "2"){
                $('#groomInfoPreviousStatusProof').removeClass('d-none');
                $('#groomInfoPreviousStatusProof').find('select').html(`<option value="1"> Death Certificate </option>`);
                $('#groomInfoUploadPreviousStatusProofs').removeClass('d-none');
            }else if(checkValue == "3"){
                $('#groomInfoPreviousStatusProof').removeClass('d-none');
                $('#groomInfoPreviousStatusProof').find('select').html(`<option value="2"> Decree &amp; Court Judgement </option>`);
                $('#groomInfoUploadPreviousStatusProofs').removeClass('d-none');
            }else{
                $('#groomInfoPreviousStatusProof').addClass('d-none');
                $('#groomInfoPreviousStatusProof').find('select').html(`<option value=""></option>`);
                $('#groomInfoUploadPreviousStatusProofs').addClass('d-none');
            }
        });


        $("#bdate_of_birth").change(function() {
            var today = new Date();
            var dateString = $(this).val();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            if (age >= 18) {
                $("#bage").val(age);
                $("#brideInformationBtn").removeClass('d-none');
            } else {
                $("#bage").val("");
                alert("Your Age is less than 18 you are not eligible");
                $("#brideInformationBtn").addClass('d-none');
            }
        });

        $('#brideInfoPreviousStatus').change(function(){
            let checkValue = $(this).val();

            if(checkValue == "2"){
                $('#brideInfoPreviousStatusProof').removeClass('d-none');
                $('#brideInfoPreviousStatusProof').find('select').html(`<option value="1"> Death Certificate </option>`);
                $('#brideInfoUploadPreviousStatusProofs').removeClass('d-none');
            }else if(checkValue == "3"){
                $('#brideInfoPreviousStatusProof').removeClass('d-none');
                $('#brideInfoPreviousStatusProof').find('select').html(`<option value="2"> Decree &amp; Court Judgement </option>`);
                $('#brideInfoUploadPreviousStatusProofs').removeClass('d-none');
            }else{
                $('#brideInfoPreviousStatusProof').addClass('d-none');
                $('#brideInfoPreviousStatusProof').find('select').html(`<option value=""></option>`);
                $('#brideInfoUploadPreviousStatusProofs').addClass('d-none');
            }
        });
    })
</script>