<x-admin.layout>
    <x-slot name="title">Renewal of marriage hall/meeting hall etc. license/मंगल कार्यालय/सभागृह वगैरे परवाना चे नूतनीकरण करणे</x-slot>
    <x-slot name="heading">Renewal of marriage hall/meeting hall etc. license/मंगल कार्यालय/सभागृह वगैरे परवाना चे नूतनीकरण करणे</x-slot>

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
                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                प्राथमिक माहिती/Basic information
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="shop_name">दुकानाचे नाव इंग्रजी<span class="text-danger">*</span></label>
                                <input class="form-control" id="shop_name" name="shop_name" type="text" placeholder="Enter Shop name  in English"  value="{{ old('shop_name', $renewLicenseMarriage->shop_name) }}">
                                <span class="text-danger is-invalid shop_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="marathi_shop_name"> दुकानाचे नाव मराठी<span class="text-danger">*</span></label>
                                <input class="form-control" id="marathi_shop_name" name="marathi_shop_name" type="text" placeholder="Enter Shop name Marathi"  value="{{ old('marathi_shop_name', $renewLicenseMarriage->marathi_shop_name) }}">
                                <span class="text-danger is-invalid marathi_shop_name_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pencard_num">पैन कार्ड क्रमांक<span class="text-danger">*</span> </label>
                                <input class="form-control" id="pencard_num" name="pencard_num" type="text" placeholder="Enter Pancard Number" value="{{ old('pencard_num', $renewLicenseMarriage->pencard_num) }}" >
                                <span class="text-danger is-invalid pencard_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_num">	संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_num" name="mobile_num" type="number" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number"  value="{{ old('mobile_num', $renewLicenseMarriage->mobile_num) }}">
                                <span class="text-danger is-invalid mobile_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="e_mail"> ई-मेल<span class="text-danger">*</span></label>
                                <input class="form-control" id="e_mail" name="e_mail" type="email" placeholder="Enter Email" value="{{ old('e_mail', $renewLicenseMarriage->e_mail) }}">
                                <span class="text-danger is-invalid e_mail_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="address">दुकानाचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter Applicant Address"  type="text">{{ old('address', $renewLicenseMarriage->address) }}</textarea>
                                <span class="text-danger is-invalid address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" >
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}" @if ($zone->name == $renewLicenseMarriage->zone) selected @endif>{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward_area" id="ward_area" >
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option @if ($renewLicenseMarriage->ward_area == $ward->name) selected @endif value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_area_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="financial_year">License Financial From Year</label>
                                <select class="form-select" id="financial_year" name="financial_year" >
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}" {{ $renewLicenseMarriage->financial_year == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid financial_year_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="to_year">To Year</label>
                                <label class="col-form-label" for="to_year">License Financial From Year</label>
                                <select class="form-select" id="to_year" name="to_year" >
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}" {{ $renewLicenseMarriage->to_year == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid to_year_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="amount">रक्कम<span class="text-danger">*</span></label>
                                <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Applicant Name"  value="{{ old('amount', $renewLicenseMarriage->amount) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                                <span class="text-danger is-invalid amount_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">वस्तू निर्मित आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="होय" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->manufactured == 'होय' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="नाही" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->manufactured == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                    <span class="text-danger is-invalid manufactured_err"></span>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">स्वते चे: मालकीचे जागेत व्यवसाय करीत आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="होय" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->business_premises == 'होय' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="नाही" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->business_premises == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                    <span class="text-danger is-invalid business_premises_err"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="owner_place">जागा मालकीचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="owner_place" name="owner_place" type="text" placeholder="Enter Name of the owner of the place"  value="{{ old('owner_place', $renewLicenseMarriage->owner_place) }}">
                                <span class="text-danger is-invalid owner_place_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="address_owner_premises">जागा मालकाचा पत्ता<span class="text-danger">*</span></label>
                                <input class="form-control" id="address_owner_premises" name="address_owner_premises" type="text" placeholder="Enter Name of the owner of the place"  value="{{ old('address_owner_premises', $renewLicenseMarriage->address_owner_premises) }}">
                                <span class="text-danger is-invalid address_owner_premises_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="rental_agreement">भाडे करार कोणासोबत केलेले आहे<span class="text-danger">*</span></label>
                                <input class="form-control" id="rental_agreement" name="rental_agreement" type="text" placeholder="Enter rental agreement"  value="{{ old('rental_agreement', $renewLicenseMarriage->rental_agreement) }}">
                                <span class="text-danger is-invalid rental_agreement_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="area_used">वापरात आलेले जागेचे क्षेत्र चौ. फु. मध्ये<span class="text-danger">*</span></label>
                                <input class="form-control" id="area_used" name="area_used" type="number" placeholder="Enter"  value="{{ old('area_used', $renewLicenseMarriage->area_used) }}">
                                <span class="text-danger is-invalid area_used_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">व्यवसायासाठी म. न. पा. चे नाहरकत प्रमाणपत्र घेतले आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="होय"  {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->noc_certificate == 'होय' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="नाही" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->noc_certificate == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                    <span class="text-danger is-invalid noc_certificate_err"></span>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_start">व्यवसाय सुरु केल्याचे वर्ष<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_start" name="business_start" type="number" placeholder="Year of business start"  value="{{ old('business_start', $renewLicenseMarriage->business_start) }}">
                                <span class="text-danger is-invalid business_start_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="registration_no">शॉप ऍक्ट नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="registration_no" name="registration_no" type="number" placeholder=""  value="{{ old('registration_no', $renewLicenseMarriage->registration_no) }}">
                                <span class="text-danger is-invalid registration_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="food_drug">अन्न व ओषध प्रशासन कायद्यान्वये नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="food_drug" name="food_drug" type="text" placeholder=""  value="{{ old('food_drug', $renewLicenseMarriage->food_drug) }}">
                                <span class="text-danger is-invalid food_drug_err"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="alert alert-warning fw-bold" role="alert">
                                संचालक माहिती/ Director information
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_num">संचालकांचा आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_num" name="aadhar_num" type="number" placeholder="Enter Aadhar Card No" value="{{ old('aadhar_num', $renewLicenseMarriage->aadhar_num) }}">
                                <span class="text-danger is-invalid aadhar_num_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="director_name">संचालकांचा नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_name" name="director_name" type="text" placeholder="Enter Director Name"  value="{{ old('director_name', $renewLicenseMarriage->director_name) }}">
                                <span class="text-danger is-invalid director_namee_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="contact_no">संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="contact_no" name="contact_no" type="number" placeholder="Enter  Number"  value="{{ old('contact_no', $renewLicenseMarriage->contact_no) }}">
                                <span class="text-danger is-invalid contact_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_email">ई-मेल.<span class="text-danger">*</span></label>
                                <input class="form-control" id="alternet_email" name="alternet_email" type="email" placeholder="Enter  Number"  value="{{ old('alternet_email', $renewLicenseMarriage->alternet_email) }}">
                                <span class="text-danger is-invalid alternet_email_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_address">पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alternet_address" id="alternet_address" cols="30" rows="2" placeholder="Enter Address" >{{ old('alternet_address', $renewLicenseMarriage->alternet_address) }}</textarea>
                                <span class="text-danger is-invalid alternet_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label">लिंग<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="स्त्री"  {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->gender == 'स्त्री' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="स्त्री">स्त्री</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="पुरुष" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->gender == 'पुरुष' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="पुरुष">पुरुष</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="ईतर" {{ isset($renewLicenseMarriage) && $renewLicenseMarriage->gender == 'ईतर' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ईतर">ईतर</label>
                                    </div>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="application_type">अर्जदार प्रकार</label>
                                <select class="form-select" name="application_type" id="application_type">
                                    <option value="">Select Option</option>
                                    <option value="1" {{ $renewLicenseMarriage->application_type == '1' ? 'selected' : '' }}>परितक्ता</option>
                                    <option value="2" {{ $renewLicenseMarriage->application_type == '2' ? 'selected' : '' }}>प्रकल्पग्रस्त</option>
                                    <option value="3" {{ $renewLicenseMarriage->application_type == '3' ? 'selected' : '' }}>पूरग्रस्त</option>
                                    <option value="4" {{ $renewLicenseMarriage->application_type == '4' ? 'selected' : '' }}>अपंग</option>
                                    <option value="5" {{ $renewLicenseMarriage->application_type == '5' ? 'selected' : '' }}>विधवा </option>
                                    <option value="6" {{ $renewLicenseMarriage->application_type == '6' ? 'selected' : '' }}>सामान्य </option>
                                </select>
                                <span class="text-danger is-invalid application_type_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="director_photos">संचालकाचां फोटो<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_photos" name="director_photos" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->director_image)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->director_image) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid director_photos_err" ></span>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                कागदपत्र जोडणे/Attaching documents
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="upload_prescribed_formats">इतर कागद पत्रे (भागीदार फॉर्म_भाडेकरारनामा_एक्साईट परवाना)<span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->other_documents)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->other_documents) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err" ></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">अग्निशमन नाहरकत प्रमाणपत्र<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->fire_certificate)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->fire_certificate) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid place_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">बाजार परवाना (नुतनिकरणावेळेस)</label>
                                <input class="form-control" id="ownership" name="ownership" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->market_license)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->market_license) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid ownership_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">अन्न व औषध प्रशासन कायद्यान्वये नोंदणी प्रत</label>
                                <input class="form-control" id="water_bill" name="water_bills" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->food_drug_img)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->food_drug_img) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid water_bills_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">शॉप ऍक्ट<span class="text-danger">*</span></label>
                                <input class="form-control" id="society" name="society" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->shop_act)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->shop_act) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid society_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">संचालकांचे पॅन कार्ड (मुळ प्रत)<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->pancard_image)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->pancard_image) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid aadhar_panss_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">संचालकांचे आधार कार्ड (मुळ प्रत)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->aadharcard_image)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->aadharcard_image) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid property_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">चालु वर्षाची कर पावती<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->tax_receipt_img)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->tax_receipt_img) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid tenancy_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">दुकानाचे आतील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->interior_photo)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->interior_photo) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid occupancy_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">दुकानाचे बाहेरील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($renewLicenseMarriage->exterior_photo)
                                <small><a href="{{ asset('storage/' . $renewLicenseMarriage->exterior_photo) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid medical_err"></span>
                            </div>


                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" >
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
        var updateUrl = '{{ route('trade-renew-license-marriage.update', $renewLicenseMarriage->id) }}';
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
