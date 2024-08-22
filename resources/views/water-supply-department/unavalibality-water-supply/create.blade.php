<x-admin.layout>
    <x-slot name="title">Unavailability Of Water Supply / पाणीपुरवठा जोडणी नसले बाबत प्रमाणपत्र</x-slot>
    <x-slot name="heading"> Unavailability Of Water Supply / पाणीपुरवठा जोडणी नसले बाबत प्रमाणपत्र</x-slot>
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
                                    <label class="col-form-label" for="applicant_name">Applicant's Full Name / अर्जदाराचे संपूर्ण नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="applicant_name" name="applicant_name" type="text" placeholder="Enter Applicant's Full Name  ">
                                    <span class="text-danger is-invalid applicant_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id"> Email Id  / ईमेल आयडी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile Number / मोबाईल नंबर<span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile Number">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Applicant's Full Address / अर्जदाराचा संपूर्ण पत्ता  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="police_station">Police Station / पोलीस स्टेशन</label>
                                    <input class="form-control" id="police_station" name="police_station" type="text" placeholder="Enter police station">
                                    <span class="text-danger is-invalid police_station_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="name_of_commercail_establishment">Name of Commercail Establishment / व्यावसायिक संस्थेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_of_commercail_establishment" name="name_of_commercail_establishment" type="text" placeholder="Enter Name of Commercail Establishment">
                                    <span class="text-danger is-invalid name_of_commercail_establishment_err"></span>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone">Zone / झोन<span class="text-danger">*</span></label>
                                    <select class="form-select" name="zone" id="zone">
                                        <option value="">Select Zone</option>
                                        @php
                                            $options = ["Prabhag1", "Prabhag2", "Prabhag3", "Prabhag4", "Prabhag5", "Prabhag6"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward_area">Ward Area / प्रभाग क्षेत्र<span class="text-danger">*</span></label>
                                    <select class="form-select" name="ward_area" id="ward_area">
                                        <option value="">Select Ward Area</option>
                                        @php
                                            $options = ["firstward"];
                                        @endphp
                                        @foreach($options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_area_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address_of_com_establishment">Address of commercial establishment / व्यावसायिक संस्थेचा पत्ता<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address_of_com_establishment" id="address_of_com_establishment" cols="30" rows="2"  placeholder="Enter  Address"></textarea>
                                    <span class="text-danger is-invalid address_of_com_establishment_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="no_of_working_person">Number of persons working in the premise / परिसरात काम करणाऱ्या व्यक्तींची संख्या<span class="text-danger">*</span></label>
                                    <input class="form-control" id="no_of_working_person" name="no_of_working_person" type="number" placeholder="Enter Number of persons working in the premise">
                                    <span class="text-danger is-invalid no_of_working_person_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="per_day_water_demand">Water requirement per day demand / पाण्याची गरज प्रतिदिन मागणी<span class="text-danger">*</span></label>
                                    <input class="form-control" id="per_day_water_demand" name="per_day_water_demand" type="number" placeholder="Enter Water requirement per day demand">
                                    <span class="text-danger is-invalid per_day_water_demand_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="other_info">Any other information / इतर कोणतीही माहिती<span class="text-danger">*</span></label>
                                    <input class="form-control" id="other_info" name="other_info" type="text" placeholder="Enter Any other information">
                                    <span class="text-danger is-invalid other_info_err"></span>
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
            url: '{{ route("water-unavailability-supply.store") }}',
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
                            window.location.href = '{{ route("water-unavailability-supply.create") }}';
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

