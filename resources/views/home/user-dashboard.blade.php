<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}
    <style>
        .hovereffect:hover{
            transform: scale(1.1);
            transition: .9s;
        }
        .hovereffect{
            transition: .9s;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-3 col-lg-3 col-6 hovereffect">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:{{ $service->background_color }}">
                                <div class="d-flex">
                                    <img src="{{ asset('storage/'.$service->image) }}" width="25px" alt="{{ $service->name }}"><span style="padding-left: 6px;color: #fff;font-size: 21px;">[{{ $service->services_count }}]</span>
                                </div>
                                <h5 class="card-title text-white">{{ $service->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="border-right:1px solid #8c68cd">
                                        <a class="btn btn-primary" href="@if($service->route_name){{ route($service->route_name) }}@else {{ route('service.my-service', $service->id) }} @endif">Apply</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a class="btn btn-warning text-white" href="{{ route('my-application') }}">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
