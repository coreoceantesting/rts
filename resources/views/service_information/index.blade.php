<x-admin.layout>
    <x-slot name="title">Service Information</x-slot>
    <x-slot name="heading">Service Information</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-xxl-5">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">जन्म मृत्यु</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">नगर रचना</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">बांधकाम विभाग</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="{{ route('marriage-registration.index') }}">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">विवाह नोंदणी </h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">मालमत्ता कर विभाग</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">नळजोडणी विभाग</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">परवाना</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <a href="javascript:void(0)">
                            <div class="card">
                                <div class="card-header" style="background:#8c68cd">
                                    <h5 class="card-title text-white">अग्निशमन विभाग</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between pb-0">
                                        <p style="font-size: 15px;">Apply</p>
                                        <span class="fa fa-info-circle text-primary"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end col-->
                    
                </div>
            </div>
        </div>

    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
