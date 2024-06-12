<x-admin.layout>
    <x-slot name="title">Service</x-slot>
    <x-slot name="heading">Service</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-3 col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="background:{{ $service->background_color }}">
                                @if($service->image)
                                <img src="{{ asset('storage/'.$service->image) }}" width="25px" style="padding-right: 10px;" alt="{{ $service->name }}">
                                @endif
                                <h5 class="card-title text-white">{{ $service->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a class="btn btn-primary btn-sm" href="@if($service->route_name){{ route($service->route_name) }}@else javascript:void(0) @endif">New Application</a>
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
