@extends('sys')

@section('title')
    <title>Money Pot | Dashboard</title>
@endsection

@section('stylesshets')
    <link rel="stylesheet" href="{{asset('vendor/apexcharts/apexcharts.css')}}">
@stop

@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-dashboard"></i>&nbsp;Dashboard
        </h4>

        <div class="metric-boxes grid">
            <div class="row">
                <div class="cell">
                    <div class="icon-box bg-darkCyan fg-white">
                        <div class="icon"><span class="mif-users"></span></div>
                        <div class="content">
                            <div class="p-2">
                                <div>Clients</div>
                                <div class="text-bold text-leader">{{$data['clients']['metric']}}</div>
                            </div>

                            <div class="pl-2 pr-2">
                                <span class="text-small">
                                    {{$data['clients']['increase']}} % Increase in 30 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell">
                    <div class="icon-box bg-darkCyan fg-white">
                        <div class="icon"><span class="mif-coins"></span></div>
                        <div class="content">
                            <div class="p-2">
                                <div>Loans</div>
                                <div class="text-bold text-leader"> {{$data['loans']['metric']}}</div>
                            </div>

                            <div class="pl-2 pr-2">
                                <span class="text-small">
                                     {{$data['loans']['increase']}}% Increase in 30 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell">
                    <div class="icon-box bg-darkCyan fg-white">
                        <div class="icon"><span class="mif-credit-card"></span></div>
                        <div class="content">
                            <div class="p-2">
                                <div>Overdue</div>
                                <div class="text-bold text-leader"> {{$data['overdue']['metric']}}</div>
                            </div>

                            <div class="pl-2 pr-2">
                                <span class="text-small">
                                     {{$data['overdue']['increase']}}% Increase in 30 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell">
                    <div class="icon-box bg-darkCyan fg-white">
                        <div class="icon"><span class="mif-money"></span></div>
                        <div class="content">
                            <div class="p-2">
                                <div>Repayments to date</div>
                                <div class="text-bold text-leader"> {{$data['repayments']['metric']}}</div>
                            </div>

                            <div class="pl-2 pr-2">
                                <span class="text-small">
                                     {{$data['repayments']['increase']}}% Increase in 30 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- ./ row -->
        </div><!-- ./ grid -->

        <div class="trends grid">
            <div class="row">
                <div class="cell-9">
                    <div class="card">
                        <div class="card-content p-0">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div><!-- ./ cell -->
                <div class="cell-3">
                    <div class="card">
                        <div class="card-header py-2">
                          <i class="mif mif-users"></i>&nbsp;Top Clients
                        </div>
                        <div class="card-content p-2">
                            <ul data-role="listview">
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya"></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header py-2">
                           <i class="mif mif-money"></i>&nbsp;Dues
                        </div>
                        <div class="card-content p-2">
                            <ul data-role="listview" data-structure="{'amount':true}">
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>
                                <li data-icon="<span class='mif-user'>" data-caption="Francis Ganya" data-amount="50,000"></li>


                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="button mini primary">View All &rarr;</button>
                        </div>

                    </div>
                </div>
            </div><!--./ row -->
        </div><!-- ./ grid trends -->
    </div>
@stop


@section('scripts')
    <script src="{{asset('vendor/apexcharts/apexcharts.js')}}"></script>
    <script>
        var options = {
            chart: {
                height: 500,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Credits',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: 'K (thousands)'
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "K " + val + " thousands"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();
    </script>
@stop


