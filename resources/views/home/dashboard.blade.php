<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    {{-- {{ dd($data->where('main_service_id', 6)->where('created_at', 'like', '%'.date('Y-08').'%')->count()) }} --}}
    <div class="row">
        @foreach($services as $service)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-header bg-primary">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-capitalize text-center fw-medium text-white text-truncate mb-0"> {{ $service->name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 col-sm-3 text-center" style="border-right: 1px solid #2422227a">
                            <h6>Total</h6>
                            <h5 class="counter"> 
                                <a href="javascript:void(0)">{{ $data->where('main_service_id', $service->id)->count() }}</a>
                            </h5>
                        </div>
                        <div class="col-3 col-sm-3 text-center" style="border-right: 1px solid #2422227a">
                            <h6>Approve</h6>
                            <h5 class="counter"> 
                                <a href="javascript:void(0)">{{ $data->where('main_service_id', $service->id)->where('status', 4)->count() }}</a>
                            </h5>
                        </div>
                        <div class="col-3 col-sm-3 text-center" style="border-right: 1px solid #2422227a">
                            <h6>Reject</h6>
                            <h5 class="counter"> 
                                <a href="javascript:void(0)">{{ $data->where('main_service_id', $service->id)->where('status', 5)->count() }}</a>
                            </h5>
                        </div>
                        <div class="col-3 col-sm-3 text-center">
                            <h6>Pending</h6>
                            <h5 class="counter"> 
                                <a href="javascript:void(0)">{{ $data->where('main_service_id', $service->id)->whereNotIn('status', ["4", "5"])->count() }}</a>
                            </h5>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        @endforeach

    </div>

    {{-- tab system service --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 text-dark" style="font-weight: 600">
                                Pending Application
                            </h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="step-arrow-nav mb-4">
                                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">

                                    @foreach($services as $service)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if($loop->iteration == 1)active @endif" id="{{ str_replace(' ', '', $service->name) }}-tab" data-bs-toggle="pill" data-bs-target="#{{ str_replace(' ', '', $service->name) }}" type="button" role="tab" aria-controls="{{ str_replace(' ', '', $service->name) }}" aria-selected="true">{{ $service->name }}</button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="tab-content" style="height: 300px; overflow-y:scroll;overflow-x:hidden">
                                @foreach($services as $service)
                                <div class="tab-pane fade @if($loop->iteration == 1)show active @endif" id="{{ str_replace(' ', '', $service->name) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ', '', $service->name) }}-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Pending {{ $service->name }} Application</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr No.</th>
                                                            <th>Service Name</th>
                                                            <th>3+ days</th>
                                                            <th>7+ days</th>
                                                            <th>10+ days</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($service->services as $ser)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $ser->name }}</td>

                                                            <td>{{ $data->where('main_service_id', $service->id)->where('service_id', $ser->id)->whereNotIn('status', ["4", "5"])->where('created_at', '<=', date('Y-m-d', strtotime('-4 days')))->where('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count() }}</td>

                                                            <td>{{ $data->where('main_service_id', $service->id)->where('service_id', $ser->id)->whereNotIn('status', ["4", "5"])->where('created_at', '<=', date('Y-m-d', strtotime('-8 days')))->where('created_at', '>=', date('Y-m-d', strtotime('-10 days')))->count() }}</td>
                                                            
                                                            <td>{{ $data->where('main_service_id', $service->id)->where('service_id', $ser->id)->whereNotIn('status', ["4", "5"])->where('created_at', '<', date('Y-m-d', strtotime('-10 days')))->count() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
    {{-- end of tab system service --}}


    <div class="row overflow-hidden">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1 text-white">Service Wise Pie Chart</h4>
                    
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="rtsPiechart"></div>
                </div>
            </div> <!-- .card-->
        </div> <!-- .col-->

        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1 text-white">Portal Wise Pie Chart</h4>
                    
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="rtsDifferencePiechart"></div>
                </div>
            </div> <!-- .card-->
        </div> <!-- .col-->
    </div> <!-- end row-->




    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h3 class="card-title text-white">Month Wise Application Received</h3>
                    <select name="" id="">
                        <option value="">2024 &nbsp;&nbsp;</option>
                    </select>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    @for($i=1; $i <= 12; $i++)
                                    <th>{{ date('F', mktime(0,0,0,$i, 1, date('Y'))).' '. date('Y') }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-01'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-02'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-03'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-04'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-05'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-06'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-07'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-08'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-09'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-10'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-11'))->count() }}</td>
                                    <td>{{ $data->where('main_service_id', $service->id)->where('yearmonth', date('Y-12'))->count() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    
        </div>
    </div>

    @push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Service', 'Hours per Day'],
                @foreach($services as $service)
                ['{{ $service->name }}', {{ $data->where('main_service_id', $service->id)->count() }}],
                @endforeach
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'', 'width':600, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('rtsPiechart'));
            chart.draw(data, options);
        }


        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawDifferenceChart);

        // Draw the chart and set the chart values
        function drawDifferenceChart() {
            var data = google.visualization.arrayToDataTable([
                ['Service', 'Hours per Day'],
                ['Application Receive From Aapale Sarkar Portal', {{ $data->where('user_id', 1)->count() }}],
                ['Application Receive From RTS Portal', {{ $data->where('user_id', 0)->count() }}],
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'', 'width':600, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('rtsDifferencePiechart'));
            chart.draw(data, options);
        }
    </script>
    @endpush


</x-admin.layout>
