<x-admin.layout>
    <x-slot name="title">My Application</x-slot>
    <x-slot name="heading">My Application</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="card-title">
                                My Application
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Application No</th>
                                    <th>Service Name</th>
                                    <th>Date</th>
                                    <th>Payment Date</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->application_no }}</td>
                                    <td>{{ (array_key_exists($serviceName[$data->service_id])) ? $serviceName[$data->service_id] : '' }}</td>
                                    <td>{{ date('d-m-Y', strtotime($data->create_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($data->aapale_sarkar_payment_date)) }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td><a href="#" class="btn bnt-primary">Edit</a></td>
                                </tr>
                                @empty
                                <tr align="center">
                                    <td colspan="7">No Service Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>


