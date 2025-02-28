<x-admin.layout>
    <x-slot name="title">Mobile Tower Permission / मोबाईल टॉवर परवानगी</x-slot>
    <x-slot name="heading">Mobile Tower Permission / मोबाईल टॉवर परवानगी</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="card-title">Edit Details</h4>
                    </div>
                    {{-- <div class="card-body">
                        <div class="mb-3 row">


                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ old('applicant_name', $mobileTowerService->applicant_name) }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ old('email_id', $mobileTowerService->email_id) }}" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number"
                                    value="{{ old('mobile_no', $mobileTowerService->mobile_no) }}" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option @if ($mobileTowerService->zone == $zone->name) selected @endif value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward_area" id="ward_area" required>
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option @if ($mobileTowerService->ward_area == $ward->name) selected @endif value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_area_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">Aadhar Number / आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No" value="{{ $mobileTowerService->aadhar_number ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>




                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pancard_number">Pancard Number / पैन कार्ड क्रमांक </label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="number" placeholder="Enter Pancard Number" value="{{ $mobileTowerService->pancard_number ?? '' }}">
                                <span class="text-danger is-invalid pancard_number_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $mobileTowerService->full_address ?? '' }}</textarea>
                                <span class="text-danger is-invalid full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="business_name">Business Name / व्यवसायाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_name" name="business_name" type="text" placeholder="Enter Applicant Name" value="{{ $mobileTowerService->business_name ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">Business Type /व्यवसायाचा प्रकार</label>
                                <input class="form-control" id="business_type" name="business_type" type="text" placeholder="Enter Applicant Name" value="{{ $mobileTowerService->business_type ?? '' }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business">Business / व्यवसायाचा</label>
                                <select class="form-select" name="business" id="business">
                                    <option value="">Select Business</option>
                                    <option value="owner" {{ $mobileTowerService->business == 'owner' ? 'selected' : '' }}>Owner/मालक</option>
                                    <option value="partner" {{ $mobileTowerService->business == 'partner' ? 'selected' : '' }}>Partner/भागीदार</option>
                                    <option value="renter" {{ $mobileTowerService->business == 'renter' ? 'selected' : '' }}>Renter/भाडेकरी</option>
                                    <option value="rent" {{ $mobileTowerService->business == 'rent' ? 'selected' : '' }}>Rent/भाडे</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="gst">GST Number / जीएसटी क्रमांक </label>
                                <input class="form-control" id="gst" name="gst" type="text" placeholder="Enter GST Number" value="{{ $mobileTowerService->gst ?? '' }}">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="area">Total Area / एकूण क्षेत्रफळ <span class="text-danger">*</span> </label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter Area By Meter" value="{{ $mobileTowerService->area ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="date_commencement"> Date of Commencement of Business / व्यवसाय सुरू केळ्याचा
                                    दिनांक </label>
                                <input class="form-control" id="date_commencement" name="date_commencement" type="date" placeholder="Select Flat Assesment Date" value="{{ $mobileTowerService->date_commencement ?? '' }}">
                                <span class="text-danger is-invalid flat_assesment_date_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="address_est">Address of establishment / आस्थापनेचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address_est" id="address_est" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $mobileTowerService->address_est ?? '' }}</textarea>
                                <span class="text-danger is-invalid address_est_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="advance_device">Advance Devices / अग्निशामक उपकरणे</label>
                                <select class="form-select" name="advance_device" id="advance_device">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $mobileTowerService->advance_device == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $mobileTowerService->advance_device == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="first_aid">First Aid Box / प्रथमोपचार पेटी</label>
                                <select class="form-select" name="first_aid" id="first_aid" value="{{ old('box') }}">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $mobileTowerService->first_aid == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $mobileTowerService->first_aid == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="numb_of_worker">Number of Workers / कामगारांची संख्या </label>
                                <input class="form-control" id="numb_of_worker" name="numb_of_worker" type="number" placeholder="Enter Area By Meter" value="{{ $mobileTowerService->numb_of_worker ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_women">Number of Women Class / महिला वर्ग संख्या </label>
                                <input class="form-control" id="number_of_women" name="number_of_women" type="number" placeholder="Enter Area By Meter" value="{{ $mobileTowerService->number_of_women ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_men">Number of Men Class / पुरुष वर्ग संख्या </label>
                                <input class="form-control" id="number_of_men" name="number_of_men" type="number" placeholder="Enter Area By Meter" value="{{ $mobileTowerService->number_of_men ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="other">other / इतर </label>
                                <input class="form-control" id="other" name="other" type="number" placeholder="Enter Area By Meter" value="{{ $mobileTowerService->other ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="upload_prescribed_formats">Upload Gumasta Certificate / गुमास्ता प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file">
                                @if ($mobileTowerService->gumasta_certificate)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->gumasta_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">Upload Aadhar card or PAN card/ आधार कार्ड व पॅन कार्ड माणूस <span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file">
                                @if ($mobileTowerService->aadhar_pan)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->aadhar_pan) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid aadhar_pans_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">Upload Land ownership document / जागा मालकी कागदपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="ownership" name="ownership" type="file">
                                @if ($mobileTowerService->land_ownership)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->land_ownership) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">Upload Water bill payment receipt / पाणी देयक भरणा पावती </label>
                                <input class="form-control" id="water_bill" name="water_bills" type="file">
                                @if ($mobileTowerService->water_bill)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->water_bill) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid water_bills_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">Upload Society's No Objection Certificate / सोसायटीचे ना हरकत दाखला </label>
                                <input class="form-control" id="society" name="society" type="file">
                                @if ($mobileTowerService->no_objection_certificate)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->no_objection_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">Upload Photo of place of business / व्यवसायाच्या ठिकाणाचा फोटो <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file">
                                @if ($mobileTowerService->photo_of_place)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->photo_of_place) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">Upload Property tax payment receipt / मालमत्ता कर भरणा पावती <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file">
                                @if ($mobileTowerService->property_tax)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->property_tax) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">Upload If the place is on lease Tenancy Agreement Document / जागा भाडेतत्त्वावरील असल्यास भाडेकरार कागदपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file">
                                @if ($mobileTowerService->tenancy_agreement)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->tenancy_agreement) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">Upload Site Occupancy Certificate / Construction Permission MapVOC / जागेचे भोगवटा प्रमाणपत्र / बांधकाम परवानगी नकाशा <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file">
                                @if ($mobileTowerService->site_occupancy)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->site_occupancy) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">Upload Medical certificate obtained from government hospital of employees / नोकरवगाचे शासकीय रुग्णालयातून घेतलेले वैद्यकीय प्रमाणपत्र <span
                                        class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file">
                                @if ($mobileTowerService->medical_certificate)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->medical_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="control">Upload Pest Control Certificate (if applicable) / नोकीटक नियंत्रण प्रमाणपत्र (लागू असल्यास) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="control" name="control" type="file">
                                @if ($mobileTowerService->pest_control)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->pest_control) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="registration">Upload GST Registration Certificate (Applicable) / GST नोंदणी प्रमाणपत्र (लागू) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="registration" name="registration" type="file">
                                @if ($mobileTowerService->gst_registration)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->gst_registration) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="food">Upload Certificate from Food and Drug Administration (if applicable) / अन्न आणि औषध प्रशासनाकडून प्रमाणपत्र (लागू असल्यास)<span
                                        class="text-danger">*</span></label></label>
                                <input class="form-control" id="food" name="food" type="file">
                                @if ($mobileTowerService->drug_administration)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->drug_administration) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="fire">Upload Fire Brigade No Objection Certificate (if applicable) / अअग्निशमन दलाचे ना हरकत प्रमाणपत्र (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="fire" name="fire" type="file">
                                @if ($mobileTowerService->fire_rigade)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->fire_rigade) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="liquor">Upload Copy of Liquor License from State Excise (if applicable) /
                                    राज्य उत्पादन शुल्कच्या मद्य परवान्याची प्रत (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="liquor" name="liquor" type="file">
                                @if ($mobileTowerService->liquor_license)
                                    <small><a href="{{ asset('storage/' . $mobileTowerService->liquor_license) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>



                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" checked class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
                                    <label class="form-check-label ms-2" for="is_correct_info">
                                        "All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार
                                        असेन."
                                    </label>
                                </div>
                                <span class="text-danger is-invalid is_correct_info_err"></span>
                            </div>

                        </div>
                    </div> --}}


                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                प्राथमिक माहिती/Basic information
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="name">दुकानाचे नाव इंग्रजी<span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter Shop name  in English" required value="{{ old('name', $mobileTowerService->name) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="m_name"> दुकानाचे नाव मराठी<span class="text-danger">*</span></label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Shop name Marathi" required value="{{ old('m_name', $mobileTowerService->m_name) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pancard_number">पैन कार्ड क्रमांक<span class="text-danger">*</span> </label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="number" placeholder="Enter Pancard Number" value="{{ old('pancard_number', $mobileTowerService->pancard_number) }}" required>
                                <span class="text-danger is-invalid pancard_number_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_no">	संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required value="{{ old('mobile_no', $mobileTowerService->mobile_no) }}">
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id"> ई-मेल<span class="text-danger">*</span></label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ old('email_id', $mobileTowerService->email_id) }}">
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">दुकानाचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ old('full_address', $mobileTowerService->full_address) }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}" @if ($zone->name == $mobileTowerService->zone) selected @endif>{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward_area" id="ward_area" required>
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option @if ($mobileTowerService->ward_area == $ward->name) selected @endif value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_area_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="financial_year">License Financial From Year</label>
                                <select class="form-select" id="financial_year" name="financial_year" required>
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}" {{ $mobileTowerService->financial_year == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="to_year">To Year</label>
                                <label class="col-form-label" for="to_year">License Financial From Year</label>
                                <select class="form-select" id="to_year" name="to_year" required>
                                    <option value="">-- Select year --</option>
                                    @foreach (range(1980, 2060) as $year)
                                        <option value="{{ $year }}" {{ $mobileTowerService->to_year == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="amount">रक्कम<span class="text-danger">*</span></label>
                                <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Applicant Name" required value="{{ old('amount', $mobileTowerService->amount) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">वस्तू निर्मित आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="होय" {{ isset($mobileTowerService) && $mobileTowerService->manufactured == 'होय' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manufactured" id="manufactured" value="नाही" {{ isset($mobileTowerService) && $mobileTowerService->manufactured == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">स्वते चे: मालकीचे जागेत व्यवसाय करीत आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="होय" {{ isset($mobileTowerService) && $mobileTowerService->business_premises == 'होय' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="business_premises" id="business_premises" value="नाही" {{ isset($mobileTowerService) && $mobileTowerService->business_premises == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="owner_place">जागा मालकीचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="owner_place" name="owner_place" type="text" placeholder="Enter Name of the owner of the place" required value="{{ old('owner_place', $mobileTowerService->owner_place) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="landlord_address">जागा मालकाचा पत्ता<span class="text-danger">*</span></label>
                                <input class="form-control" id="landlord_address" name="landlord_address" type="text" placeholder="Enter Name of the owner of the place" required value="{{ old('landlord_address', $mobileTowerService->landlord_address) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="rental_agreement">भाडे करार कोणासोबत केलेले आहे<span class="text-danger">*</span></label>
                                <input class="form-control" id="rental_agreement" name="rental_agreement" type="text" placeholder="Enter rental agreement" required value="{{ old('rental_agreement', $mobileTowerService->rental_agreement) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="area">वापरात आलेले जागेचे क्षेत्र चौ. फु. मध्ये<span class="text-danger">*</span></label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter" required value="{{ old('area', $mobileTowerService->area) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">व्यवसायासाठी म. न. पा. चे नाहरकत प्रमाणपत्र घेतले आहे का<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="होय"  {{ isset($mobileTowerService) && $mobileTowerService->noc_certificate == 'होय' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="होय">होय</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="noc_certificate" id="noc_certificate" value="नाही" {{ isset($mobileTowerService) && $mobileTowerService->noc_certificate == 'नाही' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="नाही">नाही</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_start">व्यवसाय सुरु केल्याचे वर्ष<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_start" name="business_start" type="number" placeholder="Year of business start" required value="{{ old('business_start', $mobileTowerService->business_start) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="registration_no">शॉप ऍक्ट नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="registration_no" name="registration_no" type="number" placeholder="" required value="{{ old('registration_no', $mobileTowerService->registration_no) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="food_drug">अन्न व ओषध प्रशासन कायद्यान्वये नोंदणी क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="food_drug" name="food_drug" type="text" placeholder="" required value="{{ old('food_drug', $mobileTowerService->food_drug) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="alert alert-warning fw-bold" role="alert">
                                संचालक माहिती/ Director information
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">संचालकांचा आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No" value="{{ old('aadhar_number', $mobileTowerService->aadhar_number) }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="director_name">संचालकांचा नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_name" name="director_name" type="text" placeholder="Enter Director Name" required value="{{ old('director_name', $mobileTowerService->director_name) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="contact_no">संपर्क क्र.<span class="text-danger">*</span></label>
                                <input class="form-control" id="contact_no" name="contact_no" type="number" placeholder="Enter  Number" required value="{{ old('contact_no', $mobileTowerService->contact_no) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_email">ई-मेल.<span class="text-danger">*</span></label>
                                <input class="form-control" id="alternet_email" name="alternet_email" type="email" placeholder="Enter  Number" required value="{{ old('alternet_email', $mobileTowerService->alternet_email) }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="alternet_address">पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alternet_address" id="alternet_address" cols="30" rows="2" placeholder="Enter Address" required>{{ old('alternet_address', $mobileTowerService->alternet_address) }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label">लिंग<span class="text-danger">*</span></label>
                                <div class="border rounded p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="स्त्री"  {{ isset($mobileTowerService) && $mobileTowerService->gender == 'स्त्री' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="स्त्री">स्त्री</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="पुरुष" {{ isset($mobileTowerService) && $mobileTowerService->gender == 'पुरुष' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="पुरुष">पुरुष</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="ईतर" {{ isset($mobileTowerService) && $mobileTowerService->gender == 'ईतर' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ईतर">ईतर</label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="application_type">अर्जदार प्रकार</label>
                                <select class="form-select" name="application_type" id="application_type">
                                    <option value="">Select Option</option>
                                    <option value="1" {{ $mobileTowerService->application_type == '1' ? 'selected' : '' }}>परितक्ता</option>
                                    <option value="2" {{ $mobileTowerService->application_type == '2' ? 'selected' : '' }}>प्रकल्पग्रस्त</option>
                                    <option value="3" {{ $mobileTowerService->application_type == '3' ? 'selected' : '' }}>पूरग्रस्त</option>
                                    <option value="4" {{ $mobileTowerService->application_type == '4' ? 'selected' : '' }}>अपंग</option>
                                    <option value="5" {{ $mobileTowerService->application_type == '5' ? 'selected' : '' }}>विधवा </option>
                                    <option value="6" {{ $mobileTowerService->application_type == '6' ? 'selected' : '' }}>सामान्य </option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="director_photos">संचालकाचां फोटो<span class="text-danger">*</span></label>
                                <input class="form-control" id="director_photos" name="director_photos" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->director_photo)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->director_photo) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err" required></span>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                कागदपत्र जोडणे/Attaching documents
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="upload_prescribed_formats">इतर कागद पत्रे (भागीदार फॉर्म_भाडेकरारनामा_एक्साईट परवाना)<span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->other_documents)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->other_documents) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err" required></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">अग्निशमन नाहरकत प्रमाणपत्र<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->fire_safety_certificate)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->fire_safety_certificate) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid place_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">बाजार परवाना (नुतनिकरणावेळेस)</label>
                                <input class="form-control" id="ownership" name="ownership" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->market_license)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->market_license) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">अन्न व औषध प्रशासन कायद्यान्वये नोंदणी प्रत</label>
                                <input class="form-control" id="water_bill" name="water_bills" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->food_drug_img)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->food_drug_img) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid water_bills_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">शॉप ऍक्ट<span class="text-danger">*</span></label>
                                <input class="form-control" id="society" name="society" type="file" accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->shop_act)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->shop_act) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">संचालकांचे पॅन कार्ड (मुळ प्रत)<span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->aadhar_pan)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->aadhar_pan) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">संचालकांचे आधार कार्ड (मुळ प्रत)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->aadharcard_image)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->aadharcard_image) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">चालु वर्षाची कर पावती<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->tax_receipt_img)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->tax_receipt_img) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">दुकानाचे आतील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->interior_photo)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->interior_photo) }}" target="_blank">View Document</a></small>
                            @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">दुकानाचे बाहेरील फोटो<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file"  accept="image/*"  onchange="previewImage(event)">
                                @if ($mobileTowerService->exterior_photo)
                                <small><a href="{{ asset('storage/' . $mobileTowerService->exterior_photo) }}" target="_blank">View Document</a></small>
                            @endif
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
        var updateUrl = '{{ route('mobile-tower.update', $mobileTowerService->id) }}';
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
