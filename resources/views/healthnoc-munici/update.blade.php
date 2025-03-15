<x-admin.layout>
    <x-slot name="title">Health NOC of municipality for state license of food business/खाद्य र्नोदणी प्रमाणपत्राकरीता नागरी स्थानिक स्वराज्य संस्थांचा आरोग्यविषयक नाहरकत दाखला</x-slot>
    <x-slot name="heading">Health NOC of municipality for state license of food business/खाद्य र्नोदणी प्रमाणपत्राकरीता नागरी स्थानिक स्वराज्य संस्थांचा आरोग्यविषयक नाहरकत दाखला</x-slot>

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
                                <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $healthlicenses->applicant_name ?? '' }}" required />
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $healthlicenses->email_id ?? '' }}" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number"
                                    value="{{ $healthlicenses->mobile_no ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" required>
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}" @if ($zone->name == $healthlicenses->zone) selected @endif>{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                <select class="form-select" name="ward_area" id="ward_area" required>
                                    <option value="">Select Ward Area</option>
                                    @foreach ($wards as $ward)
                                        <option @if ($healthlicenses->ward_area == $ward->name) selected @endif value="{{ $ward->name }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid ward_area_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">Aadhar Number / आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No" value="{{ $healthlicenses->aadhar_number ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>




                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pancard_number">Pancard Number / पैन कार्ड क्रमांक </label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="number" placeholder="Enter Pancard Number" value="{{ $healthlicenses->pancard_number ?? '' }}">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Applicant's Full Address / अर्जदाराचा पूर्ण पत्ता <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $healthlicenses->full_address ?? '' }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="business_name">Business Name / व्यवसायाचे नाव<span class="text-danger">*</span></label>
                                <input class="form-control" id="business_name" name="business_name" type="text" placeholder="Enter Applicant Name" value="{{ $healthlicenses->business_name ?? '' }}" required>
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">Business Type /व्यवसायाचा प्रकार</label>
                                <input class="form-control" id="business_type" name="business_type" type="text" placeholder="Enter Applicant Name" value="{{ $healthlicenses->business_type ?? '' }}">
                                <span class="text-danger is-invalid applicant_name_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="business">Business / व्यवसायाचा</label>
                                <select class="form-select" name="business" id="business">
                                    <option value="">Select Business</option>
                                    <option value="owner" {{ $healthlicenses->business == 'owner' ? 'selected' : '' }}>Owner/मालक</option>
                                    <option value="partner" {{ $healthlicenses->business == 'partner' ? 'selected' : '' }}>Partner/भागीदार</option>
                                    <option value="renter" {{ $healthlicenses->business == 'renter' ? 'selected' : '' }}>Renter/भाडेकरी</option>
                                    <option value="rent" {{ $healthlicenses->business == 'rent' ? 'selected' : '' }}>Rent/भाडे</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="gst">GST Number / जीएसटी क्रमांक </label>
                                <input class="form-control" id="gst" name="gst" type="text" placeholder="Enter GST Number" value="{{ $healthlicenses->gst ?? '' }}">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="area">Total Area / एकूण क्षेत्रफळ <span class="text-danger">*</span> </label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter Area By Meter" value="{{ $healthlicenses->area ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="date_commencement"> Date of Commencement of Business / व्यवसाय सुरू केळ्याचा
                                    दिनांक </label>
                                <input class="form-control" id="date_commencement" name="date_commencement" type="date" placeholder="Select Flat Assesment Date" value="{{ $healthlicenses->date_commencement ?? '' }}">
                                <span class="text-danger is-invalid flat_assesment_date_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="address_est">Address of establishment / आस्थापनेचा पत्ता<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address_est" id="address_est" cols="30" rows="2" placeholder="Enter Applicant Address" required>{{ $healthlicenses->address_est ?? '' }}</textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advance_device">Advance Devices / अग्निशामक उपकरणे</label>
                                <select class="form-select" name="advance_device" id="advance_device">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $healthlicenses->advance_device == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $healthlicenses->advance_device == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="first_aid">First Aid Box / प्रथमोपचार पेटी</label>
                                <select class="form-select" name="first_aid" id="first_aid" value="{{ old('box') }}">
                                    <option value="">Select Devices</option>
                                    <option value="yes" {{ $healthlicenses->first_aid == 'yes' ? 'selected' : '' }}>YES</option>
                                    <option value="no" {{ $healthlicenses->first_aid == 'no' ? 'selected' : '' }}>NO</option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="numb_of_worker">Number of Workers / कामगारांची संख्या </label>
                                <input class="form-control" id="numb_of_worker" name="numb_of_worker" type="number" placeholder="Enter Area By Meter" value="{{ $healthlicenses->numb_of_worker ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_women">Number of Women Class / महिला वर्ग संख्या </label>
                                <input class="form-control" id="number_of_women" name="number_of_women" type="number" placeholder="Enter Area By Meter" value="{{ $healthlicenses->number_of_women ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="number_of_men">Number of Men Class / पुरुष वर्ग संख्या </label>
                                <input class="form-control" id="number_of_men" name="number_of_men" type="number" placeholder="Enter Area By Meter" value="{{ $healthlicenses->number_of_men ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="other">other / इतर </label>
                                <input class="form-control" id="other" name="other" type="number" placeholder="Enter Area By Meter" value="{{ $healthlicenses->other ?? '' }}">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="upload_prescribed_formats">Upload Gumasta Certificate / गुमास्ता प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file">
                                @if ($healthlicenses->gumasta_certificate)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->gumasta_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">Upload Aadhar card or PAN card/ आधार कार्ड व पॅन कार्ड माणूस <span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file">
                                @if ($healthlicenses->gumasta_certificate)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->aadhar_pan) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">Upload Land ownership document / जागा मालकी कागदपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="ownership" name="ownership" type="file">
                                @if ($healthlicenses->gumasta_certificate)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->land_ownership) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">Upload Water bill payment receipt / पाणी देयक भरणा पावती </label>
                                <input class="form-control" id="water_bills" name="water_bills" type="file">
                                @if ($healthlicenses->water_bill)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->water_bill) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">Upload Society's No Objection Certificate / सोसायटीचे ना हरकत दाखला </label>
                                <input class="form-control" id="society" name="society" type="file">
                                @if ($healthlicenses->no_objection_certificate)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->no_objection_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">Upload Photo of place of business / व्यवसायाच्या ठिकाणाचा फोटो <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file">
                                @if ($healthlicenses->photo_of_place)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->photo_of_place) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">Upload Property tax payment receipt / मालमत्ता कर भरणा पावती <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file">
                                @if ($healthlicenses->property_tax)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->property_tax) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">Upload If the place is on lease Tenancy Agreement Document / जागा भाडेतत्त्वावरील असल्यास भाडेकरार कागदपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file">
                                @if ($healthlicenses->tenancy_agreement)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->tenancy_agreement) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">Upload Site Occupancy Certificate / Construction Permission MapVOC / जागेचे भोगवटा प्रमाणपत्र / बांधकाम परवानगी नकाशा <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file">
                                @if ($healthlicenses->site_occupancy)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->site_occupancy) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">Upload Medical certificate obtained from government hospital of employees / नोकरवगाचे शासकीय रुग्णालयातून घेतलेले वैद्यकीय प्रमाणपत्र <span
                                        class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file">
                                @if ($healthlicenses->medical_certificate)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->medical_certificate) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="control">Upload Pest Control Certificate (if applicable) / नोकीटक नियंत्रण प्रमाणपत्र (लागू असल्यास) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="control" name="control" type="file">
                                @if ($healthlicenses->pest_control)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->pest_control) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="registration">Upload GST Registration Certificate (Applicable) / GST नोंदणी प्रमाणपत्र (लागू) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="registration" name="registration" type="file">
                                @if ($healthlicenses->gst_registration)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->gst_registration) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="food">Upload Certificate from Food and Drug Administration (if applicable) / अन्न आणि औषध प्रशासनाकडून प्रमाणपत्र (लागू असल्यास)<span
                                        class="text-danger">*</span></label></label>
                                <input class="form-control" id="food" name="food" type="file">
                                @if ($healthlicenses->drug_administration)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->drug_administration) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="fire">Upload Fire Brigade No Objection Certificate (if applicable) / अअग्निशमन दलाचे ना हरकत प्रमाणपत्र (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="fire" name="fire" type="file">
                                @if ($healthlicenses->fire_rigade)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->fire_rigade) }}" target="_blank">View Document</a></small>
                                @endif
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="liquor">Upload Copy of Liquor License from State Excise (if applicable) /
                                    राज्य उत्पादन शुल्कच्या मद्य परवान्याची प्रत (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="liquor" name="liquor" type="file">
                                @if ($healthlicenses->liquor_license)
                                    <small><a href="{{ asset('storage/' . $healthlicenses->liquor_license) }}" target="_blank">View Document</a></small>
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
        var updateUrl = '{{ route('healthnoc-munici.update', $healthlicenses->id) }}';
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
