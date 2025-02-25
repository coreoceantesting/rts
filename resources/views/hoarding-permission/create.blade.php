<x-admin.layout>
    <x-slot name="title">Hoarding Permission / होर्डिंग-परवानगी</x-slot>
    <x-slot name="heading">Hoarding Permission /होर्डिंग-परवानगी </x-slot>

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

                        <div class="mb-4 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                Applicant Details
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="title">Title (शीर्षक)<span class="text-danger">*</span></label>
                                <select name="title" id="title" class="form-select" required>
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="Mr (श्री)">Mr (श्री)</option>
                                    <option value="Mrs (सौ)">Mrs (सौ)</option>
                                    <option value="Ms (कु)">Ms (कु) </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="f_name">First Name(पहिले नाव)<span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" required>
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="m_name">Middle Name (मधले नाव)</label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" required>
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="l_name">Last Name (आडनाव ) <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" required>
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Address of Applicant(अर्जदाराचा पत्ता)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" required></textarea>
                                <span class="text-danger is-invalid applicant_full_address_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="mobile_no">Mobile Number (मोबाईल नंबर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
                                <span class="text-danger is-invalid applicant_mobile_no_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="email_id">Email Id (ई - मेल आयडी)</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" required>
                                <span class="text-danger is-invalid email_id_err"></span>
                            </div>

                        </div>


                        <div class="mb-4 row">
                            <div class="alert alert-warning fw-bold" role="alert">
                                Site Details of Hoardings
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="type_hoarding">Type of Hoarding (आकाशचिन्हाचा प्रकार)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="type_hoarding" id="type_hoarding">
                                    <option value="">--Select--</option>
                                    <option value="Permenant">Permanent / कायमस्वरूपी</option>
                                    <option value="Temporary"> Temporary / तात्पुरते </option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_place">Place of advertisement (जाहिरातीचे ठिकाण)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="advertisement_place" id="advertisement_place">
                                    <option value="">--Select--</option>
                                    <option value="1">Bhavsingpura Ramabai Chowk </option>
                                    <option value="2"> Bhavsingpura Amen Chowk  </option>
                                    <option value="3">Bhavsingpura Ambedkar Chowk </option>
                                    <option value="4"> Opposite Bhavsingpura Municipal School  </option>
                                    <option value="5">Behind the Bhavsingpura Sanchi Arch </option>
                                    <option value="6"> Chinar Garden Chowk  </option>
                                    <option value="7">Dirt road in front of Vani Complex </option>
                                    <option value="8"> Dirt road in front of Punjabi Bhavan  </option>
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
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
                                <label class="col-form-label" for="chowk">Chowk (चौक)<span class="text-danger">*</span></label>
                                <input class="form-control" id="chowk" name="chowk" type="text" placeholder="Enter Chowk Name" required>
                                <span class="text-danger is-invalid chowk_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="plot_no">Plot No. (प्लॉट क्र.)<span class="text-danger">*</span></label>
                                <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter plot no Name" required>
                                <span class="text-danger is-invalid plot_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_number">Aadhar Number / आधार क्रमांक </label>
                                <input class="form-control" id="aadhar_number" name="aadhar_number" type="number" placeholder="Enter Aadhar Card No">
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>




                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="pancard_number">Pancard Number / पैन कार्ड क्रमांक </label>
                                <input class="form-control" id="pancard_number" name="pancard_number" type="number" placeholder="Enter Pancard Number">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>



                            <div class="col-md-4">
                                <label class="col-form-label" for="business_type">Business Type /व्यवसायाचा प्रकार
                                    <span class="text-danger">*</span>
                                </label>
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
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>




                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="gst">GST Number / जीएसटी क्रमांक </label>
                                <input class="form-control" id="gst" name="gst" type="text" placeholder="Enter GST Number">
                                <span class="text-danger is-invalid pancard_no_err"></span>
                            </div>



                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="area">Total Area / एकूण क्षेत्रफळ <span class="text-danger">*</span> </label>
                                <input class="form-control" id="area" name="area" type="number" placeholder="Enter Area By Meter" required>
                                <span class="text-danger is-invalid aadhar_no_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="date_commencement"> Date of COmmencement of Business / व्यवसाय सुरू केळ्याचा
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
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="text-danger is-invalid advance_device_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="first_aid">First Aid Box / प्रथमोपचार पेटी</label>
                                <select class="form-select" name="first_aid" id="first_aid">
                                    <option value="">Select </option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="text-danger is-invalid first_aid_err"></span>
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
                                <label class="col-form-label" for="upload_prescribed_formats">Upload Gumasta Certificate / गुमास्ता प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="aadhar_pans">Upload Aadhar card or PAN card/ आधार कार्ड व पॅन कार्ड माणूस <span class="text-danger">*</span></label>
                                <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="ownership">Upload Land ownership document / जागा मालकी कागदपत्र <span class="text-danger">*</span></label>
                                <input class="form-control" id="ownership" name="ownership" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="water_bills">Upload Water bill payment receipt / पाणी देयक भरणा पावती </label>
                                <input class="form-control" id="water_bills" name="water_bills" type="file">
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="society">Upload Society's No Objection Certificate / सोसायटीचे ना हरकत दाखला </label>
                                <input class="form-control" id="society" name="society" type="file">
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="place">Upload Photo of place of business / व्यवसायाच्या ठिकाणाचा फोटो <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="place" name="place" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="property">Upload Property tax payment receipt / मालमत्ता कर भरणा पावती <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="property" name="property" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="tenancy">Upload If the place is on lease Tenancy Agreement Document / जागा भाडेतत्त्वावरील असल्यास भाडेकरार कागदपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="tenancy" name="tenancy" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="occupancy">Upload Site Occupancy Certificate / Construction Permission MapVOC / जागेचे भोगवटा प्रमाणपत्र / बांधकाम परवानगी नकाशा <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="occupancy" name="occupancy" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="medical">Upload Medical certificate obtained from government hospital of employees / नोकरवगाचे शासकीय रुग्णालयातून घेतलेले वैद्यकीय प्रमाणपत्र <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="medical" name="medical" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="control">Upload Pest Control Certificate (if applicable) / नोकीटक नियंत्रण प्रमाणपत्र (लागू असल्यास) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="control" name="control" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="registration">Upload GST Registration Certificate (Applicable) / GST नोंदणी प्रमाणपत्र (लागू) <span class="text-danger">*</span></label></label>
                                <input class="form-control" id="registration" name="registration" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="food">Upload Certificate from Food and Drug Administration (if applicable) / अन्न आणि औषध प्रशासनाकडून प्रमाणपत्र (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="food" name="food" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="fire">Upload Fire Brigade No Objection Certificate (if applicable) / अअग्निशमन दलाचे ना हरकत प्रमाणपत्र (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="fire" name="fire" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="col-form-label" for="liquor">Upload Copy of Liquor License from State Excise (if applicable) /
                                    राज्य उत्पादन शुल्कच्या मद्य परवान्याची प्रत (लागू असल्यास)<span class="text-danger">*</span></label></label>
                                <input class="form-control" id="liquor" name="liquor" type="file" required>
                                <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                            </div>

                            {{-- <div class="col-md-4">
                                <label class="col-form-label" for="documents">Document<span class="text-danger">*</span></label>
                                <input class="form-control" id="documents" name="documents" type="file" placeholder="Enter Document" required>
                                <span class="text-danger is-invalid documents_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="commencement_certificate_no">Commencement Certificate Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="commencement_certificate_no" name="commencement_certificate_no" type="text" placeholder="Enter Building No" required>
                                <span class="text-danger is-invalid commencement_certificate_no_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="plinth_number">Jote/Plinth Number<span class="text-danger">*</span></label>
                                <input class="form-control" id="plinth_number" name="plinth_number" type="text" placeholder="Enter Building No" required>
                                <span class="text-danger is-invalid plinth_number_err"></span>
                            </div> --}}

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
            url: '{{ route('hoarding-permission.store') }}',
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
