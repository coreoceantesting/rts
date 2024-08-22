<x-admin.layout>
    <x-slot name="title">Cancellation of Trade License / व्यवसाय परवाना रद्द करणे</x-slot>
    <x-slot name="heading">Cancellation of Trade License / व्यवसाय परवाना रद्द करणे</x-slot>

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
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" value="{{ $data->applicant_full_name }}">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address">{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_permission_no">Current Permission No / चालू परवाना क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_no" name="current_permission_no" type="text" placeholder="Enter Current Permission No" value="{{ $data->current_permission_no }}">
                                    <span class="text-danger is-invalid current_permission_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_permission_date">Current Permission Date / चालू परवाना दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_date" name="current_permission_date" type="date" placeholder="Enter Current Permission Date" value="{{ $data->current_permission_date }}">
                                    <span class="text-danger is-invalid current_permission_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="business_start_date">Date of business start / व्यवसाय सुरु केल्याची तारीख <span class="text-danger">*</span></label>
                                    <input class="form-control" id="business_start_date" name="business_start_date" type="date" placeholder="Enter Date of business start" value="{{ $data->business_start_date }}">
                                    <span class="text-danger is-invalid business_start_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="business_or_trade_name">Business or trade_name / व्यवसायाचे किंवा व्यापाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="business_or_trade_name" name="business_or_trade_name" type="text" placeholder="Enter Business or trade_name" value="{{ $data->business_or_trade_name }}">
                                    <span class="text-danger is-invalid business_or_trade_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_permission_detail">New permission details / नवीन परवान्याचा तपशील <span class="text-danger">*</span></label>
                                    <input class="form-control" id="new_permission_detail" name="new_permission_detail" type="text" placeholder="Enter New permission details" value="{{ $data->new_permission_detail }}">
                                    <span class="text-danger is-invalid new_permission_detail_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="reason_for_trade_license_cancellation">Reason for trade license cancellation / परवाना रद्द करण्याचे कारण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="reason_for_trade_license_cancellation" name="reason_for_trade_license_cancellation" type="text" placeholder="Enter Reason for trade license cancellation" value="{{ $data->reason_for_trade_license_cancellation }}">
                                    <span class="text-danger is-invalid reason_for_trade_license_cancellation_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        <option value="1" {{ $data->zone == 1 ? 'selected' : '' }}>Prabhag1</option>
                                        <option value="2" {{ $data->zone == 2 ? 'selected' : '' }}>Prabhag2</option>
                                        <option value="3" {{ $data->zone == 3 ? 'selected' : '' }}>Prabhag3</option>
                                        <option value="4" {{ $data->zone == 4 ? 'selected' : '' }}>Prabhag4</option>
                                        <option value="5" {{ $data->zone == 5 ? 'selected' : '' }}>Prabhag5</option>
                                        <option value="6" {{ $data->zone == 6 ? 'selected' : '' }}>Prabhag6</option>
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option value="1"  {{ $data->ward_area == 1 ? 'selected' : '' }}>firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot or bhukhand no / प्लॉट किंवा भूखंड क्र. <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot or bhukhand no" value="{{ $data->plot_no }}">
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="permission_details">Permission details / परवान्याचा तपशील<span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="permission_details" type="text" placeholder="Enter Permission details" value="{{ $data->permission_details }}">
                                    <span class="text-danger is-invalid permission_details_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_preveious_permission_declined_by_council">is previouly permission declined by council ? / यापूर्वी अर्जात नमूद जागेला व्यवसाय परवाना नाकारला आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_preveious_permission_declined_by_council" id="is_preveious_permission_declined_by_council">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ $data->is_preveious_permission_declined_by_council == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->is_preveious_permission_declined_by_council == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_preveious_permission_declined_by_council_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="previous_permission_decline_reason">Previous permission decline reason / परवाना नाकारण्याचे कारण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="previous_permission_decline_reason" name="previous_permission_decline_reason" type="text" placeholder="Enter Previous permission decline reason " value="{{ $data->previous_permission_decline_reason }}">
                                    <span class="text-danger is-invalid previous_permission_decline_reason_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_place_owned_by_council">Is place owned by council ? / जागा पालिकेच्या मालकीची आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_place_owned_by_council" id="is_place_owned_by_council">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ $data->is_place_owned_by_council == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->is_place_owned_by_council == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_place_owned_by_council_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_any_dues_pending_of_council">Is any dues pending of council ? / आपल्याकडे पालिकेची थकबाकी आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-select" name="is_any_dues_pending_of_council" id="is_any_dues_pending_of_council">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ $data->is_any_dues_pending_of_council == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->is_any_dues_pending_of_council == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_any_dues_pending_of_council_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="trade_or_business_type">Trade or business type of new permission / व्यवसायाचा प्रकार <span class="text-danger">*</span></label>
                                    <select class="form-select" name="trade_or_business_type" id="trade_or_business_type">
                                        <option value="">Select a value ...</option>
                                        <option value="42" {{ $data->trade_or_business_type == 42 ? 'selected' : '' }}>असोसिएट्स</option>
                                        <option value="6" {{ $data->trade_or_business_type == 6 ? 'selected' : '' }}>आईस्क्रिम पार्लर </option>
                                        <option value="53" {{ $data->trade_or_business_type == 53 ? 'selected' : '' }}>इंजिनियरींग वर्क्स</option>
                                        <option value="48" {{ $data->trade_or_business_type == 48 ? 'selected' : '' }}>इंटिरियल</option>
                                        <option value="65" {{ $data->trade_or_business_type == 65 ? 'selected' : '' }}>इतर</option>
                                        <option value="12" {{ $data->trade_or_business_type == 12 ? 'selected' : '' }}>इलेक्ट्रिकल</option>
                                        <option value="49" {{ $data->trade_or_business_type == 49 ? 'selected' : '' }}>इलेक्ट्रीक अँड हार्डवेअर </option>
                                        <option value="61" {{ $data->trade_or_business_type == 61 ? 'selected' : '' }}>इंशुरन्स</option>
                                        <option value="1" {{ $data->trade_or_business_type == 1 ? 'selected' : '' }}>उपहारगृह</option>
                                        <option value="34" {{ $data->trade_or_business_type == 34 ? 'selected' : '' }}>ऑप्टीकल</option>
                                        <option value="27" {{ $data->trade_or_business_type == 27 ? 'selected' : '' }}>ओल्ड् पेपर मार्ट</option>
                                        <option value="59" {{ $data->trade_or_business_type == 59 ? 'selected' : '' }}>कंट्रक्शन</option>
                                        <option value="29" {{ $data->trade_or_business_type == 29 ? 'selected' : '' }}>कपडा विक्री</option>
                                        <option value="60" {{ $data->trade_or_business_type == 60 ? 'selected' : '' }}>कपड्याचे दुकान</option>
                                        <option value="26" {{ $data->trade_or_business_type == 26 ? 'selected' : '' }}>कांदा-बटाटा दुकान</option>
                                        <option value="21" {{ $data->trade_or_business_type == 21 ? 'selected' : '' }}>कारखाना</option>
                                        <option value="15" {{ $data->trade_or_business_type == 15 ? 'selected' : '' }}>किराणा दुकान</option>
                                        <option value="58" {{ $data->trade_or_business_type == 58 ? 'selected' : '' }}>कुरीअर सर्विस</option>
                                        <option value="45" {{ $data->trade_or_business_type == 45 ? 'selected' : '' }}>कॅटरींग सर्विसेस</option>
                                        <option value="5" {{ $data->trade_or_business_type == 5 ? 'selected' : '' }}>केक शॉप</option>
                                        <option value="10" {{ $data->trade_or_business_type == 10 ? 'selected' : '' }}>केशकर्तनालय / सलुन</option>
                                        <option value="64" {{ $data->trade_or_business_type == 64 ? 'selected' : '' }}>कोल्ड्रींग अँड आईस्क्रीम</option>
                                        <option value="33" {{ $data->trade_or_business_type == 33 ? 'selected' : '' }}>क्लासेस</option>
                                        <option value="43" {{ $data->trade_or_business_type == 43 ? 'selected' : '' }}>क्लीनर</option>
                                        <option value="30" {{ $data->trade_or_business_type == 30 ? 'selected' : '' }}>खादयपदार्थ विक्री</option>
                                        <option value="3" {{ $data->trade_or_business_type == 3 ? 'selected' : '' }}>खानावळ</option>
                                        <option value="13" {{ $data->trade_or_business_type == 13 ? 'selected' : '' }}>गॅरेज</option>
                                        <option value="47" {{ $data->trade_or_business_type == 47 ? 'selected' : '' }}>चक्की</option>
                                        <option value="55" {{ $data->trade_or_business_type == 55 ? 'selected' : '' }}>चाइनीज पॉईंट</option>
                                        <option value="63" {{ $data->trade_or_business_type == 63 ? 'selected' : '' }}>चाय पॉईंट</option>
                                        <option value="24" {{ $data->trade_or_business_type == 24 ? 'selected' : '' }}>चिकन शॉप</option>
                                        <option value="14" {{ $data->trade_or_business_type == 14 ? 'selected' : '' }}>जनरल स्टोर</option>
                                        <option value="38" {{ $data->trade_or_business_type == 38 ? 'selected' : '' }}>जिम फिटनेस</option>
                                        <option value="32" {{ $data->trade_or_business_type == 32 ? 'selected' : '' }}>टेलर</option>
                                        <option value="17" {{ $data->trade_or_business_type == 17 ? 'selected' : '' }}>नर्सरी</option>
                                        <option value="18" {{ $data->trade_or_business_type == 18 ? 'selected' : '' }}>पान बिडी शॉप</option>
                                        <option value="40" {{ $data->trade_or_business_type == 40 ? 'selected' : '' }}>पुस्तक विक्री</option>
                                        <option value="16" {{ $data->trade_or_business_type == 16 ? 'selected' : '' }}>फर्निचर दुकान</option>
                                        <option value="62" {{ $data->trade_or_business_type == 62 ? 'selected' : '' }}>फर्निचर वर्क</option>
                                        <option value="46" {{ $data->trade_or_business_type == 46 ? 'selected' : '' }}>फाटो शॉप</option>
                                        <option value="20" {{ $data->trade_or_business_type == 20 ? 'selected' : '' }}>बांगडी बनविणे</option>
                                        <option value="52" {{ $data->trade_or_business_type == 52 ? 'selected' : '' }}>बेकरी</option>
                                        <option value="7" {{ $data->trade_or_business_type == 7 ? 'selected' : '' }}>बेकरी शॉप / बेकरी प्रोडक्टस</option>
                                        <option value="11" {{ $data->trade_or_business_type == 11 ? 'selected' : '' }}>ब्युटी पार्लर</option>
                                        <option value="23" {{ $data->trade_or_business_type == 23 ? 'selected' : '' }}>मटण शॉप</option>
                                        <option value="22" {{ $data->trade_or_business_type == 22 ? 'selected' : '' }}>मटण-चिकन शॉप</option>
                                        <option value="39" {{ $data->trade_or_business_type == 39 ? 'selected' : '' }}>मसाला विक्री</option>
                                        <option value="36" {{ $data->trade_or_business_type == 36 ? 'selected' : '' }}>मॅन्युफॅक्चरींग</option>
                                        <option value="56" {{ $data->trade_or_business_type == 56 ? 'selected' : '' }}>मेटल पार्ट वर्क</option>
                                        <option value="31" {{ $data->trade_or_business_type == 31 ? 'selected' : '' }}>मेडिकल</option>
                                        <option value="51" {{ $data->trade_or_business_type == 51 ? 'selected' : '' }}>रबर प्रोडक्ट</option>
                                        <option value="35" {{ $data->trade_or_business_type == 35 ? 'selected' : '' }}>रेडीमेंड गारमेंट</option>
                                        <option value="2" {{ $data->trade_or_business_type == 2 ? 'selected' : '' }}>रेस्टॉरंट</option>
                                        <option value="44" {{ $data->trade_or_business_type == 44 ? 'selected' : '' }}>लाँड्री</option>
                                        <option value="9" {{ $data->trade_or_business_type == 9 ? 'selected' : '' }}>लॉजिंग / बोर्डींग</option>
                                        <option value="54" {{ $data->trade_or_business_type == 54 ? 'selected' : '' }}>वेल्डींग</option>
                                        <option value="41" {{ $data->trade_or_business_type == 41 ? 'selected' : '' }}>सायकल रिपेरींग</option>
                                        <option value="57" {{ $data->trade_or_business_type == 57 ? 'selected' : '' }}>सिट कवर असेसरीज</option>
                                        <option value="37" {{ $data->trade_or_business_type == 37 ? 'selected' : '' }}>सेल्स सर्विस </option>
                                        <option value="19" {{ $data->trade_or_business_type == 19 ? 'selected' : '' }}>स्टील फर्निचर</option>
                                        <option value="50" {{ $data->trade_or_business_type == 50 ? 'selected' : '' }}>स्टेनलेस स्टील </option>
                                        <option value="28" {{ $data->trade_or_business_type == 28 ? 'selected' : '' }}>स्टेशनरी </option>
                                        <option value="4" {{ $data->trade_or_business_type == 4 ? 'selected' : '' }}>स्नॅक्स सेंटर</option>
                                        <option value="8" {{ $data->trade_or_business_type == 8 ? 'selected' : '' }}>स्विट मार्ट / मिठाईचे दुकान</option>
                                        <option value="25" {{ $data->trade_or_business_type == 25 ? 'selected' : '' }}>हार्डवेअर</option>
                                    </select>
                                    <span class="text-danger is-invalid trade_or_business_type_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no">Property Number / मालमत्ता क्र<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_no" name="property_no" type="number" placeholder="Enter Property Number" value="{{ $data->property_no }}">
                                    <span class="text-danger is-invalid property_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark">Remark / शेरा</label>
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark" value="{{ $data->remark }}">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            "All information provided above is correct and I shall be fully responsible for any discrepancy. <br> वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन."
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
        var updateUrl = '{{ route("trade-license-cancellation.update", $data->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function()
            {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("trade-license-cancellation.create") }}';
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

