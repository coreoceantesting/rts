<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:{{ $service->background_color }}">
                                <img src="{{ asset('storage/'.$service->image) }}" width="25px" alt="{{ $service->name }}">
                                <h5 class="card-title text-white">{{ $service->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary btn-sm" href="@if($service->route_name){{ route($service->route_name) }}@else {{ route('service.my-service', $service->id) }} @endif">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning btn-sm" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:#b73107">
                                <img src="{{ asset('admin/images/icon/Construction Department.png') }}" width="25px" alt="बांधकाम विभाग">
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
                            <div class="card-header d-flex justify-content-between" style="background:#037ca2">
                                <img src="{{ asset('admin/images/icon/Birth Death Certificate.png') }}" width="25px" alt="जन्म मृत्यु">
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
                            <div class="card-header d-flex justify-content-between" style="background:#00aea4">
                                <img src="{{ asset('admin/images/icon/City structure.png') }}" width="25px" alt="नगर रचना">
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
                            <div class="card-header d-flex justify-content-between" style="background:#2a85c7">
                                <img src="{{ asset('admin/images/icon/Marriage registration.png') }}" width="25px" alt="विवाह नोंदणी">
                                <h5 class="card-title text-white">विवाह नोंदणी</h5>
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
                            <div class="card-header d-flex justify-content-between" style="background:#b73107">
                                <img src="{{ asset('admin/images/icon/Property Tax Department.png') }}" width="25px" alt="मालमत्ता कर विभाग">
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
                            <div class="card-header d-flex justify-content-between" style="background:#037ca2">
                                <img src="{{ asset('admin/images/icon/Plumbing Department.png') }}" width="25px" alt="नळजोडणी विभाग">
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
                            <div class="card-header d-flex justify-content-between" style="background:#00aea4">
                                <img src="{{ asset('admin/images/icon/License.png') }}" width="25px" alt="परवाना">
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
                            <div class="card-header d-flex justify-content-between" style="background:#2a85c7">
                                <img src="{{ asset('admin/images/icon/Fire Department.png') }}" width="25px" alt="अग्निशमन विभाग">
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
                    <!-- end col--> --}}
                    
                </div>
            </div>
        </div>

    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
