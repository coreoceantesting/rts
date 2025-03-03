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
                                <select name="title" id="title" class="form-select" >
                                    <option value="" disabled selected> -- Select -- </option>
                                    <option value="Mr (श्री)">Mr (श्री)</option>
                                    <option value="Mrs (सौ)">Mrs (सौ)</option>
                                    <option value="Ms (कु)">Ms (कु) </option>
                                </select>
                                <span class="text-danger is-invalid title_err"></span>

                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="f_name">First Name(पहिले नाव)<span class="text-danger">*</span></label>
                                <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name" >
                                <span class="text-danger is-invalid f_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="m_name">Middle Name (मधले नाव)</label>
                                <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name" >
                                <span class="text-danger is-invalid m_name_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="l_name">Last Name (आडनाव ) <span class="text-danger">*</span></label>
                                <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name" >
                                <span class="text-danger is-invalid l_name_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="full_address">Address of Applicant(अर्जदाराचा पत्ता)<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="2" placeholder="Enter Applicant Address" ></textarea>
                                <span class="text-danger is-invalid full_address_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="mobile_no">Mobile Number (मोबाईल नंबर)<span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile_no" name="mobile_no" type="text" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" placeholder="Enter Mobile Number" >
                                <span class="text-danger is-invalid mobile_no_err"></span>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label" for="email_id">Email Id (ई - मेल आयडी)</label>
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" >
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
                                <span class="text-danger is-invalid type_hoarding_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="advertisement_place">Place of advertisement (जाहिरातीचे ठिकाण)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="advertisement_place" id="advertisement_place">
                                    <option value="">--Select--</option>
                                    <option value="1">Bhavsingpura Ramabai Chowk </option>
                                    <option value="2"> Bhavsingpura Amen Chowk </option>
                                    <option value="3">Bhavsingpura Ambedkar Chowk </option>
                                    <option value="4"> Opposite Bhavsingpura Municipal School </option>
                                    <option value="5">Behind the Bhavsingpura Sanchi Arch </option>
                                    <option value="6"> Chinar Garden Chowk </option>
                                    <option value="7">Dirt road in front of Vani Complex </option>
                                    <option value="8"> Dirt road in front of Punjabi Bhavan </option>
                                </select>
                                <span class="text-danger is-invalid advertisement_place_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                <select class="form-select" name="zone" id="zone" >
                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid zone_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="chowk">Chowk (चौक)<span class="text-danger">*</span></label>
                                <input class="form-control" id="chowk" name="chowk" type="text" placeholder="Enter Chowk Name" >
                                <span class="text-danger is-invalid chowk_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="plot_no">Plot No. (प्लॉट क्र.)<span class="text-danger">*</span></label>
                                <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter plot no Name" >
                                <span class="text-danger is-invalid plot_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="size_hoarding">Size of Hoarding (होर्डिंगचा आकार)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="size_hoarding" id="size_hoarding">
                                    <option value="">--Select--</option>
                                    <option value="Class A-10x12 Sq.ft.-500 / वर्ग A-10x12 Sq.ft.-500">Class A-10x12 Sq.ft.-500 / वर्ग A-10x12 Sq.ft.-500</option>
                                    <option value="Class B-8x10 Sq.ft.-300   /  वर्ग B-8x10 Sq.ft.-300"> Class B-8x10 Sq.ft.-300 / वर्ग B-8x10 Sq.ft.-300 </option>
                                    <option value="Class C-8x5 Sq.ft.-200   /  वर्ग C-8x5 Sq.ft.-200"> Class C-8x5 Sq.ft.-200 / वर्ग C-8x5 Sq.ft.-200 </option>
                                </select>
                                <span class="text-danger is-invalid size_hoarding_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="bussiness_hoarding">Business type for which Advertise Hoarding Booked (व्यवसाय प्रकार ज्यासाठी जाहिरात होर्डिंग बुक केले आहे)<span class="text-danger">*</span></label>
                                <input class="form-control" id="bussiness_hoarding" name="bussiness_hoarding" type="text" placeholder="Enter plot no Name" >
                                <span class="text-danger is-invalid bussiness_hoarding_err"></span>
                            </div>


                            <div class="col-md-6">
                                <label class="col-form-label" for="format_advertisement">Format of advertisement( Instructions should be given regarding published and unpublished) जाहिरातीचे स्वरूप (प्रकाशित व अप्रकाशित यासंबंधी निर्देश करावा)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="format_advertisement" id="format_advertisement">
                                    <option value="">--Select--</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No"> No</option>

                                </select>
                                <span class="text-danger is-invalid format_advertisement_err"></span>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="height">Height of the advertisement’s bottom edge from street level (In Feet)(रस्त्याच्या पातळीपासून जाहिरातीच्या तळाची उंची ( फूट मध्ये))<span class="text-danger">*</span></label>
                                <input class="form-control" id="height" name="height" type="text" placeholder="Enter Height" >
                                <span class="text-danger is-invalid height_err"></span>
                            </div>


                            <div class="col-md-4" style="margin-top: 20px">
                                <label class="col-form-label" for="structure">Details of structure (संरचनेचा तपशील)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="structure" id="structure" style="margin-top: 20px">
                                    <option value="">--Select--</option>
                                    <option value="Timber/लाकूड">Timber/लाकूड</option>
                                    <option value="Steel/पोलाद"> Steel/पोलाद</option>
                                    <option value="Other/इतर"> Other/इतर</option>

                                </select>
                                <span class="text-danger is-invalid structure_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="open_populated">The location of the sky sign is an open space or a populated area(मालमत्तेचे स्थान)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="open_populated" id="open_populated" style="margin-top: 20px">
                                    <option value="">--Select--</option>
                                    <option value="Open Space/मोकळी जागा">Open Space/मोकळी जागा</option>
                                    <option value="Populated Area/लोकवस्तीचे क्षेत्र">Populated Area/लोकवस्तीचे क्षेत्र</option>
                                </select>
                                <span class="text-danger is-invalid open_populated_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="behalf">Is the application made individually or on behalf of the company or how? If so / details of the company / individual with full address (पूर्ण पत्त्या सहित कंपनीचा/ व्यक्तीचा तपशील)<span class="text-danger">*</span> </label>
                                <select class="form-select" name="behalf" id="behalf">
                                    <option value="">--Select--</option>
                                    <option value="Individual/वैयक्तिक">Individual/वैयक्तिक</option>
                                    <option value="Through Company/कंपनीच्या माध्यमातून">Through Company/कंपनीच्या माध्यमातून</option>
                                    <option value="Through Agency/एजन्सी द्वारे ">Through Agency/एजन्सी द्वारे </option>
                                    <option value="Other/इतर">Other/इतर</option>
                                </select>
                                <span class="text-danger is-invalid behalf_err"></span>
                            </div>


                            <div class="col-md-5">
                                <label class="col-form-label" for="detail_address">Detailed Address of Individual/Company/Agency (व्यक्ती/कंपनी/एजन्सी यांचा तपशीलवार पत्ता)<span class="text-danger">*</span></label>
                                <input class="form-control" id="detail_address" name="detail_address" type="text" placeholder="Enter" >
                                <span class="text-danger is-invalid detail_address_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="detail_property">land on which the structure is to be erected owned by applicant ? Details of property should be provided along with proof(ज्या जमिनीवर संरचना उभारावयाची आहे ती अर्जदाराच्या मालकीची आहे?पुराव्यासहित मालमत्तेचा तपशील द्याव) <span class="text-danger">*</span></label>
                                <input class="form-control" id="detail_property" name="detail_property" type="text" placeholder="Enter" >
                                <span class="text-danger is-invalid detail_property_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="detail_property_images"></label>
                                <input class="form-control" id="detail_property_images" name="detail_property_images" type="file" accept="image/*"  style="margin-top:60px">
                                <span class="text-danger is-invalid detail_property_images_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="postal_address">If the land is owned by a person other than the applicant, the name and postal address of the land owner (जमीन अर्जदाराव्यतिरिक्त अन्य व्यक्तीच्या मालकीची असल्यास, जमीन मालकाचे नाव आणि पोस्टल पत्ता) <span class="text-danger">*</span></label>
                                <input class="form-control" id="postal_address" name="postal_address" type="text" placeholder="Enter" >
                                <span class="text-danger is-invalid postal_address_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="consent_letters">Land owner consent to erect advertisement or how? If so please attach the original consent letter (जमीन मालकाचे संमतीपत्र)<span class="text-danger">*</span></label>
                                <input class="form-control" id="consent_letters" name="consent_letters" type="file" accept="image/*" style="margin-top: 20px">
                                <span class="text-danger is-invalid consent_letters_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="start_date">Advertisement Start Date (जाहिरात सुरू होण्याची तारीख)</label>
                                <input class="form-control" id="start_date" name="start_date" type="date"  style="margin-top: 60px">
                                <span class="text-danger is-invalid start_date_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="end_date">Advertisement End Date (जाहिरात समाप्ती तारीख)</label>
                                <input class="form-control" id="end_date" name="end_date" type="date" >
                                <span class="text-danger is-invalid end_date_err"></span>
                            </div>

                        </div>
                        <div class="mb-4 row">
                            <div class="mb-4 row">
                                <div class="alert alert-warning fw-bold" role="alert">
                                    Documents Attachment List
                                </div>

                                <div class="alert alert-info fw-bold" role="alert">
                                    Note:(टीप) Upload Below Files only pdf, .jpg, .jpeg, .bmp Max upto 5MB. ( खाली फक्त pdf, .jpg, .jpeg, .bmp इत्यादी फाइल अपलोड करा. कमाल 5MB पर्यंत.)
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label class="col-form-label" for="upload_prescribed_formats">No Objection from Home/Building/Place owner ( Bond Paper of Rs. 500/-) (घर / इमारत / जागा मालकाचे रु.500/- च्या मुद्रांक शुल्क वर नाहरकत)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_prescribed_formats" name="upload_prescribed_formats" type="file"  style="margin-top:20px">
                                    <span class="text-danger is-invalid upload_prescribed_formats_err"></span>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label class="col-form-label" for="aadhar_pans">Building Permission/Completion Certificate/Standing Commitee (As per Subject no 107) Affadavit for relaxation (बांधकाम परवाना प्रमाणपत्र किंवा मा. स्थायी समिती क्र. 107 नुसार शिथीलताचे शपथपत्र)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_pans" name="aadhar_pans" type="file" >
                                    <span class="text-danger is-invalid aadhar_pans_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="ownership">Existing Property Tax Paid Receipt (कर भरणा पावती)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="ownership" name="ownership" type="file"  style="margin-top: 20px">
                                    <span class="text-danger is-invalid ownership_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="water_bills">Certificate from Structural Engineer (संरचना अभियंता चे प्रमाणपत्र) </label>
                                    <input class="form-control" id="water_bills" name="water_bills" type="file">
                                    <span class="text-danger is-invalid water_bills_err"></span>
                                </div>


                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="society">Certificate of Structural Engineer(संरचना अभियंताचे संकल्प चित्र)</label>
                                    <input class="form-control" id="society" name="society" type="file">
                                    <span class="text-danger is-invalid society_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="place">Sightseeing Map (पाहणी स्थळ नकाशा ) <span class="text-danger">*</span></label></label>
                                    <input class="form-control" id="place" name="place" type="file"  style="margin-top: 20px">
                                    <span class="text-danger is-invalid place_err"></span>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="property">Drawing Provided by Structural Engineer (संरचना अभियंता द्वारे प्रदान केलेले रेखाचित्र)<span class="text-danger">*</span></label></label>
                                    <input class="form-control" id="property" name="property" type="file" >
                                    <span class="text-danger is-invalid property_err"></span>
                                </div>


                                <div class="col-md-4 mb-2">
                                    <label class="col-form-label" for="tenancy">7/12 Or PR Card (7/12 किंवा पी.आर.कार्ड)*<span class="text-danger">*</span></label></label>
                                    <input class="form-control" id="tenancy" name="tenancy" type="file"  style="margin-top: 20px">
                                    <span class="text-danger is-invalid tenancy_err"></span>
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
