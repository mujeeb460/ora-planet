@extends('layouts.customer')

@section('content')

<div class="right-side">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Starting of Dashboard data-table area -->
                <div class="section-padding add-product-1">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="add-product-box">
                                <div class="product__header">
                                    <div class="row reorder-xs">
                                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                            <div class="product-header-title">
                                                <h2>Orders</h2>
                                                <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> All Orders</p>
                                            </div>
                                        </div>
                                        @include('includes.customer-notification')
                                    </div>
                                </div>
                                <div>
                                    @include('includes.form-error')
                                    @include('includes.form-success')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="width: 130px;">Customer Email</th>
                                                            <th class="text-center" style="width: 150px;">Invoice Number</th>
                                                            <th class="text-center" style="width: 90px;">Total Qty</th>
                                                            <th class="text-center" style="width: 100px;">Total Cost</th>
                                                            <th class="text-center" style="width: 160px;">Payment Method</th>
                                                            <th class="text-center" style="width: 160px;">Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td class="text-center"> {{$order->customer_email}}</td>
                                                            <td class="text-center"> <a href="{{route('customer-order-invoice',$order->id)}}">{{sprintf("%'.08d", $order->id)}}</a></td>
                                                            <td class="text-center"> {{$order->totalQty}}</td>
                                                            <td class="text-center"> {{$order->currency_sign}} {{ round($order->pay_amount * $order->currency_value , 2) }}</td>
                                                            <td class="text-center"><input type="hidden" value="{{$order->customer_email}}">{{$order->method === "pending"?"PAYMENT PENDING":strtoupper($order->method)}}</td>
                                                            @if($order->method==="pending")
                                                            <td class="text-center"><a href="{{route('paymentpage',$order->id)}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> Proceed Order</a> </td>
                                                            @else
                                                            <td class="text-center"><a href="{{route('customer-order-show',$order->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a></td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ending of Dashboard data-table area -->
        </div>
    </div>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">Update Order Status</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Do you want to proceed?</p>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success btn-ok">Proceed</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@endsection