<x-admin.layout>
    <x-slot name="title">NOC for Pandol/ Mandap / मंडपासाठी ना हरकत प्रमाणपत्र</x-slot>
    <x-slot name="heading">NOC for Pandol/ Mandap / मंडपासाठी ना हरकत प्रमाणपत्र</x-slot>

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
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant Name" value="{{ $data->applicant_name }}">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="event_name">Name of the festival or event / उत्सव किंवा कार्यक्रमाचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="event_name" name="event_name" type="text" placeholder="Enter festival or event Name" value="{{ $data->event_name }}">
                                    <span class="text-danger is-invalid event_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="commissioner_name">Name registered with the Hon.Charity Commissioner / मंडळाचे मा. धर्मादाय आयुक्तांकडिल नोंदवलेले नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="commissioner_name" name="commissioner_name" type="text" placeholder="Enter Name registered with the Hon.Charity Commissioner" value="{{ $data->commissioner_name }}">
                                    <span class="text-danger is-invalid commissioner_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="registration_no">Registration Number from Hon.Charity Commissioner / मंडळाचा मा. धर्मादाय आयुक्तांकडिल नोंदणी क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="registration_no" name="registration_no" type="text" placeholder="Enter Registration Number from Hon.Charity Commissioner" value="{{ $data->registration_no }}">
                                    <span class="text-danger is-invalid registration_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="registration_year">Registration Year / मंडळ नोंदणी केल्याचे तारीख व वर्ष <span class="text-danger">*</span></label>
                                    <input class="form-control" id="registration_year" name="registration_year" type="number" placeholder="Enter Registration Year" value="{{ $data->registration_year }}">
                                    <span class="text-danger is-invalid registration_year_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_chairman">Name of Chairman or Secretary / अध्यक्ष / सचिव यांचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_chairman" name="name_of_chairman" type="text" placeholder="Enter Name of Chairman or Secretary" value="{{ $data->name_of_chairman }}">
                                    <span class="text-danger is-invalid name_of_chairman_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="president_mobile_no">Contact No. of President or Secretary / अध्यक्ष किंवा सचिव यांचा संपर्क क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="president_mobile_no" name="president_mobile_no" type="number" placeholder="Enter Contact No. of President or Secretary" value="{{ $data->president_mobile_no }}">
                                    <span class="text-danger is-invalid president_mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ownership_of_place">Ownership of the tent Palce / ज्या जागेवर मंडप उभारावयाचा आहे त्या जागेची मालकी <span class="text-danger">*</span></label>
                                    <select class="form-control" name="ownership_of_place" id="ownership_of_place">
                                        <option value="">Select Option</option>
                                        <option value="खाजगी" {{ $data->ownership_of_place == "खाजगी" ? 'selected' : '' }}>खाजगी</option>
                                        <option value="निमशासकीय" {{ $data->ownership_of_place == "निमशासकीय" ? 'selected' : '' }}>निमशासकीय</option>
                                        <option value="महानगपालिका" {{ $data->ownership_of_place == "महानगपालिका" ? 'selected' : '' }}>महानगपालिका</option>
                                        <option value="शासकीय" {{ $data->ownership_of_place == "शासकीय" ? 'selected' : '' }}>शासकीय</option>
                                    </select>
                                    <span class="text-danger is-invalid ownership_of_place_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_permission_date">Pandol / Stage Permission Date / ज्या कोणत्या तारखेस मंडप उभारावयाचा आहे ती तारीख  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_permission_date" name="stage_permission_date" type="date" placeholder="Enter Pandol / Stage Permission Date" value="{{ $data->stage_permission_date }}">
                                    <span class="text-danger is-invalid stage_permission_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_permission_end_date">Pandol / Stage Permission End Date / कोणत्या तारखेपर्यंत मंडप ठेवायचा आहे ती तारीख<span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_permission_end_date" name="stage_permission_end_date" type="date" placeholder="Pandol / Stage Permission End Date" value="{{ $data->stage_permission_end_date }}">
                                    <span class="text-danger is-invalid stage_permission_end_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_days">Pandol / Stage Permission Duration (days) / मंडप किती दिवसांकरिता राहणार आहे<span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_days" name="no_of_days" type="text" placeholder="Enter Pandol / Stage Permission Duration (days)" value="{{ $data->no_of_days }}">
                                    <span class="text-danger is-invalid no_of_days_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_address">Pandol / Stage Place Address / मंडपाचे / स्टेजचे ठिकाणाचा पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="stage_address" id="stage_address" cols="30" rows="2"  placeholder="Enter Pandol / Stage Place Address ">{{ $data->stage_address }}</textarea>
                                    <span class="text-danger is-invalid stage_address_err"></span>
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
                                    <label class="col-form-label" for="plot_no">Plot No / प्लॉट क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="plot_no" name="plot_no" type="text" placeholder="Enter Plot or bhukhand no" value="{{ $data->plot_no }}">
                                    <span class="text-danger is-invalid plot_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_height">Pandol / Stage Height ( Feet) / मंडप / स्टेजची उंची ( फुटामध्ये )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_height" name="stage_height" type="text" placeholder="Enter Pandol / Stage Height ( Feet)" value="{{ $data->stage_height }}">
                                    <span class="text-danger is-invalid stage_height_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_length">Pandol / Stage Length ( Feet) / मंडप / स्टेजची लांबी ( फुटामध्ये ) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_length" name="stage_length" type="text" placeholder="Enter Pandol / Stage Length ( Feet)" value="{{ $data->stage_length }}">
                                    <span class="text-danger is-invalid stage_length_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_Width">Pandol / Stage Width ( Feet) / मंडप / स्टेजची रुंदी ( फुटामध्ये )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_Width" name="stage_Width" type="text" placeholder="Enter Pandol / Stage Width ( Feet)" value="{{ $data->stage_Width }}">
                                    <span class="text-danger is-invalid stage_Width_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_area">Pandol / Stage Area (Sqr Feet) / मंडप / स्टेजचे क्षेत्रफळ ( चौरस फुटामध्ये ) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="stage_area" name="stage_area" type="text" placeholder="Enter Pandol / Stage Area (Sqr Feet)" value="{{ $data->stage_area }}">
                                    <span class="text-danger is-invalid stage_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_volunteer_workers">Number of volunteer workers / स्वयंसेवक कार्यकर्त्यांची संख्या <span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_volunteer_workers" name="no_of_volunteer_workers" type="text" placeholder="Enter Number of volunteer workers" value="{{ $data->no_of_volunteer_workers }}">
                                    <span class="text-danger is-invalid no_of_volunteer_workers_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="stage_contractor_address">Pandol / Stage Contractor Address / मंडप कंत्राटदार / मालकाचा पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="stage_contractor_address" id="stage_contractor_address" cols="30" rows="2"  placeholder="Enter Pandol / Stage Contractor Address  ">{{ $data->stage_contractor_address }}</textarea>
                                    <span class="text-danger is-invalid stage_contractor_address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_contact_no">Pandol / Stage Contractor Contact / मंडप कंत्राटदार / मालकाचा संपर्क क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_contact_no" name="contractor_contact_no" type="number" placeholder="Enter Pandol / Stage Contractor Contact " value="{{ $data->contractor_contact_no }}">
                                    <span class="text-danger is-invalid contractor_contact_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="decorator_or_electrical_contractor_name">Decorator or Electrical Contractor Name / मंडप डेकोरेटरचे /इलेक्ट्रिकल कंत्राटदाराचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="decorator_or_electrical_contractor_name" name="decorator_or_electrical_contractor_name" type="text" placeholder="Enter Decorator or Electrical Contractor Name" value="{{ $data->decorator_or_electrical_contractor_name }}">
                                    <span class="text-danger is-invalid decorator_or_electrical_contractor_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="decorator_or_contractor_address">Decorator or Electrical Contractor Address / इलेक्ट्रिकल कंत्राटदार / डेकोरेटरचा पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="decorator_or_contractor_address" id="decorator_or_contractor_address" cols="30" rows="2"  placeholder="Enter Decorator or Electrical Contractor Address ">{{ $data->decorator_or_contractor_address }}</textarea>
                                    <span class="text-danger is-invalid decorator_or_contractor_address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="decorator_or_electrical_contractor_contact_no">Decorator or Electrical Contractor Contact / इलेक्ट्रिकल कंत्राटदार / डेकोरेटरचा मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="decorator_or_electrical_contractor_contact_no" name="decorator_or_electrical_contractor_contact_no" type="number" placeholder="Enter Decorator or Electrical Contractor Contact " value="{{ $data->decorator_or_electrical_contractor_contact_no }}">
                                    <span class="text-danger is-invalid decorator_or_electrical_contractor_contact_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="sound_or_speaker_contractor_name">Sound or Speaker Contractor Name / लाऊड स्पीकर / ध्वनी प्रणाली कंत्राटदाराचे नाव<span class="text-danger">*</span></label>
                                    <input class="form-control" id="sound_or_speaker_contractor_name" name="sound_or_speaker_contractor_name" type="text" placeholder="Enter Sound or Speaker Contractor Name" value="{{ $data->sound_or_speaker_contractor_name }}">
                                    <span class="text-danger is-invalid sound_or_speaker_contractor_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="sound_or_speaker_address">Sound or Speaker Contractor Address / लाऊड स्पीकर / ध्वनी प्रणाली कंत्राटदाराचा पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="sound_or_speaker_address" id="sound_or_speaker_address" cols="30" rows="2"  placeholder="Enter Sound or Speaker Contractor Address ">{{ $data->sound_or_speaker_address }}</textarea>
                                    <span class="text-danger is-invalid sound_or_speaker_address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="sound_or_speaker_contractor_contact_no">Sound or Speaker Contractor Contact / लाऊड स्पीकर / ध्वनी प्रणाली कंत्राटदाराचा संपर्क क्रमांक<span class="text-danger">*</span></label>
                                    <input class="form-control" id="sound_or_speaker_contractor_contact_no" name="sound_or_speaker_contractor_contact_no" type="number" placeholder="Enter Sound or Speaker Contractor Contact" value="{{ $data->sound_or_speaker_contractor_contact_no }}">
                                    <span class="text-danger is-invalid sound_or_speaker_contractor_contact_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="sound_or_speaker_type">Sound or Speaker Type / लाऊड स्पीकर / ध्वनी प्रणालीचा प्रकार <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sound_or_speaker_type" name="sound_or_speaker_type" type="number" placeholder="Enter Sound or Speaker Type " value="{{ $data->sound_or_speaker_type }}">
                                    <span class="text-danger is-invalid sound_or_speaker_type_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="concerned_police_station">Concerned police station / संबंधित पोलीस स्टेशन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="concerned_police_station" id="concerned_police_station">
                                        <option value="">Select Option</option>
                                        <option value="पोलीस स्टेशन 1" {{ $data->concerned_police_station == "पोलीस स्टेशन 1" ? 'selected' : '' }}>पोलीस स्टेशन 1</option>
                                        <option value="पोलीस स्टेशन 2" {{ $data->concerned_police_station == "पोलीस स्टेशन 2" ? 'selected' : '' }}>पोलीस स्टेशन 2</option>
                                        <option value="पोलीस स्टेशन 3" {{ $data->concerned_police_station == "पोलीस स्टेशन 3" ? 'selected' : '' }}>पोलीस स्टेशन 3</option>
                                    </select>
                                    <span class="text-danger is-invalid concerned_police_station_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="concerned_traffic_police_station">Concerned traffic police station / संबंधित ट्रॅफिक पोलीस स्टेशन<span class="text-danger">*</span></label>
                                    <select class="form-control" name="concerned_traffic_police_station" id="concerned_traffic_police_station">
                                        <option value="">Select Option</option>
                                        <option value="जिल्हा वाहतूक नियंत्रण शाखा भाईंदर" {{ $data->concerned_traffic_police_station == "जिल्हा वाहतूक नियंत्रण शाखा भाईंदर" ? 'selected' : '' }}>जिल्हा वाहतूक नियंत्रण शाखा भाईंदर</option>
                                    </select>
                                    <span class="text-danger is-invalid concerned_traffic_police_station_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="nearest_fire_station">Nearest fire station / जवळचे अग्निशामक केंद्र <span class="text-danger">*</span></label>
                                    <select class="form-control" name="nearest_fire_station" id="nearest_fire_station">
                                        <option value="">Select Option</option>
                                        <option value="म.न.पा.अग्निशमन केंद्र" {{ $data->nearest_fire_station == "म.न.पा.अग्निशमन केंद्र" ? 'selected' : '' }}>म.न.पा.अग्निशमन केंद्र</option>
                                    </select>
                                    <span class="text-danger is-invalid nearest_fire_station_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="board_registration_document">Board Registration Certificate/Permission/Guarantee of Hon'ble Charity Commissioner to deposit subscription / मंडळ नोदणी प्रमाणपत्र/वर्गणी जमा करण्याची मा.धर्मादाय आयुक्तांची परवानगी/हमीपत्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="board_registration_document" name="board_registration_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->board_registration_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid board_registration_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_objection_document">No objection certificate from the owner of the premises / जागेच्या मालकाचा ना हरकत दाखला<span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_objection_document" name="no_objection_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->no_objection_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid no_objection_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_map_document">Location Map of Pandol / Stage / मंडप / स्टेजचा स्थळदर्शक नकाशा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_map_document" name="location_map_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->location_map_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid location_map_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="fire_last_year_noObjection_document">Last year no objection certificate of fire brigade / अग्निशामक दलाचा मागील वर्षीचा ना हरकत दाखला</label>
                                    <input class="form-control" id="fire_last_year_noObjection_document" name="fire_last_year_noObjection_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->fire_last_year_noObjection_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid fire_last_year_noObjection_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="traffic_last_year_noObjection_document">Last year no objection certificate from concerned traffic police / संबंधित वाहतूक पोलिसांचा मागील वर्षीचा ना हरकत दाखला</label>
                                    <input class="form-control" id="traffic_last_year_noObjection_document" name="traffic_last_year_noObjection_documents" type="file">
                                    <small><a href="{{ asset('storage/' . $data->traffic_last_year_noObjection_document) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid traffic_last_year_noObjection_document_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="annexure">annexure -1 / घोषणापत्र </label>
                                    <input class="form-control" id="annexure" name="annexures" type="file">
                                    <small><a href="{{ asset('storage/' . $data->annexure) }}" target="_blank">View Document</a></small>
                                    <span class="text-danger is-invalid annexure_err"></span>
                                </div>

                                <label class="col-form-label" for="is_correct_info">स्वीकरण:</label>
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
        var updateUrl = '{{ route("trade-noc-mandap.update", $data->id) }}';
        formdata.append('_method', 'PUT');
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("trade-noc-mandap.create") }}';
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
            }
        });

    });
</script>

