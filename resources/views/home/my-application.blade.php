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
                        <table id="alternative-pagination" class="table table-bordered align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Application No</th>
                                    <th>Service Name</th>
                                    <th>Date</th>
                                    <th>Make Payment</th>
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
                                        <td>{{ array_key_exists($data->service_id, $serviceName) ? $serviceName[$data->service_id] : '' }}</td>
                                        <td>{{ date('d-m-Y h:i A', strtotime($data->created_at)) }}</td>
                                        <td>
                                            @if(!$data->is_payment_paid && $data->status == "4")
                                                <a href="{{ route('create-payment', ['service_id' => $data->service_id, 'application_id' => $data->id]) }}" data-id="{{ $data->service_id }}" class="btn btn-secondary btn-sm paymentPage">Make Payment to Corporation</a>
                                            @elseif (Auth::user()->is_aapale_sarkar_user && !$data->is_payment_paid_aapale_sarkar && $data->status == "4")
                                                <a href="{{ route('generate-payment-url', ['service_id' => $data->service_id, 'application_no' => $data->application_no]) }}" class="btn btn-primary btn-sm">Make Payment To Aapale Sarkar</a>
                                            @else
                                            Under Scrutiny
                                            @endif
                                        </td>
                                        <td>{{ $data->payment_date ? date('d-m-Y', strtotime($data->payment_date)) : '-' }}</td>
                                        <td>
                                            @if ($data->status == '1')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($data->status == '2')
                                                <span class="badge bg-info">Payment Pending</span>
                                            @elseif($data->status == '3')
                                                <span class="badge bg-secondry">Under Scrutiny</span>
                                            @elseif($data->status == '4')
                                                <span class="badge bg-success">Accepted</span>
                                            @elseif($data->status == '5')
                                                <span class="badge bg-danger">Reject</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($data->status <= 3)
                                                <a href="{{ array_key_exists($data->service_id, $editRoute) && $editRoute[$data->service_id] != '' ? route($editRoute[$data->service_id], encrypt($data->id)) : '#' }}"
                                                    class="btn btn-primary btn-sm p-1">Edit</a>
                                            @else
                                                -
                                            @endif
                                        </td>
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
