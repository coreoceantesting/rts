<x-layout>
    <x-slot name="title">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot>
    {{-- <x-slot name="heading">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot> --}}


    
    <div class="row">
        <div class="col-lg-12">

                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0 text-dark" style="font-weight: 600">ISSUANCE OF MARRIAGE REGISTRATION CERTIFICATE / विवाह नोंदणी प्रमाणपत्र देणे
                                    </h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <form action="#" class="form-steps" autocomplete="off">
                                        
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
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="applicantMobileNumber" class="form-label">Applicant Mobile Number (अर्जदाराचा मोबाईल क्रमांक) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" oninput="this.value = this.value.replace(/\D/g, '')" name="applicant_mobile_number" id="applicantMobileNumber" placeholder="Enter Applicant Mobile Number" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="applicantFullName" class="form-label">Applicant Full Name (अर्जदाराचे पूर्ण नाव)<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="applicant_full_name" id="applicantFullName" placeholder="Enter Applicant Full Name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="applicantHomeAddress" class="form-label">Applicant Home Address (अर्जदाराच्या घराचा पत्ता) <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="applicant_home_address" id="applicantHomeAddress" placeholder="Enter Applicant Home Address"></textarea>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="pincode" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="applicantEmail" class="form-label">Applicant E-mail (अर्जदाराचा ई-मेल) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="applicantEmail" name="applicant_email" placeholder="Enter Applicant E-mail" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="aadhar_card_no" class="form-label">Aadhar Card No. (आधार कार्ड क्र) <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="aadhar_card_no" placeholder="Enter Aadhar Card No." id="aadhar_card_no" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="applicantAlternateMobileNumber" class="form-label">Applicant alternate Mobile Number (अर्जदाराचा पर्यायी मोबाईल क्रमांक)</label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="applicant_alternate_mobile_number" placeholder="Enter Applicant alternate Mobile Number" id="applicantAlternateMobileNumber" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="pan_card_no" class="form-label">Pan Card No. (पॅन कार्ड क्र.) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="pan_card_no" placeholder="Enter Pan Card No. (पॅन कार्ड क्र.)" id="pan_card_no" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="residentialWardName" class="form-label">Residential Ward Name (रहिवाशीच्या प्रभागाचे नाव) <span class="text-danger">*</span></label>
                                                                <select name="residential_ward_name" class="form-select" id="residentialWardName">
                                                                    <option value="">Select option</option>
                                                                    <option value="1">Option 1</option>
                                                                    <option value="2">Option 2</option>
                                                                    <option value="3">Option 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="marriageSolemnizedWithinMaharashtraState" class="form-label">Marriage solemnized within Maharashtra State? (विवाह सोहळा महाराष्ट्र राज्यात झाला आहे का ?) <span class="text-danger">*</span></label>
                                                                <select name="marriage_solemnized_within_maharashtra_state" class="form-select" id="marriageSolemnizedWithinMaharashtraState">
                                                                    <option value="">Select option</option>
                                                                    <option value="1">Option 1</option>
                                                                    <option value="2">Option 2</option>
                                                                    <option value="3">Option 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="affidavitForMarriageOutsideMaharashtra" class="form-label">Affidavit for Marriage Outside Maharashtra <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                                <input type="file" class="form-control" name="affidavit_for_marriage_outside_maharashtra" id="affidavitForMarriageOutsideMaharashtra" placeholder="Enter Affidavit for Marriage Outside Maharashtra" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="marriage-registration-details" role="tabpanel" aria-labelledby="marriage-registration-details-tab">
                                                <form action="" method="post">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Form Filled Date (फॉर्म भरण्याची तारीख) <span class="text-danger">*</span></label>
                                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="name" placeholder="Enter Form Filled Date" readonly />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Marriage Date in English (लग्नाची तारीख इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="name" placeholder="Enter Marriage Date in English" max="{{ date('Y-m-d') }}" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Marriage Date in Marathi (लग्नाची तारीख मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Marriage Date in Marathi" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Marriage Place, Full Address in English (इंग्रजीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="name" placeholder="Enter Marriage Place, Full Address in English" ></textarea>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Marriage Place, Full Address in Marathi (मराठीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                                                <textarea type="text" class="form-control" name="name" placeholder="Enter Marriage Place, Full Address in Marathi"></textarea>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Couple Photo of Wedding (लग्न विधी चा फोटो) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                                                <input type="File" class="form-control" name="name" placeholder="Enter Couple Photo of Wedding" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="isHusbandWifeWidowerWidow" class="form-label">Is Husband/Wife Widower/Widow? (वर/वधू -- विधुर / विधवा आहे का ?) <span class="text-danger">*</span></label>
                                                                <select name="is_husband_wife_widower_widow" class="form-select" id="isHusbandWifeWidowerWidow">
                                                                    <option value="">Select option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="isHusbandWifePreviouslyDivorced" class="form-label">Is Husband/Wife previously divorced? (वर वधू यांचे घटस्पोट झाला आहे का ?) <span class="text-danger">*</span></label>
                                                                <select name="is_husband_wife_previously_divorced" class="form-select" id="isHusbandWifePreviouslyDivorced">
                                                                    <option value="">Select option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="isMarriageIntercaste" class="form-label">Is Marriage Intercaste?  (आंतरजातीय विवाह झाला आहे का ?) <span class="text-danger">*</span></label>
                                                                <select name="is_marriage_intercaste" class="form-select" id="isMarriageIntercaste">
                                                                    <option value="">Select option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Wedding card Image. If not available, attach Affidavit (लग्न पत्रिका चा फोटो नसल्यास, प्रतिज्ञापत्र जोडावे ) <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                                                <input type="File" class="form-control" name="name" placeholder="Enter Wedding card Image. If not available, attach Affidavit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="groom-information" role="tabpanel" role="tabpanel" aria-labelledby="groom-information-tab">
                                                <form action="">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter First Name in English" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In English" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Last Name In English" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter First Name In Marathi" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In Marathi" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Last Name In Marathi" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="name" placeholder="Enter Address In English"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="name" placeholder="Enter Address In Marathi"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Pincode" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Pincode in Marathi" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Mobile No" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Aadhar Card No." />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="name" placeholder="Enter Date of Birth" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                                <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Age" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Gender <span class="text-danger">*</span></label>
                                                                <select name="gender" id="gender" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="religionByBirth" class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                                <select name="religion_by_birth" id="religionByBirth" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="religionByAdoption" class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                                <select name="religion_by_adoption" id="religionByAdoption" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Groom Photo (वराचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Groom Photo" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                                <select name="id_proof" id="idProof" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                                <select name="id_proof" id="residentialProof" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                                <select name="id_proof" id="ageProof" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Upload Id Proof" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Upload Residential Proof" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Upload Age Proof" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Upload Signature" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                                <select name="previous_status" id="previousStatus" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                                <select name="previous_status_proof" id="previousStatusProof" class="form-select">
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                    <option value="option">Select option</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="file" class="form-control" name="name" placeholder="Enter Upload Previous Status Proof" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="bride-information" role="tabpanel" aria-labelledby="bride-information-tab">
                                                <form action="">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter First Name in English" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In English" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Gender <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Bride Photo (वधूचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->


                                            <div class="tab-pane fade" id="priest-information" role="tabpanel" aria-labelledby="priest-information-tab">
                                                <form action="">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Religion (धर्म) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->


                                            <div class="tab-pane fade" id="witness-information" role="tabpanel" aria-labelledby="witness-information-tab">
                                                <form action="">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Religion (धर्म) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>







                    {{-- <form action="{{ route('marriage-registration-certificate.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <h4 style="font-weight: 900">Marriage Registration Form (विवाह नोंदणी फॉर्म)</h4>
                            <hr>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="applicantMobileNumber" class="form-label">Applicant Mobile Number (अर्जदाराचा मोबाईल क्रमांक) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" oninput="this.value = this.value.replace(/\D/g, '')" name="applicant_mobile_number" id="applicantMobileNumber" placeholder="Enter Applicant Mobile Number" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="applicantFullName" class="form-label">Applicant Full Name (अर्जदाराचे पूर्ण नाव)<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="applicant_full_name" id="applicantFullName" placeholder="Enter Applicant Full Name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="applicantHomeAddress" class="form-label">Applicant Home Address (अर्जदाराच्या घराचा पत्ता) <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="applicant_home_address" id="applicantHomeAddress" placeholder="Enter Applicant Home Address"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="pincode" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="applicantEmail" class="form-label">Applicant E-mail (अर्जदाराचा ई-मेल) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="applicantEmail" name="applicant_email" placeholder="Enter Applicant E-mail" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="aadhar_card_no" class="form-label">Aadhar Card No. (आधार कार्ड क्र) <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="aadhar_card_no" placeholder="Enter Aadhar Card No." id="aadhar_card_no" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="applicantAlternateMobileNumber" class="form-label">Applicant alternate Mobile Number (अर्जदाराचा पर्यायी मोबाईल क्रमांक)</label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="applicant_alternate_mobile_number" placeholder="Enter Applicant alternate Mobile Number" id="applicantAlternateMobileNumber" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="pan_card_no" class="form-label">Pan Card No. (पॅन कार्ड क्र.) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pan_card_no" placeholder="Enter Pan Card No. (पॅन कार्ड क्र.)" id="pan_card_no" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="residentialWardName" class="form-label">Residential Ward Name (रहिवाशीच्या प्रभागाचे नाव) <span class="text-danger">*</span></label>
                                    <select name="residential_ward_name" class="form-select" id="residentialWardName">
                                        <option value="">Select option</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="marriageSolemnizedWithinMaharashtraState" class="form-label">Marriage solemnized within Maharashtra State? (विवाह सोहळा महाराष्ट्र राज्यात झाला आहे का ?) <span class="text-danger">*</span></label>
                                    <select name="marriage_solemnized_within_maharashtra_state" class="form-select" id="marriageSolemnizedWithinMaharashtraState">
                                        <option value="">Select option</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="affidavitForMarriageOutsideMaharashtra" class="form-label">Affidavit for Marriage Outside Maharashtra <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                    <input type="file" class="form-control" name="affidavit_for_marriage_outside_maharashtra" id="affidavitForMarriageOutsideMaharashtra" placeholder="Enter Affidavit for Marriage Outside Maharashtra" />
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <h4 style="font-weight: 900">Marriage Registration Details (विवाह नोंदणी माहिती)</h4>
                            <hr>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Form Filled Date (फॉर्म भरण्याची तारीख) <span class="text-danger">*</span></label>
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="name" placeholder="Enter Form Filled Date" readonly />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Marriage Date in English (लग्नाची तारीख इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="name" placeholder="Enter Marriage Date in English" max="{{ date('Y-m-d') }}" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Marriage Date in Marathi (लग्नाची तारीख मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Marriage Date in Marathi" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Marriage Place, Full Address in English (इंग्रजीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="name" placeholder="Enter Marriage Place, Full Address in English" ></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Marriage Place, Full Address in Marathi (मराठीमध्ये लग्नाच्या ठिकाणाचा पत्ता) <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="name" placeholder="Enter Marriage Place, Full Address in Marathi"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Couple Photo of Wedding (लग्न विधी चा फोटो) <span class="text-danger">Upload Image / PDF Format Only (Max size 2mb) *</span></label>
                                    <input type="File" class="form-control" name="name" placeholder="Enter Couple Photo of Wedding" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="isHusbandWifeWidowerWidow" class="form-label">Is Husband/Wife Widower/Widow? (वर/वधू -- विधुर / विधवा आहे का ?) <span class="text-danger">*</span></label>
                                    <select name="is_husband_wife_widower_widow" class="form-select" id="isHusbandWifeWidowerWidow">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="isHusbandWifePreviouslyDivorced" class="form-label">Is Husband/Wife previously divorced? (वर वधू यांचे घटस्पोट झाला आहे का ?) <span class="text-danger">*</span></label>
                                    <select name="is_husband_wife_previously_divorced" class="form-select" id="isHusbandWifePreviouslyDivorced">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="isMarriageIntercaste" class="form-label">Is Marriage Intercaste?  (आंतरजातीय विवाह झाला आहे का ?) <span class="text-danger">*</span></label>
                                    <select name="is_marriage_intercaste" class="form-select" id="isMarriageIntercaste">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Wedding card Image. If not available, attach Affidavit (लग्न पत्रिका चा फोटो नसल्यास, प्रतिज्ञापत्र जोडावे ) <span class="text-danger">Upload PDF Format Only (Max size 2mb) *</span></label>
                                    <input type="File" class="form-control" name="name" placeholder="Enter Wedding card Image. If not available, attach Affidavit" />
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <h4 style="font-weight: 900">Groom Information (वराची माहिती)</h4>
                            <hr>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter First Name in English" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In English" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Last Name In English" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter First Name In Marathi" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In Marathi" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Last Name In Marathi" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="name" placeholder="Enter Address In English"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="name" placeholder="Enter Address In Marathi"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Pincode" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Pincode in Marathi" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Mobile No" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Email" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Aadhar Card No." />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="name" placeholder="Enter Date of Birth" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                    <input type="text" oninput="this.value = this.value.replace(/\D/g, '')" class="form-control" name="name" placeholder="Enter Age" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="religionByBirth" class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                    <select name="religion_by_birth" id="religionByBirth" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="religionByAdoption" class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                    <select name="religion_by_adoption" id="religionByAdoption" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Groom Photo (वराचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Groom Photo" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                    <select name="id_proof" id="idProof" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                    <select name="id_proof" id="residentialProof" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                    <select name="id_proof" id="ageProof" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Upload Id Proof" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Upload Residential Proof" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Upload Age Proof" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Upload Signature" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                    <select name="previous_status" id="previousStatus" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                    <select name="previous_status_proof" id="previousStatusProof" class="form-select">
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                        <option value="option">Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="file" class="form-control" name="name" placeholder="Enter Upload Previous Status Proof" />
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <h4 style="font-weight: 900">Bride Information (वधूची माहिती)</h4>
                            <hr>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter First Name in English" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Middle Name In English" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Pincode (पिनकोड) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Pincode in Marathi (पिनकोड मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Email (ईमेल) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Aadhar Card No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Date of Birth (जन्मतारीख) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Religion by birth (जन्माने धर्म) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Religion by adoption (दत्तक घेऊन धर्म) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Bride Photo (वधूचा फोटो) <span class="text-danger">Upload Passport size -- jpg/jpeg/png Format Only (Max size 400kb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Id Proof (आयडी पुरावा) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Residential Proof (निवासी पुरावा) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Age Proof (वयाचा पुरावा) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Id Proof (आयडी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Residential Proof (निवासी पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Age Proof (वयाचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 400kb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Previous Status (मागील स्थिती) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Previous Status Proof (मागील स्थितीचा पुरावा) <span class="text-danger">Upload Image / Pdf Format Only (Max size 2mb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                        </div>

                        
                        <div class="row mt-3">
                            <h4 style="font-weight: 900">Priest Information (पुरोहिताची माहिती)</h4>
                            <hr>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name in English (पहिले नाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In English (मधले नाव इंग्रजीमध्ये)<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In English (आडनाव इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name In Marathi (पहिले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Middle Name In Marathi (मधले नाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name In Marathi (आडनाव मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In English (पत्ता इंग्रजीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address In Marathi (पत्ता मराठीमध्ये) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Age (वय) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Religion (धर्म) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Signature(स्वाक्षरी अपलोड करा) <span class="text-danger">Upload Image/Pdf Format Only (Max size 400kb) *</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                                </div>
                            </div>
                        </div>
                    </form> --}}
        </div>
    </div>
</x-layout>