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
                            <h4 class="card-title">Add Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4">
                                    <label class="col-form-label" for="applicant_full_name">Applicant Full Name / अर्जदाराचे संपूर्ण नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_full_name" name="applicant_full_name" type="text" placeholder="Enter Applicant Full Name">
                                    <span class="text-danger is-invalid applicant_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant Full Address / अर्जदाराचा संपूर्ण पत्ता <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार क्र.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        @foreach($zones as $zone)
                                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        @foreach($wards as $ward)
                                        <option value="{{ $ward->name }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="current_permission_no">Current Permission No / चालू परवाना क्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="current_permission_no" name="current_permission_no" type="text" placeholder="Enter Current Permission No">
                                    <span class="text-danger is-invalid current_permission_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_treade_license_name">Old trade license name / जुन्या व्यवसाय परवान्याचे नाव <span class="text-danger">*</span></label>
                                    <select class="form-select" name="old_treade_license_name" id="old_treade_license_name">
                                        <option value="">Select a value ...</option>
                                        <option value="42">असोसिएट्स</option>
                                        <option value="6">आईस्क्रिम पार्लर </option>
                                        <option value="53">इंजिनियरींग वर्क्स</option>
                                        <option value="48">इंटिरियल</option>
                                        <option value="65">इतर</option>
                                        <option value="12">
                                        इलेक्ट्रिकल
                                        </option>
                                        <option value="49">
                                        इलेक्ट्रीक अँड हार्डवेअर
                                        </option>
                                        <option value="61">
                                        इंशुरन्स
                                        </option>
                                        <option value="1">
                                        उपहारगृह
                                        </option>
                                        <option value="34">
                                        ऑप्टीकल
                                        </option>
                                        <option value="27">
                                        ओल्ड् पेपर मार्ट
                                        </option>
                                        <option value="59">
                                        कंट्रक्शन
                                        </option>
                                        <option value="29">
                                        कपडा विक्री
                                        </option>
                                        <option value="60">
                                        कपड्याचे दुकान
                                        </option>
                                        <option value="26">
                                        कांदा-बटाटा दुकान
                                        </option>
                                        <option value="21">
                                        कारखाना
                                        </option>
                                        <option value="15">
                                        किराणा दुकान
                                        </option>
                                        <option value="58">
                                        कुरीअर सर्विस
                                        </option>
                                        <option value="45">
                                        कॅटरींग सर्विसेस
                                        </option>
                                        <option value="5">
                                        केक शॉप
                                        </option>
                                        <option value="10">
                                        केशकर्तनालय / सलुन
                                        </option>
                                        <option value="64">
                                        कोल्ड्रींग अँड आईस्क्रीम
                                        </option>
                                        <option value="33">
                                        क्लासेस
                                        </option>
                                        <option value="43">
                                        क्लीनर
                                        </option>
                                        <option value="30">
                                        खादयपदार्थ विक्री
                                        </option>
                                        <option value="3">
                                        खानावळ
                                        </option>
                                        <option value="13">
                                        गॅरेज
                                        </option>
                                        <option value="47">
                                        चक्की
                                        </option>
                                        <option value="55">
                                        चाइनीज पॉईंट
                                        </option>
                                        <option value="63">
                                        चाय पॉईंट
                                        </option>
                                        <option value="24">
                                        चिकन शॉप
                                        </option>
                                        <option value="14">
                                        जनरल स्टोर
                                        </option>
                                        <option value="38">
                                        जिम फिटनेस
                                        </option>
                                        <option value="32">
                                        टेलर
                                        </option>
                                        <option value="17">
                                        नर्सरी
                                        </option>
                                        <option value="18">
                                        पान बिडी शॉप
                                        </option>
                                        <option value="40">
                                        पुस्तक विक्री
                                        </option>
                                        <option value="16">
                                        फर्निचर दुकान
                                        </option>
                                        <option value="62">
                                        फर्निचर वर्क
                                        </option>
                                        <option value="46">
                                        फाटो शॉप
                                        </option>
                                        <option value="20">
                                        बांगडी बनविणे
                                        </option>
                                        <option value="52">
                                        बेकरी
                                        </option>
                                        <option value="7">
                                        बेकरी शॉप / बेकरी प्रोडक्टस
                                        </option>
                                        <option value="11">
                                        ब्युटी पार्लर
                                        </option>
                                        <option value="23">
                                        मटण शॉप
                                        </option>
                                        <option value="22">
                                        मटण-चिकन शॉप
                                        </option>
                                        <option value="39">
                                        मसाला विक्री
                                        </option>
                                        <option value="36">
                                        मॅन्युफॅक्चरींग
                                        </option>
                                        <option value="56">
                                        मेटल पार्ट वर्क
                                        </option>
                                        <option value="31">
                                        मेडिकल
                                        </option>
                                        <option value="51">
                                        रबर प्रोडक्ट
                                        </option>
                                        <option value="35">
                                        रेडीमेंड गारमेंट
                                        </option>
                                        <option value="2">
                                        रेस्टॉरंट
                                        </option>
                                        <option value="44">
                                        लाँड्री
                                        </option>
                                        <option value="9">
                                        लॉजिंग / बोर्डींग
                                        </option>
                                        <option value="54">
                                        वेल्डींग
                                        </option>
                                        <option value="41">
                                        सायकल रिपेरींग
                                        </option>
                                        <option value="57">
                                        सिट कवर असेसरीज
                                        </option>
                                        <option value="37">
                                        सेल्स सर्विस
                                        </option>
                                        <option value="19">
                                        स्टील फर्निचर
                                        </option>
                                        <option value="50">
                                        स्टेनलेस स्टील
                                        </option>
                                        <option value="28">
                                        स्टेशनरी
                                        </option>
                                        <option value="4">
                                        स्नॅक्स सेंटर
                                        </option>
                                        <option value="8">
                                        स्विट मार्ट / मिठाईचे दुकान
                                        </option>
                                        <option value="25">
                                        हार्डवेअर
                                        </option>
                                    </select>
                                    <span class="text-danger is-invalid old_treade_license_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_treade_license_name">New name for trade license / नवीन व्यवसाय परवान्याचे नाव<span class="text-danger">*</span></label>
                                    <select class="form-select" name="new_treade_license_name" id="new_treade_license_name">
                                        <option value="">Select a value ...</option>
                                        <option value="42">असोसिएट्स</option>
                                        <option value="6">आईस्क्रिम पार्लर </option>
                                        <option value="53">इंजिनियरींग वर्क्स</option>
                                        <option value="48">
                                        इंटिरियल
                                        </option>
                                        <option value="65">
                                        इतर
                                        </option>
                                        <option value="12">
                                        इलेक्ट्रिकल
                                        </option>
                                        <option value="49">
                                        इलेक्ट्रीक अँड हार्डवेअर
                                        </option>
                                        <option value="61">
                                        इंशुरन्स
                                        </option>
                                        <option value="1">
                                        उपहारगृह
                                        </option>
                                        <option value="34">
                                        ऑप्टीकल
                                        </option>
                                        <option value="27">
                                        ओल्ड् पेपर मार्ट
                                        </option>
                                        <option value="59">
                                        कंट्रक्शन
                                        </option>
                                        <option value="29">
                                        कपडा विक्री
                                        </option>
                                        <option value="60">
                                        कपड्याचे दुकान
                                        </option>
                                        <option value="26">
                                        कांदा-बटाटा दुकान
                                        </option>
                                        <option value="21">
                                        कारखाना
                                        </option>
                                        <option value="15">
                                        किराणा दुकान
                                        </option>
                                        <option value="58">
                                        कुरीअर सर्विस
                                        </option>
                                        <option value="45">
                                        कॅटरींग सर्विसेस
                                        </option>
                                        <option value="5">
                                        केक शॉप
                                        </option>
                                        <option value="10">
                                        केशकर्तनालय / सलुन
                                        </option>
                                        <option value="64">
                                        कोल्ड्रींग अँड आईस्क्रीम
                                        </option>
                                        <option value="33">
                                        क्लासेस
                                        </option>
                                        <option value="43">
                                        क्लीनर
                                        </option>
                                        <option value="30">
                                        खादयपदार्थ विक्री
                                        </option>
                                        <option value="3">
                                        खानावळ
                                        </option>
                                        <option value="13">
                                        गॅरेज
                                        </option>
                                        <option value="47">
                                        चक्की
                                        </option>
                                        <option value="55">
                                        चाइनीज पॉईंट
                                        </option>
                                        <option value="63">
                                        चाय पॉईंट
                                        </option>
                                        <option value="24">
                                        चिकन शॉप
                                        </option>
                                        <option value="14">
                                        जनरल स्टोर
                                        </option>
                                        <option value="38">
                                        जिम फिटनेस
                                        </option>
                                        <option value="32">
                                        टेलर
                                        </option>
                                        <option value="17">
                                        नर्सरी
                                        </option>
                                        <option value="18">
                                        पान बिडी शॉप
                                        </option>
                                        <option value="40">
                                        पुस्तक विक्री
                                        </option>
                                        <option value="16">
                                        फर्निचर दुकान
                                        </option>
                                        <option value="62">
                                        फर्निचर वर्क
                                        </option>
                                        <option value="46">
                                        फाटो शॉप
                                        </option>
                                        <option value="20">
                                        बांगडी बनविणे
                                        </option>
                                        <option value="52">
                                        बेकरी
                                        </option>
                                        <option value="7">
                                        बेकरी शॉप / बेकरी प्रोडक्टस
                                        </option>
                                        <option value="11">
                                        ब्युटी पार्लर
                                        </option>
                                        <option value="23">
                                        मटण शॉप
                                        </option>
                                        <option value="22">
                                        मटण-चिकन शॉप
                                        </option>
                                        <option value="39">
                                        मसाला विक्री
                                        </option>
                                        <option value="36">
                                        मॅन्युफॅक्चरींग
                                        </option>
                                        <option value="56">
                                        मेटल पार्ट वर्क
                                        </option>
                                        <option value="31">
                                        मेडिकल
                                        </option>
                                        <option value="51">
                                        रबर प्रोडक्ट
                                        </option>
                                        <option value="35">
                                        रेडीमेंड गारमेंट
                                        </option>
                                        <option value="2">
                                        रेस्टॉरंट
                                        </option>
                                        <option value="44">
                                        लाँड्री
                                        </option>
                                        <option value="9">
                                        लॉजिंग / बोर्डींग
                                        </option>
                                        <option value="54">
                                        वेल्डींग
                                        </option>
                                        <option value="41">
                                        सायकल रिपेरींग
                                        </option>
                                        <option value="57">
                                        सिट कवर असेसरीज
                                        </option>
                                        <option value="37">
                                        सेल्स सर्विस
                                        </option>
                                        <option value="19">
                                        स्टील फर्निचर
                                        </option>
                                        <option value="50">
                                        स्टेनलेस स्टील
                                        </option>
                                        <option value="28">
                                        स्टेशनरी
                                        </option>
                                        <option value="4">
                                        स्नॅक्स सेंटर
                                        </option>
                                        <option value="8">
                                        स्विट मार्ट / मिठाईचे दुकान
                                        </option>
                                        <option value="25">
                                        हार्डवेअर
                                        </option>
                                    </select>
                                    <span class="text-danger is-invalid new_treade_license_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark">Remark / शेरा</label>
                                    <input class="form-control" id="remark" name="remark" type="text" placeholder="Enter Remark ">
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_dues_document">Upload Certificate Of No Dues / थकबाकी नसल्याचा दाखला अपलोड करा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file" required>
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="application_document">Upload Application In Prescribed Format / विहित नमुन्यातील अर्ज अपलोड करा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="application_document" name="application_documents" type="file" required>
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
        $.ajax({
            url: '{{ route("trade-change-license-type.store") }}',
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
                            window.location.href = '{{ route("trade-change-license-type.create") }}';
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

