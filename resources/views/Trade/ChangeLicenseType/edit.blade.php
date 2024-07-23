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
                                    <label class="col-form-label" for="aadhar_no">Aadhar No / आधार क्र.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar No" value="{{ $data->aadhar_no }}">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID / ई-मेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email" value="{{ $data->email_id }}">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="zone" id="zone">
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
                                    <label class="col-form-label" for="old_treade_license_name">Old trade license name / जुन्या व्यवसाय परवान्याचे नाव <span class="text-danger">*</span></label>
                                    <select class="form-control" name="old_treade_license_name" id="old_treade_license_name">
                                        <option value="">Select a value ...</option>
                                        <option value="42" {{ $data->old_treade_license_name == 42 ? 'selected' : '' }}>असोसिएट्स</option>
                                        <option value="6" {{ $data->old_treade_license_name == 6 ? 'selected' : '' }}>आईस्क्रिम पार्लर </option>
                                        <option value="53" {{ $data->old_treade_license_name == 53 ? 'selected' : '' }}>इंजिनियरींग वर्क्स</option>
                                        <option value="48" {{ $data->old_treade_license_name == 48 ? 'selected' : '' }}>इंटिरियल</option>
                                        <option value="65" {{ $data->old_treade_license_name == 65 ? 'selected' : '' }}>इतर</option>
                                        <option value="12" {{ $data->old_treade_license_name == 12 ? 'selected' : '' }}>इलेक्ट्रिकल</option>
                                        <option value="49" {{ $data->old_treade_license_name == 49 ? 'selected' : '' }}>इलेक्ट्रीक अँड हार्डवेअर </option>
                                        <option value="61" {{ $data->old_treade_license_name == 61 ? 'selected' : '' }}>इंशुरन्स</option>
                                        <option value="1" {{ $data->old_treade_license_name == 1 ? 'selected' : '' }}>उपहारगृह</option>
                                        <option value="34" {{ $data->old_treade_license_name == 34 ? 'selected' : '' }}>ऑप्टीकल</option>
                                        <option value="27" {{ $data->old_treade_license_name == 27 ? 'selected' : '' }}>ओल्ड् पेपर मार्ट</option>
                                        <option value="59" {{ $data->old_treade_license_name == 59 ? 'selected' : '' }}>कंट्रक्शन</option>
                                        <option value="29" {{ $data->old_treade_license_name == 29 ? 'selected' : '' }}>कपडा विक्री</option>
                                        <option value="60" {{ $data->old_treade_license_name == 60 ? 'selected' : '' }}>कपड्याचे दुकान</option>
                                        <option value="26" {{ $data->old_treade_license_name == 26 ? 'selected' : '' }}>कांदा-बटाटा दुकान</option>
                                        <option value="21" {{ $data->old_treade_license_name == 21 ? 'selected' : '' }}>कारखाना</option>
                                        <option value="15" {{ $data->old_treade_license_name == 15 ? 'selected' : '' }}>किराणा दुकान</option>
                                        <option value="58" {{ $data->old_treade_license_name == 58 ? 'selected' : '' }}>कुरीअर सर्विस</option>
                                        <option value="45" {{ $data->old_treade_license_name == 45 ? 'selected' : '' }}>कॅटरींग सर्विसेस</option>
                                        <option value="5" {{ $data->old_treade_license_name == 5 ? 'selected' : '' }}>केक शॉप</option>
                                        <option value="10" {{ $data->old_treade_license_name == 10 ? 'selected' : '' }}>केशकर्तनालय / सलुन</option>
                                        <option value="64" {{ $data->old_treade_license_name == 64 ? 'selected' : '' }}>कोल्ड्रींग अँड आईस्क्रीम</option>
                                        <option value="33" {{ $data->old_treade_license_name == 33 ? 'selected' : '' }}>क्लासेस</option>
                                        <option value="43" {{ $data->old_treade_license_name == 43 ? 'selected' : '' }}>क्लीनर</option>
                                        <option value="30" {{ $data->old_treade_license_name == 30 ? 'selected' : '' }}>खादयपदार्थ विक्री</option>
                                        <option value="3" {{ $data->old_treade_license_name == 3 ? 'selected' : '' }}>खानावळ</option>
                                        <option value="13" {{ $data->old_treade_license_name == 13 ? 'selected' : '' }}>गॅरेज</option>
                                        <option value="47" {{ $data->old_treade_license_name == 47 ? 'selected' : '' }}>चक्की</option>
                                        <option value="55" {{ $data->old_treade_license_name == 55 ? 'selected' : '' }}>चाइनीज पॉईंट</option>
                                        <option value="63" {{ $data->old_treade_license_name == 63 ? 'selected' : '' }}>चाय पॉईंट</option>
                                        <option value="24" {{ $data->old_treade_license_name == 24 ? 'selected' : '' }}>चिकन शॉप</option>
                                        <option value="14" {{ $data->old_treade_license_name == 14 ? 'selected' : '' }}>जनरल स्टोर</option>
                                        <option value="38" {{ $data->old_treade_license_name == 38 ? 'selected' : '' }}>जिम फिटनेस</option>
                                        <option value="32" {{ $data->old_treade_license_name == 32 ? 'selected' : '' }}>टेलर</option>
                                        <option value="17" {{ $data->old_treade_license_name == 17 ? 'selected' : '' }}>नर्सरी</option>
                                        <option value="18" {{ $data->old_treade_license_name == 18 ? 'selected' : '' }}>पान बिडी शॉप</option>
                                        <option value="40" {{ $data->old_treade_license_name == 40 ? 'selected' : '' }}>पुस्तक विक्री</option>
                                        <option value="16" {{ $data->old_treade_license_name == 16 ? 'selected' : '' }}>फर्निचर दुकान</option>
                                        <option value="62" {{ $data->old_treade_license_name == 62 ? 'selected' : '' }}>फर्निचर वर्क</option>
                                        <option value="46" {{ $data->old_treade_license_name == 46 ? 'selected' : '' }}>फाटो शॉप</option>
                                        <option value="20" {{ $data->old_treade_license_name == 20 ? 'selected' : '' }}>बांगडी बनविणे</option>
                                        <option value="52" {{ $data->old_treade_license_name == 52 ? 'selected' : '' }}>बेकरी</option>
                                        <option value="7" {{ $data->old_treade_license_name == 7 ? 'selected' : '' }}>बेकरी शॉप / बेकरी प्रोडक्टस</option>
                                        <option value="11" {{ $data->old_treade_license_name == 11 ? 'selected' : '' }}>ब्युटी पार्लर</option>
                                        <option value="23" {{ $data->old_treade_license_name == 23 ? 'selected' : '' }}>मटण शॉप</option>
                                        <option value="22" {{ $data->old_treade_license_name == 22 ? 'selected' : '' }}>मटण-चिकन शॉप</option>
                                        <option value="39" {{ $data->old_treade_license_name == 39 ? 'selected' : '' }}>मसाला विक्री</option>
                                        <option value="36" {{ $data->old_treade_license_name == 36 ? 'selected' : '' }}>मॅन्युफॅक्चरींग</option>
                                        <option value="56" {{ $data->old_treade_license_name == 56 ? 'selected' : '' }}>मेटल पार्ट वर्क</option>
                                        <option value="31" {{ $data->old_treade_license_name == 31 ? 'selected' : '' }}>मेडिकल</option>
                                        <option value="51" {{ $data->old_treade_license_name == 51 ? 'selected' : '' }}>रबर प्रोडक्ट</option>
                                        <option value="35" {{ $data->old_treade_license_name == 35 ? 'selected' : '' }}>रेडीमेंड गारमेंट</option>
                                        <option value="2" {{ $data->old_treade_license_name == 2 ? 'selected' : '' }}>रेस्टॉरंट</option>
                                        <option value="44" {{ $data->old_treade_license_name == 44 ? 'selected' : '' }}>लाँड्री</option>
                                        <option value="9" {{ $data->old_treade_license_name == 9 ? 'selected' : '' }}>लॉजिंग / बोर्डींग</option>
                                        <option value="54" {{ $data->old_treade_license_name == 54 ? 'selected' : '' }}>वेल्डींग</option>
                                        <option value="41" {{ $data->old_treade_license_name == 41 ? 'selected' : '' }}>सायकल रिपेरींग</option>
                                        <option value="57" {{ $data->old_treade_license_name == 57 ? 'selected' : '' }}>सिट कवर असेसरीज</option>
                                        <option value="37" {{ $data->old_treade_license_name == 37 ? 'selected' : '' }}>सेल्स सर्विस </option>
                                        <option value="19" {{ $data->old_treade_license_name == 19 ? 'selected' : '' }}>स्टील फर्निचर</option>
                                        <option value="50" {{ $data->old_treade_license_name == 50 ? 'selected' : '' }}>स्टेनलेस स्टील </option>
                                        <option value="28" {{ $data->old_treade_license_name == 28 ? 'selected' : '' }}>स्टेशनरी </option>
                                        <option value="4" {{ $data->old_treade_license_name == 4 ? 'selected' : '' }}>स्नॅक्स सेंटर</option>
                                        <option value="8" {{ $data->old_treade_license_name == 8 ? 'selected' : '' }}>स्विट मार्ट / मिठाईचे दुकान</option>
                                        <option value="25" {{ $data->old_treade_license_name == 25 ? 'selected' : '' }}>हार्डवेअर</option>
                                    </select>
                                    <span class="text-danger is-invalid old_treade_license_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="new_treade_license_name">New name for trade license / नवीन व्यवसाय परवान्याचे नाव<span class="text-danger">*</span></label>
                                    <select class="form-control" name="new_treade_license_name" id="new_treade_license_name">
                                        <option value="">Select a value ...</option>
                                        <option value="42" {{ $data->new_treade_license_name == 42 ? 'selected' : '' }}>असोसिएट्स</option>
                                        <option value="6" {{ $data->new_treade_license_name == 6 ? 'selected' : '' }}>आईस्क्रिम पार्लर </option>
                                        <option value="53" {{ $data->new_treade_license_name == 53 ? 'selected' : '' }}>इंजिनियरींग वर्क्स</option>
                                        <option value="48" {{ $data->new_treade_license_name == 48 ? 'selected' : '' }}>इंटिरियल</option>
                                        <option value="65" {{ $data->new_treade_license_name == 65 ? 'selected' : '' }}>इतर</option>
                                        <option value="12" {{ $data->new_treade_license_name == 12 ? 'selected' : '' }}>इलेक्ट्रिकल</option>
                                        <option value="49" {{ $data->new_treade_license_name == 49 ? 'selected' : '' }}>इलेक्ट्रीक अँड हार्डवेअर </option>
                                        <option value="61" {{ $data->new_treade_license_name == 61 ? 'selected' : '' }}>इंशुरन्स</option>
                                        <option value="1" {{ $data->new_treade_license_name == 1 ? 'selected' : '' }}>उपहारगृह</option>
                                        <option value="34" {{ $data->new_treade_license_name == 34 ? 'selected' : '' }}>ऑप्टीकल</option>
                                        <option value="27" {{ $data->new_treade_license_name == 27 ? 'selected' : '' }}>ओल्ड् पेपर मार्ट</option>
                                        <option value="59" {{ $data->new_treade_license_name == 59 ? 'selected' : '' }}>कंट्रक्शन</option>
                                        <option value="29" {{ $data->new_treade_license_name == 29 ? 'selected' : '' }}>कपडा विक्री</option>
                                        <option value="60" {{ $data->new_treade_license_name == 60 ? 'selected' : '' }}>कपड्याचे दुकान</option>
                                        <option value="26" {{ $data->new_treade_license_name == 26 ? 'selected' : '' }}>कांदा-बटाटा दुकान</option>
                                        <option value="21" {{ $data->new_treade_license_name == 21 ? 'selected' : '' }}>कारखाना</option>
                                        <option value="15" {{ $data->new_treade_license_name == 15 ? 'selected' : '' }}>किराणा दुकान</option>
                                        <option value="58" {{ $data->new_treade_license_name == 58 ? 'selected' : '' }}>कुरीअर सर्विस</option>
                                        <option value="45" {{ $data->new_treade_license_name == 45 ? 'selected' : '' }}>कॅटरींग सर्विसेस</option>
                                        <option value="5" {{ $data->new_treade_license_name == 5 ? 'selected' : '' }}>केक शॉप</option>
                                        <option value="10" {{ $data->new_treade_license_name == 10 ? 'selected' : '' }}>केशकर्तनालय / सलुन</option>
                                        <option value="64" {{ $data->new_treade_license_name == 64 ? 'selected' : '' }}>कोल्ड्रींग अँड आईस्क्रीम</option>
                                        <option value="33" {{ $data->new_treade_license_name == 33 ? 'selected' : '' }}>क्लासेस</option>
                                        <option value="43" {{ $data->new_treade_license_name == 43 ? 'selected' : '' }}>क्लीनर</option>
                                        <option value="30" {{ $data->new_treade_license_name == 30 ? 'selected' : '' }}>खादयपदार्थ विक्री</option>
                                        <option value="3" {{ $data->new_treade_license_name == 3 ? 'selected' : '' }}>खानावळ</option>
                                        <option value="13" {{ $data->new_treade_license_name == 13 ? 'selected' : '' }}>गॅरेज</option>
                                        <option value="47" {{ $data->new_treade_license_name == 47 ? 'selected' : '' }}>चक्की</option>
                                        <option value="55" {{ $data->new_treade_license_name == 55 ? 'selected' : '' }}>चाइनीज पॉईंट</option>
                                        <option value="63" {{ $data->new_treade_license_name == 63 ? 'selected' : '' }}>चाय पॉईंट</option>
                                        <option value="24" {{ $data->new_treade_license_name == 24 ? 'selected' : '' }}>चिकन शॉप</option>
                                        <option value="14" {{ $data->new_treade_license_name == 14 ? 'selected' : '' }}>जनरल स्टोर</option>
                                        <option value="38" {{ $data->new_treade_license_name == 38 ? 'selected' : '' }}>जिम फिटनेस</option>
                                        <option value="32" {{ $data->new_treade_license_name == 32 ? 'selected' : '' }}>टेलर</option>
                                        <option value="17" {{ $data->new_treade_license_name == 17 ? 'selected' : '' }}>नर्सरी</option>
                                        <option value="18" {{ $data->new_treade_license_name == 18 ? 'selected' : '' }}>पान बिडी शॉप</option>
                                        <option value="40" {{ $data->new_treade_license_name == 40 ? 'selected' : '' }}>पुस्तक विक्री</option>
                                        <option value="16" {{ $data->new_treade_license_name == 16 ? 'selected' : '' }}>फर्निचर दुकान</option>
                                        <option value="62" {{ $data->new_treade_license_name == 62 ? 'selected' : '' }}>फर्निचर वर्क</option>
                                        <option value="46" {{ $data->new_treade_license_name == 46 ? 'selected' : '' }}>फाटो शॉप</option>
                                        <option value="20" {{ $data->new_treade_license_name == 20 ? 'selected' : '' }}>बांगडी बनविणे</option>
                                        <option value="52" {{ $data->new_treade_license_name == 52 ? 'selected' : '' }}>बेकरी</option>
                                        <option value="7" {{ $data->new_treade_license_name == 7 ? 'selected' : '' }}>बेकरी शॉप / बेकरी प्रोडक्टस</option>
                                        <option value="11" {{ $data->new_treade_license_name == 11 ? 'selected' : '' }}>ब्युटी पार्लर</option>
                                        <option value="23" {{ $data->new_treade_license_name == 23 ? 'selected' : '' }}>मटण शॉप</option>
                                        <option value="22" {{ $data->new_treade_license_name == 22 ? 'selected' : '' }}>मटण-चिकन शॉप</option>
                                        <option value="39" {{ $data->new_treade_license_name == 39 ? 'selected' : '' }}>मसाला विक्री</option>
                                        <option value="36" {{ $data->new_treade_license_name == 36 ? 'selected' : '' }}>मॅन्युफॅक्चरींग</option>
                                        <option value="56" {{ $data->new_treade_license_name == 56 ? 'selected' : '' }}>मेटल पार्ट वर्क</option>
                                        <option value="31" {{ $data->new_treade_license_name == 31 ? 'selected' : '' }}>मेडिकल</option>
                                        <option value="51" {{ $data->new_treade_license_name == 51 ? 'selected' : '' }}>रबर प्रोडक्ट</option>
                                        <option value="35" {{ $data->new_treade_license_name == 35 ? 'selected' : '' }}>रेडीमेंड गारमेंट</option>
                                        <option value="2" {{ $data->new_treade_license_name == 2 ? 'selected' : '' }}>रेस्टॉरंट</option>
                                        <option value="44" {{ $data->new_treade_license_name == 44 ? 'selected' : '' }}>लाँड्री</option>
                                        <option value="9" {{ $data->new_treade_license_name == 9 ? 'selected' : '' }}>लॉजिंग / बोर्डींग</option>
                                        <option value="54" {{ $data->new_treade_license_name == 54 ? 'selected' : '' }}>वेल्डींग</option>
                                        <option value="41" {{ $data->new_treade_license_name == 41 ? 'selected' : '' }}>सायकल रिपेरींग</option>
                                        <option value="57" {{ $data->new_treade_license_name == 57 ? 'selected' : '' }}>सिट कवर असेसरीज</option>
                                        <option value="37" {{ $data->new_treade_license_name == 37 ? 'selected' : '' }}>सेल्स सर्विस </option>
                                        <option value="19" {{ $data->new_treade_license_name == 19 ? 'selected' : '' }}>स्टील फर्निचर</option>
                                        <option value="50" {{ $data->new_treade_license_name == 50 ? 'selected' : '' }}>स्टेनलेस स्टील </option>
                                        <option value="28" {{ $data->new_treade_license_name == 28 ? 'selected' : '' }}>स्टेशनरी </option>
                                        <option value="4" {{ $data->new_treade_license_name == 4 ? 'selected' : '' }}>स्नॅक्स सेंटर</option>
                                        <option value="8" {{ $data->new_treade_license_name == 8 ? 'selected' : '' }}>स्विट मार्ट / मिठाईचे दुकान</option>
                                        <option value="25" {{ $data->new_treade_license_name == 25 ? 'selected' : '' }}>हार्डवेअर</option>
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
                                    <input class="form-control" id="no_dues_document" name="no_dues_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_dues_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_dues_document_err"></span>
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
                                        <input type="checkbox" class="form-check-input mt-1" id="is_correct_info" name="is_correct_info" checked value="yes">
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
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("trade-change-license-type.create") }}';
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

