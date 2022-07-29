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
                                            <h2 style="font-size: 25px;">Frnchise Dashboard</h2>
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
                                           
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-prod-index',['id'=>$fid])}}" class="title-stats title-red">
                                            <div class="icon"><i class="fa fa-shopping-cart fa-5x"></i></div>
                                            <div class="number">{{count($products)}}</div>
                                            <h4>Total Products!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-order-status',['id'=>$fid,'status' => 'pending'])}}" class="title-stats title-cyan">
                                            <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                            <div class="number">{{count($pending)}}</div>
                                            <h4>Orders Pending!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-order-status',['id'=>$fid,'status' => 'processing'])}}" class="title-stats title-green">
                                            <div class="icon"><i class="fa fa-truck fa-5x"></i></div>
                                            <div class="number">{{count($processing)}}</div>
                                            <h4>Orders Procsessing!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-order-status',['id'=>$fid,'status' => 'completed'])}}" class="title-stats title-orange">
                                            <div class="icon"><i class="fa fa-check fa-5x"></i></div>
                                            <div class="number">{{count($completed)}}</div>
                                            <h4>Orders Completed!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-vendor-customer',['id'=>$fid])}}" class="title-stats title-purple">
                                            <div class="icon"><i class="fa fa-user fa-5x"></i></div>
                                            <div class="number">{{count($customer)}}</div>
                                            <h4>Total Customers!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{route('admin-frenchise-vendor-list',['id'=>$fid])}}" class="title-stats title-gray">
                                            <div class="icon"><i class="fa fa-fw fa-battery-half fa-5x"></i></div>
                                            <div class="number">
                                            {{$count_vendor}}
                                            </div>
                                            <h4>Total Vendor!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                        <?php 
                                             
                                            $vendors = App\Models\User::where('frenchise_id',$frenchise->id)->get()->pluck('id');
                                            $gincome = 0;
                                            $nincome = 0; 
                                            foreach($vendors as $key)
                                            {
                                                $gincome=$gincome+(App\Models\Vendororder::where('user_id','=',$key)->sum('price'));
                                            }
                                           
                                            $detection = (($gincome * $currency_sign->value) * $gs->percentage_commission)/100;
                                        ?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a  class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-at fa-5x"></i></div>
                                            <h4>Total Sale</h4>
                                            <div class="icon"><i class="fa fa-at fa-5x"></i></div>
                                            <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($gincome  * $currency_sign->value,2)}}</div>
                                            <h4>Total Sale</h4>

                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a  class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-at fa-5x"></i></div>
                                            <h4>15% of Total Sale</h4>
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($detection,2)}}</div>
                                            <h4>Gross Income</h4>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a  class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-at fa-5x"></i></div>
                                            <h4>30% of Gross Income</h4> 
                                            <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format((($detection*30)/100),2)}}</div>
                                            <h4>Net Income</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="panel panel-default admin">
                        <div class="panel-heading admin-title">Total Sales of <?php echo date('F Y') ?></div>
                            <div class="panel-body dashboard-body">
                                <div id="chtAnimatedBarChart" class="bcBar"></div>
                            </div>
                        </div>
                    <div>
                    
                        <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference + Most Used OS area
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
                    </div> -->
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

    $(function() {
      //var chart_data = getData();
      var chart_data = {!! $dailychart !!};

      $('#chtAnimatedBarChart').animatedBarChart({ data: chart_data });
   });

   getData = function() {
      return [
         { "group_name": "Google", "name": "Jan", "value": 38367 },
         { "group_name": "Google", "name": "Feb", "value": 32684 },
         { "group_name": "Google", "name": "Mar", "value": 28236 },
         { "group_name": "Google", "name": "Apr", "value": 44205 },
         { "group_name": "Google", "name": "May", "value": 3357 },
         { "group_name": "Google", "name": "Jun", "value": 3511 },
         { "group_name": "Google", "name": "Jul", "value": 10372 },
         { "group_name": "Google", "name": "Aug", "value": 15565 },
         { "group_name": "Google", "name": "Sep", "value": 23752 },
         { "group_name": "Google", "name": "Oct", "value": 28927 },
         { "group_name": "Google", "name": "Nov", "value": 21795 },
         { "group_name": "Google", "name": "Dec", "value": 49217 },
         { "group_name": "Apple", "name": "Jan", "value": 28827 },
         { "group_name": "Apple", "name": "Feb", "value": 13671 },
         { "group_name": "Apple", "name": "Mar", "value": 27670 },
         { "group_name": "Apple", "name": "Apr", "value": 6274 },
         { "group_name": "Apple", "name": "May", "value": 12563 },
         { "group_name": "Apple", "name": "Jun", "value": 31263 },
         { "group_name": "Apple", "name": "Jul", "value": 24848 },
         { "group_name": "Apple", "name": "Aug", "value": 41199 },
         { "group_name": "Apple", "name": "Sep", "value": 18952 },
         { "group_name": "Apple", "name": "Oct", "value": 30701 },
         { "group_name": "Apple", "name": "Nov", "value": 16554 },
         { "group_name": "Apple", "name": "Dec", "value": 36399 },
         { "group_name": "Microsoft", "name": "Jan", "value": 38674 },
         { "group_name": "Microsoft", "name": "Feb", "value": 9595 },
         { "group_name": "Microsoft", "name": "Mar", "value": 7520 },
         { "group_name": "Microsoft", "name": "Apr", "value": 2568 },
         { "group_name": "Microsoft", "name": "May", "value": 6583 },
         { "group_name": "Microsoft", "name": "Jun", "value": 44485 },
         { "group_name": "Microsoft", "name": "Jul", "value": 3405 },
         { "group_name": "Microsoft", "name": "Aug", "value": 31709 },
         { "group_name": "Microsoft", "name": "Sep", "value": 45442 },
         { "group_name": "Microsoft", "name": "Oct", "value": 37580 },
         { "group_name": "Microsoft", "name": "Nov", "value": 23445 },
         { "group_name": "Microsoft", "name": "Dec", "value": 7554 },
         { "group_name": "Samsung", "name": "Jan", "value": 40110 },
         { "group_name": "Samsung", "name": "Feb", "value": 35605 },
         { "group_name": "Samsung", "name": "Mar", "value": 15768 },
         { "group_name": "Samsung", "name": "Apr", "value": 15075 },
         { "group_name": "Samsung", "name": "May", "value": 12424 },
         { "group_name": "Samsung", "name": "Jun", "value": 12227 },
         { "group_name": "Samsung", "name": "Jul", "value": 40906 },
         { "group_name": "Samsung", "name": "Aug", "value": 34032 },
         { "group_name": "Samsung", "name": "Sep", "value": 18110 },
         { "group_name": "Samsung", "name": "Oct", "value": 4755 },
         { "group_name": "Samsung", "name": "Nov", "value": 42202 },
         { "group_name": "Samsung", "name": "Dec", "value": 36183 }
      ];
   }


        displayLineChart();
        function displayLineChart() {
            var data = {
                labels: [
                    {!! $days !!}
                ],
                datasets: [
                    {
                        label: "Prime and Fibonacci",
                        fillColor: "#3dbcff",
                        strokeColor: "#0099ff",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            {!! $sales !!}
                        ]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
        </script>

<script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
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
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($referrals as $browser)
                                    {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                                @endforeach
                        ]
                    }
                ]
            });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os",
            {
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
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                            @foreach($browsers as $browser)
                                {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                        ]
                    }
                ]
            });
        chart.render();
        
    
</script>
@endsection