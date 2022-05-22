@extends('layouts.admin')

@section('content')
<div class="right-side">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Starting of Dashboard header items area -->
                <div class="panel panel-default admin">
                    <div class="panel-heading admin-title">
                        <div class="product__header" style="border-bottom: none;">
                            <div class="row reorder-xs">
                                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                    <div class="product-header-title">
                                        <h2 style="font-size: 25px;">Sub Head Office Dashboard</h2>
                                    </div>
                                </div>
                                @include('includes.notification')
                            </div>
                        </div>
                    </div>
                    <div class="panel-body dashboard-body">
                        <div class="dashboard-header-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('includes.form-success')
                                    @if($activation_notify != "")
                                    <div class="alert alert-danger validation">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h3 class="text-center">{!! $activation_notify !!}</h3>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_frenchises', $user->id)}}" class="title-stats title-red">
                                        <div class="icon"><i class="fa fa-shopping-cart fa-5x"></i></div>
                                        <div class="number">{{count($franchises_list)}}</div>
                                        <h4>Total Franchises!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_frenchises_by_status',[$user->id, 'pending'])}}" class="title-stats title-cyan">
                                        <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                        <div class="number">{{count($franchises_list->where("status",'=',0))}}</div>
                                        <h4>Pending Franchises!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_frenchises_by_status',[$user->id,'approved'])}}" class="title-stats title-green">
                                        <div class="icon"><i class="fa fa-truck fa-5x"></i></div>
                                        <div class="number">{{count($franchises_list->where("status",'=',1))}}</div>
                                        <h4>Approved Franchises!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_orders_by_status', [$user->id,'all'])}}" class="title-stats title-dark">
                                        <div class="icon"><i class="fa fa-shopping-cart fa-5x"></i></div>
                                        <div class="number">{{count($franchises_orders)}}</div>
                                        <h4>Total Orders!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_orders_by_status', [$user->id,'processing'])}}" class="title-stats title-red">
                                        <div class="icon"><i class="fa fa-shopping-cart fa-5x"></i></div>
                                        <div class="number">{{count($franchises_orders_processing)}}</div>
                                        <h4>Orders Processing!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin.sub_head_office_orders_by_status', [$user->id,'completed'])}}" class="title-stats title-green">
                                        <div class="icon"><i class="fa fa-shopping-cart fa-5x"></i></div>
                                        <div class="number">{{count($franchises_orders_completed)}}</div>
                                        <h4>Orders Completed!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>

                                <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('admin-order-completed')}}" class="title-stats title-orange">
                                                <div class="icon"><i class="fa fa-check fa-5x"></i></div>
                                                <div class="number">{{count($franchises_orders_completed)}}</div>
                                                <h4>Orders Completed!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div> -->

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin-user-index')}}" class="title-stats title-purple">
                                        <div class="icon"><i class="fa fa-user fa-5x"></i></div>
                                        <div class="number">{{count($users)}}</div>
                                        <h4>Total Vendors!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{route('admin-subs-index')}}" class="title-stats title-blue">
                                        <div class="icon"><i class="fa fa-at fa-5x"></i></div>
                                        <div class="number">{{count($subs)}}</div>
                                        <h4>Total Subscribers!</h4>
                                        <span class="title-view-btn">View All</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ending of Dashboard header items area -->

                <!-- Starting of Dashboard Top reference + Most Used OS area -->
                <div class="reference-OS-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="panel panel-default admin top-reference-area">
                                <div class="panel-heading">Top Referrals</div>
                                <div class="panel-body">
                                    <div id="chartContainer-topReference"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="panel panel-default admin top-reference-area">
                                <div class="panel-heading">Most Used OS</div>
                                <div class="panel-body">
                                    <div id="chartContainer-os"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ending of Dashboard Top reference + Most Used OS area -->
                <!-- Starting of Dashboard header items area -->
                <div class="panel panel-default admin">
                    <div class="panel-heading admin-title">Total Sales in Last 30 Days</div>
                    <div class="panel-body dashboard-body">
                        <div class="dashboard-header-area">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding: 0">
                                    <canvas id="lineChart" style="width: 100%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection

    @section('scripts')

    <script language="JavaScript">
        displayLineChart();

        function displayLineChart() {
            var data = {
                labels: [{!!$days!!}],
                datasets: [{
                    label: "Prime and Fibonacci",
                    fillColor: "#3dbcff",
                    strokeColor: "#0099ff",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [{!!$sales!!}]
                }]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>

    <script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference", {
            exportEnabled: true,
            animationEnabled: true,

            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach($referrals as $browser)
                    {
                        y: {{ $browser->total_count }},
                        name: "{{$browser->referral}}"
                    }
                    @endforeach
                ]
            }]
        });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os", {
            exportEnabled: true,
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach($browsers as $browser)
                    {
                        y: {{ $browser->total_count }},
                        name: "{{$browser->referral}}"
                    }
                    @endforeach
                ]
            }]
        });
        chart.render();
    </script>
    @endsection