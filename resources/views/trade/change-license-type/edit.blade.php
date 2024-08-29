<x-admin.layout>
    <x-slot name="title">Trade License Type Change Request / व्यवसाय (प्रकार) बदलणे</x-slot>
    <x-slot name="heading">Trade License Type Change Request / व्यवसाय (प्रकार) बदलणे</x-slot>

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
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name" value="{{ $data->applicant_full_name }}" required>
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="Enter  Address" required>{{ $data->address }}</textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="10" minlength="10" type="text" placeholder="Enter Mobile Number" value="{{ $data->mobile_no }}" required>
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार क्र.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no"  oninput="this.value = this.value.replace(/\D/g, '')" maxlength="12" minlength="12" type="text" placeholder="Enter Aadhar No" value="{{ $data->aadhar_no }}" required>
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}" required>
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone" required>
                                        <option value="">Select Zone</option>
                                        @foreach($zones as $zone)
                                        <option value="{{ $zone->name }}" {{ $data->zone == $zone->name ? 'selected' : '' }}>{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area" required>
                                        <option value="">Select Ward Area</option>
                                        @foreach($wards as $ward)
                                        <option value="{{ $ward->name }}" {{ $data->ward_area == $ward->name ? 'selected' : '' }}>{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_permission_no">Current Permission No / चालू परवाना क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_no" name="current_permission_no" type="text" placeholder="Enter Current Permission No" value="{{ $data->current_permission_no }}" required>
                                    <span class="text-danger is-invalid current_permission_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_treade_license_name">Old trade license name / जुन्या व्यवसाय परवान्याचे नाव <span class="text-danger">*</span></label>
                                    <select class="form-select" name="old_treade_license_name" id="old_treade_license_name" required>
                                        <option value="">Select a value ...</option>
                                        
                                        @php $options = ["आईस्क्रिम पार्लर", "इंजिनियरींग वर्क्स", "इंटिरियल", "इतर", "इलेक्ट्रिकल", "इलेक्ट्रीक अँड हार्डवेअर", "इंशुरन्स", "उपहारगृह", "ऑप्टीकल", "ओल्ड् पेपर मार्ट", "कंट्रक्शन", "कपडा विक्री", "कपड्याचे दुकान", "कांदा-बटाटा दुकान", "कारखाना", "किराणा दुकान", "कुरीअर सर्विस", "कॅटरींग सर्विसेस", "केक शॉप", "केशकर्तनालय / सलुन", "कोल्ड्रींग अँड आईस्क्रीम", "क्लासेस", "क्लीनर", "खादयपदार्थ विक्री", "खानावळ", "गॅरेज", "चक्की", "चाइनीज पॉईंट", "चाय पॉईंट", "चिकन शॉप", "जनरल स्टोर", "जिम फिटनेस", "टेलर", "नर्सरी", "पान बिडी शॉप", "पुस्तक विक्री", "फर्निचर दुकान", "फर्निचर वर्क", "फाटो शॉप", "बांगडी बनविणे", "बेकरी", "बेकरी शॉप / बेकरी प्रोडक्टस", "ब्युटी पार्लर", "मटण शॉप", "मटण-चिकन शॉप", "मसाला विक्री", "मॅन्युफॅक्चरींग", "मेटल पार्ट वर्क", "मेडिकल", "रबर प्रोडक्ट", "रेडीमेंड गारमेंट", "रेस्टॉरंट", "लाँड्री", "लॉजिंग / बोर्डींग", "वेल्डींग", "सायकल रिपेरींग", "सिट कवर असेसरीज", "सेल्स सर्विस", "स्टील फर्निचर", "स्टेनलेस स्टील", "स्टेशनरी", "स्नॅक्स सेंटर", "स्विट मार्ट / मिठाईचे दुकान", "हार्डवेअर"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->old_treade_license_name == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid old_treade_license_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_treade_license_name">New name for trade license / नवीन व्यवसाय परवान्याचे नाव<span class="text-danger">*</span></label>
                                    <select class="form-select" name="new_treade_license_name" id="new_treade_license_name" required>
                                        <option value="">Select a value ...</option>
                                        @php $options = ["आईस्क्रिम पार्लर", "इंजिनियरींग वर्क्स", "इंटिरियल", "इतर", "इलेक्ट्रिकल", "इलेक्ट्रीक अँड हार्डवेअर", "इंशुरन्स", "उपहारगृह", "ऑप्टीकल", "ओल्ड् पेपर मार्ट", "कंट्रक्शन", "कपडा विक्री", "कपड्याचे दुकान", "कांदा-बटाटा दुकान", "कारखाना", "किराणा दुकान", "कुरीअर सर्विस", "कॅटरींग सर्विसेस", "केक शॉप", "केशकर्तनालय / सलुन", "कोल्ड्रींग अँड आईस्क्रीम", "क्लासेस", "क्लीनर", "खादयपदार्थ विक्री", "खानावळ", "गॅरेज", "चक्की", "चाइनीज पॉईंट", "चाय पॉईंट", "चिकन शॉप", "जनरल स्टोर", "जिम फिटनेस", "टेलर", "नर्सरी", "पान बिडी शॉप", "पुस्तक विक्री", "फर्निचर दुकान", "फर्निचर वर्क", "फाटो शॉप", "बांगडी बनविणे", "बेकरी", "बेकरी शॉप / बेकरी प्रोडक्टस", "ब्युटी पार्लर", "मटण शॉप", "मटण-चिकन शॉप", "मसाला विक्री", "मॅन्युफॅक्चरींग", "मेटल पार्ट वर्क", "मेडिकल", "रबर प्रोडक्ट", "रेडीमेंड गारमेंट", "रेस्टॉरंट", "लाँड्री", "लॉजिंग / बोर्डींग", "वेल्डींग", "सायकल रिपेरींग", "सिट कवर असेसरीज", "सेल्स सर्विस", "स्टील फर्निचर", "स्टेनलेस स्टील", "स्टेशनरी", "स्नॅक्स सेंटर", "स्विट मार्ट / मिठाईचे दुकान", "हार्डवेअर"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option {{ $data->new_treade_license_name == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid new_treade_license_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark">Remark / शेरा</label>
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark " value="{{ $data->remark }}">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <div><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></div>
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file">
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा<span class="text-danger">*</span></label>
                                    <div><a href="{{ asset('storage/' . $data->application_document) }}" target="_blank">View Document</a></div>
                                    <input class="form-control" id="application_document" name="application_documents" type="file">
                                    <span class="text-danger is-invalid application_document_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">Declaration / घोषणापत्र:</label>
                                <div class="col-md-12">
                                    <div class="form-check d-flex align-items-start">
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" checked required name="is_correct_info" checked value="yes">
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
        var updateUrl = '{{ route("trade-change-license-type.update", $data->id) }}';
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
                            window.location.href = '{{ route("my-application") }}';
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

