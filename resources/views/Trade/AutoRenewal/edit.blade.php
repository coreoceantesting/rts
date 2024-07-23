<x-admin.layout>
    <x-slot name="title">Auto Renewal of Trade License / व्यवसाय परवाना स्वयंनुतनीकरण</x-slot>
    <x-slot name="heading">Auto Renewal of Trade License / व्यवसाय परवाना स्वयंनुतनीकरण</x-slot>

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
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}" oninput="this.value = this.value.replace(/\D/g, '')" minlength="10" maxlength="12">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार नंबर  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="text" placeholder="Enter Aadhar Card No" value="{{ $data->aadhar_no }}" oninput="this.value = this.value.replace(/\D/g, '')" minlength="12" maxlength="12">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        @php
                                        $options = ["Prabhag1", "Prabhag2", "Prabhag3", "Prabhag4", "Prabhag5", "Prabhag6"];
                                        @endphp

                                        @foreach($options as $option)
                                        <option value="{{ $option }}" {{ $data->zone == $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        <option value="1"  {{ $data->ward_area == 1 ? 'selected' : '' }}>firstward</option>
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
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
                                    <label class="col-form-label" for="current_permission_expiry_date">Current Permission Expiry Date / चालू परवाना समाप्ती दिनांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_expiry_date" name="current_permission_expiry_date" type="date" placeholder="Enter Current Permission Expiry Date" value="{{ $data->current_permission_expiry_date }}">
                                    <span class="text-danger is-invalid current_permission_expiry_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_permission_validity_date">Current permission validity extended upto date / चालू परवाना मुदत कधी पर्यंत वाढवायची ती तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_validity_date" name="current_permission_validity_date" type="date" placeholder="Enter Current permission validity extended upto date" value="{{ $data->current_permission_validity_date }}">
                                    <span class="text-danger is-invalid current_permission_validity_date_err"></span>
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
                                    <label class="col-form-label" for="permission_detail">Permission details / परवान्याचा तपशील <span class="text-danger">*</span></label>
                                    <input class="form-control" id="permission_detail" name="permission_detail" type="text" placeholder="Enter Permission details" value="{{ $data->permission_detail }}">
                                    <span class="text-danger is-invalid permission_detail_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no">Plot or bhukhand no / प्लॉट किंवा भूखंड क्र. <span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot or bhukhand no" value="{{ $data->plot_no }}">
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="description_of_trade_place">trade place description / व्यवसाय जागेचे संपूर्ण वर्णन<span class="text-danger">*</span></label>
                                    <input class="form-control" id="description_of_trade_place" name="description_of_trade_place" type="text" placeholder="Enter trade place description" value="{{ $data->description_of_trade_place }}">
                                    <span class="text-danger is-invalid description_of_trade_place_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_preveious_permission_declined_by_council">is previouly permission declined by council ? / यापूर्वी अर्जात नमूद जागेला व्यवसाय परवाना नाकारला आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_preveious_permission_declined_by_council" id="is_preveious_permission_declined_by_council">
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
                                    <select class="form-control" name="is_place_owned_by_council" id="is_place_owned_by_council">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ $data->is_place_owned_by_council == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->is_place_owned_by_council == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_place_owned_by_council_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_any_dues_pending_of_council">Is any dues pending of council ? / आपल्याकडे पालिकेची थकबाकी आहे का ? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_any_dues_pending_of_council" id="is_any_dues_pending_of_council">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ $data->is_any_dues_pending_of_council == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2" {{ $data->is_any_dues_pending_of_council == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_any_dues_pending_of_council_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="trade_or_business_type">Trade or business type of new permission / व्यवसायाचा प्रकार <span class="text-danger">*</span></label>
                                    <select class="form-control" name="trade_or_business_type" id="trade_or_business_type">
                                        <option value="">Select a value ...</option>
                                        @php
                                            $options = ["असोसिएट्स", "आईस्क्रिम पार्लर", "इंजिनियरींग वर्क्स", "इंटिरियल", "इतर", "इलेक्ट्रिकल", "इलेक्ट्रीक अँड हार्डवेअर", "इंशुरन्स", "उपहारगृह", "ऑप्टीकल", "ओल्ड् पेपर मार्ट", "कंट्रक्शन", "कपडा विक्री", "कपड्याचे दुकान", "कांदा-बटाटा दुकान", "कारखाना", "किराणा दुकान", "कुरीअर सर्विस", "कॅटरींग सर्विसेस", "केक शॉप", "केशकर्तनालय / सलुन", "कोल्ड्रींग अँड आईस्क्रीम", "क्लासेस", "क्लीनर", "खादयपदार्थ विक्री", "खानावळ", "गॅरेज", "चक्की", "चाइनीज पॉईंट", "चाय पॉईंट", "चिकन शॉप", "जनरल स्टोर", "जिम फिटनेस", "टेलर", "नर्सरी", "पान बिडी शॉप", "पुस्तक विक्री", "फर्निचर दुकान", "फर्निचर वर्क", "फाटो शॉप", "बांगडी बनविणे", "बेकरी", "बेकरी शॉप / बेकरी प्रोडक्टस", "ब्युटी पार्लर", "मटण शॉप", "मटण-चिकन शॉप", "मसाला विक्री", "मॅन्युफॅक्चरींग", "मेटल पार्ट वर्क", "मेडिकल", "रबर प्रोडक्ट", "रेडीमेंड गारमेंट", "रेस्टॉरंट", "लाँड्री", "लॉजिंग / बोर्डींग", "वेल्डींग", "सायकल रिपेरींग", "सिट कवर असेसरीज", "सेल्स सर्विस", "स्टील फर्निचर", "स्टेनलेस स्टील", "स्टेशनरी", "स्नॅक्स सेंटर", "स्विट मार्ट / मिठाईचे दुकान", "हार्डवेअर"]
                                        @endphp
                                        <option value="">Select a value ...</option>
                                        @foreach($options as $option)
                                        <option {{ $data->trade_or_business_type == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
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
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark " value="{{ $data->remark }}">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid application_documents_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_dues_documents_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" value="yes">
                                        <label class="form-check-label ms-2" for="is_correct_info">
                                            "All information provided above is correct and I shall be fully responsible for any discrepancy. / वरील पुरविलेली सर्व माहिती ही अचूक असून, त्यात कुठल्याही प्रकारची तफावत आढळल्यास त्यास मी पूर्णतः जबाबदार असेन."
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
        var updateUrl = '{{ route("trade-autorenewal-license.update", $data->id) }}';
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
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("trade-autorenewal-license.create") }}';
                        });
                else
                    swal("Error!", data.error2, "error");
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

