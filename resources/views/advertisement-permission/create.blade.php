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
                        <h4 class="card-title">Add Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">


                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_name">Applicant Name / अर्जदाराचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="applicant_object">Name Of the Object / अभिरणाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="applicant_object" name="applicant_object" type="text" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_object_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="status">Status / दर्जा</label>
                                <select class="form-select" name="statuss" id="statuss">
                                    <option value="">Select Status</option>
                                    <option value="owner">Privately Owned Organization/खाजगी मालकीची संस्था</option>
                                    <option value="company">Company/कंपनी</option>
                                    <option value="renter">Charitable Trust/धर्मादाय न्यास</option>
                                    <option value="rent">Other/इतर</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="faxid">Fax-id / फॅक्स क्र</label>
                                <input class="form-control" id="faxid" name="faxid" type="email" placeholder="Enter Fax" required>
                                <span class="text-danger is-invalid faxid_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_medium">Advertisement medium for which application is made /ज्यासाठी अर्ज केला आहे त्या जाहिरातीचे माध्यम</label>
                                <select class="form-select" name="advertisement_medium" id="advertisement_medium">
                                    <option value="">Select Devices</option>
                                    <option value="Published" {{ old('advertisement_medium') == 'Published' ? 'selected' : '' }}>Published</option>
                                    <option value="Unpublished" {{ old('advertisement_medium') == 'Unpublished' ? 'selected' : '' }}>Unpublished</option>
                                </select>
                                @error('advertisement_medium')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_type">Advertisement Type /जाहिरातीचा प्रकार</label>
                                <select class="form-select" name="advertisement_type" id="advertisement_type">
                                    <option value="">Select Devices</option>
                                    <option value="temporary" {{ old('advertisement_type') == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                    <option value="non_temporary" {{ old('advertisement_type') == 'non_temporary' ? 'selected' : '' }}>Non-Temporary</option>
                                </select>
                                @error('advertisement_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="applied">Format of the advertisement applied for/अर्ज केलेल्या जाहिरातीचे स्वरुप<span class="text-danger">*</span></label>
                                <input class="form-control" id="format" name="format" type="text" placeholder="Enter  Advertisement Applied " required>
                                <span class="text-danger is-invalid format_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="displaying_sign">Have you applied for displaying_sign a free sign? / मोफत निशाण प्रदर्शित करण्यासाठी अर्ज केला आहे का?</label>
                                <select class="form-select" name="displaying_sign" id="displaying_sign">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ old('displaying_sign') == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ old('displaying_sign') == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('displaying_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Additional Dropdown (Initially Hidden) -->
                            <div class="col-md-4" id="device_details" style="display: none;">
                                <label class="col-form-label" for="device_type">Device Type / उपकरण प्रकार</label>
                                <select class="form-select" name="device_type" id="device_type">
                                    <option value="">Select Device Type</option>
                                    <option value="educational">Educational/विद्याविषयक</option>
                                    <option value="religious">Religious/धार्मिक</option>
                                    <option value="social">Social Awareness/सामाजिक जनजागृती</option>
                                    <option value="health">Health /आरोग्य</option>
                                    <option value="political">Political/राजकिय </option>
                                    <option value="others_o">Others/इतर </option>
                                </select>
                                @error('device_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="length_foot">Length / लांबी</label>
                                <input class="form-control" id="length_foot" name="length_foot" type="text" placeholder="Measurement in sq.foot" required>
                                <span class="text-danger is-invalid length_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="length_meter">Length / लांबी</label>
                                <input class="form-control" id="length_meter" name="length_meter" type="text" placeholder="Measurement in sq.meter" required>
                                <span class="text-danger is-invalid length_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="width_foot">Width / रुंदी</label>
                                <input class="form-control" id="width_foot" name="width_foot" type="text" placeholder="Measurement in sq.foot" required>
                                <span class="text-danger is-invalid width_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="width_meter">Width / रुंदी</label>
                                <input class="form-control" id="width_meter" name="width_meter" type="text" placeholder="Measurement in sq.meter" required>
                                <span class="text-danger is-invalid width_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="total_foot">Total Area / एकुण क्षेत्र</label>
                                <input class="form-control" id="total_foot" name="total_foot" type="text" placeholder="Measurement in sq.foot" required>
                                <span class="text-danger is-invalid total_foot_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="total_meter">Total Area / एकुण क्षेत्र</label>
                                <input class="form-control" id="total_meter" name="total_meter" type="text" placeholder="Measurement   in sq.meter" required>
                                <span class="text-danger is-invalid total_meter_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="land_owner">Name of the Land Owner / जमीन मालकाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="land_owner" name="land_owner" type="text" placeholder="Enter  Land Owner Name" required>
                                <span class="text-danger is-invalid land_owner_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="no_objection_certificates">Has the land owner's no objection certificate been submitted ?/ जमीन मालकाचे नाहरकत प्रमाणपत्र सादर केले आहे का ?</label>
                                <select class="form-select" name="no_objection_certificates" id="no_objection_certificates">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ old('no_objection_certificates') == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ old('no_objection_certificates') == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('no_objection_certificates')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="rule_19">Whether the documents as per rule 19(b) have been submitted ?/ नियम १९ (ख) नूसार दस्तऐवज सादर करण्यात आले आहेत किं कसे ?</label>
                                <select class="form-select" name="rule_19" id="rule_19">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ old('rule_19') == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ old('rule_19') == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('rule_19')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="pancard_number">Pancard Number / मोबाईल नंबर</label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number"
                                    required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">Aadhar Number / आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No">
                                <span class="text-danger is-invalid aadhar_number_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_name">Business Name / व्यवसायाचे नाव</label>
                                <input class="form-control" id="business_name" name="business_name" type="text" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">Business Type /व्यवसायाचा प्रकार</label>
                                <input class="form-control" id="business_type" name="business_type" type="text" placeholder="Enter Applicant Name" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business">Business / व्यवसायाचा</label>
                                <select class="form-select" name="business" id="business">
                                    <option value="">Select Business</option>
                                    <option value="owner">Owner/मालक</option>
                                    <option value="partner">Partner/भागीदार</option>
                                    <option value="renter">Renter/भाडेकरी</option>
                                    <option value="rent">Rent/भाडे</option>
                                </select>
                                <span class="text-danger is-invalid business_err"></span>
                            </div>




                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="gst">GST Number / जीएसटी क्रमांक </label>
                                <input class="form-control" id="gst" name="gst" type="text" placeholder="Enter GST Number">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="area">Total Area / एकूण क्षेत्रफळ </label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter Area By Meter" required>
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="date_commencement"> Date of Commencement of Business / व्यवसाय सुरू केळ्याचा
                                    दिनांक </label>
                                <input class="form-control" id="date_commencement" name="date_commencement" type="date" placeholder="Select Flat Assesment Date">
                                <span class="text-danger is-invalid flat_assesment_date_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="address_est">Address of establishment / आस्थापनेचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address_est" id="address_est" cols="30" rows="2" placeholder="Enter Applicant Address" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="advance_device">Advance Devices / अग्निशामक उपकरणे</label>
                                <select class="form-select" name="advance_device" id="advance_device">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ old('advance_device') == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ old('advance_device') == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('advance_device')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="first_aid">First Aid Box / प्रथमोपचार पेटी</label>
                                <select class="form-select" name="first_aid" id="first_aid">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ old('first_aid') == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ old('first_aid') == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="numb_of_worker">Number of Workers / कामगारांची संख्या </label>
                                <input class="form-control" id="numb_of_worker" name="numb_of_worker" type="number" placeholder="Enter Area By Meter">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_women">Number of Women Class / महिला वर्ग संख्या </label>
                                <input class="form-control" id="number_of_women" name="number_of_women" type="number" placeholder="Enter Area By Meter">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_men">Number of Men Class / पुरुष वर्ग संख्या </label>
                                <input class="form-control" id="number_of_men" name="number_of_men" type="number" placeholder="Enter Area By Meter">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="other">other / इतर </label>
                                <input class="form-control" id="other" name="other" type="number" placeholder="Enter Area By Meter">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>






                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="applications">Upload From Application / नमुन्यातील अर्ज <span class="text-danger">*</span></label>
                                <input class="form-control" id="applications" name="applications" type="file" required>
                                <span class="text-danger is-invalid upload_application_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="owner_lands">Upload Owner land (7/12)/ जागेसंबंधी कागदपत्र (७/१२) <span class="text-danger">*</span></label>
                                <input class="form-control" id="owner_lands" name="owner_lands" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society_letters">Upload Society NOC on Society letter head / सोसायटीचे ना हरकत प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="society_letters" name="society_letters" type="file" required>
                                <span class="text-danger is-invalid upload_society_letters_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="resolution_socs">Upload Resolution of Society on Society letter head/ सोसायटीचा सर्वानुमते मंजुर ठराव </label>
                                <input class="form-control" id="resolution_socs" name="resolution_socs" type="file">
                                <span class="text-danger is-invalid upload_resolution_socs_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="light_bills">Upload Society Light Bill / सोसायटीचे लाईट बिल </label>
                                <input class="form-control" id="light_bills" name="light_bills" type="file">
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="structural_engineers">Upload Certificate of Structural engineer/ संरचना अभियंता यांचे प्रमाणपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="structural_engineers" name="structural_engineers" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="stability_certificates">Upload Stability Certificate / स्थिरता प्रमाणपत्र<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="stability_certificates" name="stability_certificates" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="police_nocs">Upload Trafic Police NOC / जावाहतुक विभागाचे ना हरकत प्रमाणपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="police_nocs" name="police_nocs" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="location_plans">Upload Location Plan/ स्थळदर्शक नकाशा<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="location_plans" name="location_plans" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="site_dtps">Upload Site DTP proposed Photo / साईट डीटीपी प्रस्तावित फोटो <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="site_dtps" name="site_dtps" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="taking_is">Upload Under Taking I /
                                    हमीपत्र 1 <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="taking_is" name="taking_is" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="taking_iis">Upload Under Taking II / हमीपत्र II <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="taking_iis" name="taking_iis" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="advertising_insurances">Upload Advertising Insurance / जाहिरात विमा<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="advertising_insurances" name="advertising_insurances" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="advertising_sizes">Upload Advertising size / अजाहिरात साइज<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="advertising_sizes" name="advertising_sizes" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="rental_agreements">Upload Rental agreement /
                                    भाडेकरार<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="rental_agreements" name="rental_agreements" type="file" required>
                                <span class="text-danger is-invalid upload_rental_agreements_err"></span>
                            </div>



                            <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-start">
                                    <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes" required>
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
        $.ajax({
            url: '{{ route('advertisement-permission.store') }}',
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

    document.getElementById('displaying_sign').addEventListener('change', function() {
        var deviceDetails = document.getElementById('device_details');
        if (this.value === 'yes') {
            deviceDetails.style.display = 'block'; // Show dropdown
        } else {
            deviceDetails.style.display = 'none'; // Hide dropdown
            document.getElementById('device_type').value = ''; // Reset the second dropdown
        }
    });
</script>
