<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-xxl-5">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">जन्म मृत्यु</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">नगर रचना</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">बांधकाम विभाग</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">बांधकाम विभाग</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="{{ route('marriage-registration.create') }}">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">मालमत्ता कर विभाग</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">नळजोडणी विभाग</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">परवाना</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#8c68cd">
                                <span class="fa fa-info-circle text-white"></span>
                                <h5 class="card-title text-white">अग्निशमन विभाग</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->
                    
                </div>
            </div>
        </div>

    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
