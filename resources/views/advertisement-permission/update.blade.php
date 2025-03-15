<x-admin.layout>
    <x-slot name="title">Advertizement Permission / जाहिरात परवानगी</x-slot>
    <x-slot name="heading">Advertizement Permission /जाहिरात परवानगी</x-slot>

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


                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" value="{{ old('applicant_name', $advertisemenent->applicant_name) }}" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_object">Name Of the Object / अभिरणाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_object" name="applicant_object" type="text" value="{{ old('applicant_object', $advertisemenent->applicant_object) }}"placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_object_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="status">Status / दर्जा</label>
                                <select class="form-select" name="statuss" id="statuss">
                                    <option value="">Select Status</option>
                                    <option value="owner" {{ $advertisemenent->statuss == 'owner' ? 'selected' : '' }}>Privately Owned Organization/खाजगी मालकीची संस्था</option>
                                    <option value="company" {{ $advertisemenent->statuss == 'company' ? 'selected' : '' }}>Company/कंपनी</option>
                                    <option value="renter" {{ $advertisemenent->statuss == 'renter' ? 'selected' : '' }}>Charitable Trust/धर्मादाय न्यास</option>
                                    <option value="rent" {{ $advertisemenent->statuss == 'rent' ? 'selected' : '' }}>Other/इतर</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $advertisemenent->full_address ?? '' }}</textarea>
                                <span class="text-danger is-invalid full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                <input class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" type="text" value="{{ $advertisemenent->mobile_no ?? '' }}" oninput="this.value = this.value.replace(/\D/g, '')"
                                    maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                @error('applicant_mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>




                            <div class="col-md-4">
                                <label class="col-form-label" for="faxid">Fax-id / फॅक्स क्र</label>
                                <input class="form-control" id="faxid" name="faxid" type="email" value="{{ old('faxid', $advertisemenent->faxid) }}" placeholder="Enter fax">
                                <span class="text-danger is-invalid faxid_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ old('email_id', $advertisemenent->email_id) }}" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_medium">Advertisement medium for which application is made /ज्यासाठी अर्ज केला आहे त्या जाहिरातीचे माध्यम</label>
                                <select class="form-select" name="advertisement_medium" id="advertisement_medium">
                                    <option value="">Select Devices</option>
                                    <option value="Published" {{ $advertisemenent->advertisement_medium == 'Published' ? 'selected' : '' }}>Published</option>
                                    <option value="Unpublished" {{ $advertisemenent->advertisement_medium == 'Unpublished' ? 'selected' : '' }}>Unpublished</option>
                                </select>
                                @error('advertisement_medium')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_type">Advertisement Type /जाहिरातीचा प्रकार</label>
                                <select class="form-select" name="advertisement_type" id="advertisement_type">
                                    <option value="">Select Devices</option>
                                    <option value="temporary"{{ $advertisemenent->advertisement_type == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                    <option value="non_temporary" {{ $advertisemenent->advertisement_type == 'non_temporary' ? 'selected' : '' }}>Non-Temporary</option>
                                </select>
                                @error('advertisement_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="applied">Format of the advertisement applied for/अर्ज केलेल्या जाहिरातीचे स्वरुप<span class="text-danger">*</span></label>
                                <input class="form-control" id="format" name="format" type="text" placeholder="Enter  Advertisement Applied " value="{{ old('format', $advertisemenent->format) }}" required>
                                <span class="text-danger is-invalid format_err"></span>
                            </div>

                            {{-- <div class="col-md-4">
                                <label class="col-form-label" for="displaying_sign">Have you applied for displaying_sign a free sign? / मोफत निशाण प्रदर्शित करण्यासाठी अर्ज केला आहे का?</label>
                                <select class="form-select" name="displaying_sign" id="displaying_sign">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->displaying_sign == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $advertisemenent->displaying_sign == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('displaying_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <!-- Additional Dropdown (Initially Hidden) -->
                            {{-- <div class="col-md-4" id="device_details" style="display: none;">
                                <label class="col-form-label" for="device_type">Device Type / उपकरण प्रकार</label>
                                <select class="form-select" name="device_type" id="device_type">
                                    <option value="">Select Device Type</option>
                                    <option value="educational" {{ old('advertisement_type') == 'educational' ? 'selected' : '' }}>Educational/विद्याविषयक</option>
                                    <option value="religious" {{ old('advertisement_type') == 'religious' ? 'selected' : '' }}>Religious/धार्मिक</option>
                                    <option value="social" {{ old('advertisement_type') == 'social' ? 'selected' : '' }}>Social Awareness/सामाजिक जनजागृती</option>
                                    <option value="health">Health /आरोग्य {{ old('advertisement_type') == 'health' ? 'selected' : '' }} </option>
                                    <option value="political">Political/राजकिय {{ old('advertisement_type') == 'political' ? 'selected' : '' }}</option>
                                    <option value="others_o">Others/इतर {{ old('advertisement_type') == 'others_o' ? 'selected' : '' }}</option>
                                </select>
                                @error('device_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}


                            <div class="col-md-4">
                                <label class="col-form-label" for="displaying_sign"> Have you applied for displaying a free sign? / मोफत निशाण प्रदर्शित करण्यासाठी अर्ज केला आहे का?</label>
                                <select class="form-select" name="displaying_sign" id="displaying_sign">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->displaying_sign == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no"{{ $advertisemenent->displaying_sign == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('displaying_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="col-md-4" id="device_details">
                                <label class="col-form-label" for="device_type">Device Type / उपकरण प्रकार </label>
                                <select class="form-select" name="device_type">
                                    <option value="">Select device_detail</option>
                                    <option value="educational" {{ old('device_type', $advertisemenent->device_type == 'educational' ? 'selected' : '') }}>Educational/विद्याविषयक</option>
                                    <option value="religious" {{ old('device_type', $advertisemenent->device_type == 'religious' ? 'selected' : '') }}>Religious/धार्मिक</option>
                                    <option value="social" {{ old('device_type', $advertisemenent->device_type == 'social' ? 'selected' : '') }}>Social Awareness/सामाजिक जनजागृती</option>
                                    <option value="health" {{ old('device_type', $advertisemenent->device_type == 'health' ? 'selected' : '') }}>Health /आरोग्य</option>
                                    <option value="political" {{ old('device_type', $advertisemenent->device_type == 'political' ? 'selected' : '') }}>Political/राजकिय</option>
                                    <option value="others_o" {{ old('device_type', $advertisemenent->device_type == 'others_o' ? 'selected' : '') }}>Others/इतर</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="length_foot">Length / लांबी</label>
                                <input class="form-control" id="length_foot" name="length_foot" type="text" placeholder="Measurement in sq.foot" value="{{ old('length_foot', $advertisemenent->length_foot) }}" required>
                                <span class="text-danger is-invalid length_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="length_meter">Length / लांबी</label>
                                <input class="form-control" id="length_meter" name="length_meter" type="text" placeholder="Measurement in sq.meter" value="{{ old('length_meter', $advertisemenent->length_meter) }}" required>
                                <span class="text-danger is-invalid length_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="width_foot">Width / रुंदी</label>
                                <input class="form-control" id="width_foot" name="width_foot" type="text" placeholder="Measurement in sq.foot"value="{{ old('width_foot', $advertisemenent->width_foot) }}" required>
                                <span class="text-danger is-invalid width_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="width_meter">Width / रुंदी</label>
                                <input class="form-control" id="width_meter" name="width_meter" type="text" placeholder="Measurement in sq.meter" value="{{ old('width_meter', $advertisemenent->width_meter) }}" required>
                                <span class="text-danger is-invalid width_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="total_foot">Total Area / एकुण क्षेत्र</label>
                                <input class="form-control" id="total_foot" name="total_foot" type="text" placeholder="Measurement in sq.foot" value="{{ old('total_foot', $advertisemenent->total_foot) }}" required>
                                <span class="text-danger is-invalid total_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="total_meter">Total Area / एकुण क्षेत्र</label>
                                <input class="form-control" id="total_meter" name="total_meter" type="text" placeholder="Measurement   in sq.meter" value="{{ old('total_meter', $advertisemenent->total_meter) }}" required>
                                <span class="text-danger is-invalid total_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="land_owner">Name of the Land Owner / जमीन मालकाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="land_owner" name="land_owner" type="text" placeholder="Enter  Land Owner Name" value="{{ old('land_owner', $advertisemenent->land_owner) }}" required>
                                <span class="text-danger is-invalid land_owner_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="no_objection_certificates">Has the land owner's no objection certificate been submitted ?/ जमीन मालकाचे नाहरकत प्रमाणपत्र सादर केले आहे का ?</label>
                                <select class="form-select" name="no_objection_certificates" id="no_objection_certificates">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->no_objection_certificates == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no"{{ $advertisemenent->no_objection_certificates == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('no_objection_certificates')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="rule_19">Whether the documents as per rule 19(b) have been submitted ?/ नियम १९ (ख) नूसार दस्तऐवज सादर करण्यात आले आहेत किं कसे ?</label>
                                <select class="form-select" name="rule_19" id="rule_19">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->rule_19 == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $advertisemenent->rule_19 == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('rule_19')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pancard_number">Pancard Number / पैन कार्ड क्रमांक </label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="text" placeholder="Enter Pancard Number" value="{{ $advertisemenent->pancard_number ?? '' }}">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">Aadhar Number / आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No" value="{{ $advertisemenent->aadhar_number ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_name">Business Name / व्यवसायाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $advertisemenent->applicant_name ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">Business Type /व्यवसायाचा प्रकार</label>
                                <input class="form-control" id="business_type" name="business_type" type="text" placeholder="Enter Busoness Type" value="{{ $advertisemenent->business_type ?? '' }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business">Business / व्यवसायाचा</label>
                                <select class="form-select" name="business" id="business">
                                    <option value="">Select Business</option>
                                    <option value="owner" {{ $advertisemenent->business == 'owner' ? 'selected' : '' }}>Owner/मालक</option>
                                    <option value="partner" {{ $advertisemenent->business == 'partner' ? 'selected' : '' }}>Partner/भागीदार</option>
                                    <option value="renter" {{ $advertisemenent->business == 'renter' ? 'selected' : '' }}>Renter/भाडेकरी</option>
                                    <option value="rent" {{ $advertisemenent->business == 'rent' ? 'selected' : '' }}>Rent/भाडे</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="gst">GST Number / जीएसटी क्रमांक </label>
                                <input class="form-control" id="gst" name="gst" type="text" placeholder="Enter GST Number" value="{{ $advertisemenent->gst ?? '' }}">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="area">Total Area / एकूण क्षेत्रफळ <span class="text-danger">*</span> </label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter Area By Meter" value="{{ $advertisemenent->area ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="date_commencement"> Date of Commencement of Business / व्यवसाय सुरू केळ्याचा
                                    दिनांक </label>
                                <input class="form-control" id="date_commencement" name="date_commencement" type="date" placeholder="Select Flat Assesment Date" value="{{ $advertisemenent->date_commencement ?? '' }}">
                                <span class="text-danger is-invalid flat_assesment_date_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="address_est">Address of establishment / आस्थापनेचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address_est" id="address_est" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $advertisemenent->address_est ?? '' }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="advance_device">Advance Devices / अग्निशामक उपकरणे</label>
                                <select class="form-select" name="advance_device" id="advance_device">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->advance_device == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $advertisemenent->advance_device == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="first_aid">First Aid Box / प्रथमोपचार पेटी</label>
                                <select class="form-select" name="first_aid" id="first_aid" value="{{ old('box') }}">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $advertisemenent->first_aid == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $advertisemenent->first_aid == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="numb_of_worker">Number of Workers / कामगारांची संख्या </label>
                                <input class="form-control" id="numb_of_worker" name="numb_of_worker" type="number" placeholder="Enter Area By Meter" value="{{ $advertisemenent->numb_of_worker ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_women">Number of Women Class / महिला वर्ग संख्या </label>
                                <input class="form-control" id="number_of_women" name="number_of_women" type="number" placeholder="Enter Area By Meter" value="{{ $advertisemenent->number_of_women ?? '' }}">
                                <span class="text-danger is-number_of_women_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_men">Number of Men Class / पुरुष वर्ग संख्या </label>
                                <input class="form-control" id="number_of_men" name="number_of_men" type="number" placeholder="Enter Area By Meter" value="{{ $advertisemenent->number_of_men ?? '' }}">
                                <span class="text-danger is-number_of_men_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="other">other / इतर </label>
                                <input class="form-control" id="other" name="other" type="number" placeholder="Enter Area By Meter" value="{{ $advertisemenent->other ?? '' }}">
                                <span class="text-danger is-invalid other_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="applications">Upload From Application / नमुन्यातील अर्ज <span class="text-danger">*</span></label>
                                <input class="form-control" id="applications" name="applications" type="file" required>
                                @if ($advertisemenent->application)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->application) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_application_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="owner_lands">Upload Owner land (7/12)/ जागेसंबंधी कागदपत्र (७/१२) <span class="text-danger">*</span></label>
                                <input class="form-control" id="owner_lands" name="owner_lands" type="file" required>
                                @if ($advertisemenent->owner_land)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->owner_land) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_owner_lands_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society_letters">Upload Society NOC on Society letter head / सोसायटीचे ना हरकत प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="society_letters" name="society_letters" type="file" required>
                                @if ($advertisemenent->society_letter)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->society_letter) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="resolution_socs">Upload Resolution of Society on Society letter head/ सोसायटीचा सर्वानुमते मंजुर ठराव </label>
                                <input class="form-control" id="resolution_socs" name="resolution_socs" type="file">
                                @if ($advertisemenent->resolution_soc)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->resolution_soc) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_resolution_socs_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="light_bills">Upload Society Light Bill / सोसायटीचे लाईट बिल </label>
                                <input class="form-control" id="light_bills" name="light_bills" type="file">
                                @if ($advertisemenent->light_bill)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->light_bill) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="structural_engineers">Upload Certificate of Structural engineer/ संरचना अभियंता यांचे प्रमाणपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="structural_engineers" name="structural_engineers" type="file" required>
                                @if ($advertisemenent->structural_engineer)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->structural_engineer) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="stability_certificates">Upload Stability Certificate / स्थिरता प्रमाणपत्र<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="stability_certificates" name="stability_certificates" type="file" required>
                                @if ($advertisemenent->stability_certificate)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->stability_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="police_nocs">Upload Trafic Police NOC / जावाहतुक विभागाचे ना हरकत प्रमाणपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="police_nocs" name="police_nocs" type="file" required>
                                @if ($advertisemenent->police_noc)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->police_noc) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_police_nocs_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="location_plans">Upload Location Plan/ स्थळदर्शक नकाशा<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="location_plans" name="location_plans" type="file" required>
                                @if ($advertisemenent->location_plan)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->location_plan) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_location_plans_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="site_dtps">Upload Site DTP proposed Photo / साईट डीटीपी प्रस्तावित फोटो <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="site_dtps" name="site_dtps" type="file" required>
                                @if ($advertisemenent->site_dtp)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->site_dtp) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_site_dtps_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="taking_is">Upload Under Taking I /
                                    हमीपत्र 1 <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="taking_is" name="taking_is" type="file" required>
                                @if ($advertisemenent->taking_i)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->taking_i) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="taking_iis">Upload Under Taking II / हमीपत्र II <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="taking_iis" name="taking_iis" type="file" required>
                                @if ($advertisemenent->taking_ii)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->taking_ii) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="advertising_insurances">Upload Advertising Insurance / जाहिरात विमा<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="advertising_insurances" name="advertising_insurances" type="file" required>
                                @if ($advertisemenent->advertising_insurance)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->advertising_insurance) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="advertising_sizes">Upload Advertising size / अजाहिरात साइज<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="advertising_sizes" name="advertising_sizes" type="file" required>
                                @if ($advertisemenent->advertising_size)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->advertising_size) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="rental_agreements">Upload Rental agreement /
                                    भाडेकरार<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="rental_agreements" name="rental_agreements" type="file" required>
                                @if ($advertisemenent->rental_agreement)
                                    <small><a href="{{ asset('storage/' . $advertisemenent->rental_agreement) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_rental_agreements_err"></span>
                            </div>



                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" checked class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
                                    <label class="form-check-label ms-2" for="is_correct_info">
                                        "I have carefully read the provisions of the Maharashtra Municipal Corporation (Regulation and Control of Sky Signs and Advertisement Display) Rules, 2014 given above and have complied with all the conditions.
                                        I agree that if the information provided by me is found to be false, I will be liable to penal action as prescribed under law. <br> मी, वर दिलेल्या महाराष्ट्र महानगरपालिका (आकाशचिन्हे व जाहिरात प्रदर्शन नियमन व
                                        नियंत्रण) नियम, २०१४ च्या तरतुदी काळजीपूर्वक वाचल्या आहेत आणि सर्व शर्तीचे अनूपालन केले आहे. मी दिलेली माहिती खोटी असल्याचे आढळून आल्यास, कायद्यानुसार विहित करण्यात येईल अशा दंडात्मक कार्यवाहीसाठी मी पात्र असेन
                                        असे मी मान्य करतो"
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
        var updateUrl = '{{ route('advertisement-permission.update', $advertisemenent->id) }}';
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

    document.addEventListener('DOMContentLoaded', function() {
        const displayingSignSelect = document.getElementById('displaying_sign');
        const deviceDetailsDiv = document.getElementById('device_details');

        // Show/hide device details dropdown based on displaying_sign selection
        displayingSignSelect.addEventListener('change', function() {
            if (this.value == 'yes') {
                deviceDetailsDiv.style.display = 'block';
            } else {
                deviceDetailsDiv.style.display = 'none';
            }
        });

        // Trigger the event to check the initial value
        if (displayingSignSelect.value == 'yes') {
            deviceDetailsDiv.style.display = 'block';
        }
    });
</script>
