@extends('admin.layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Orders</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                        <h3>Order #{{$order->id}}</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Customer Name: {{$order->user->first_name}} {{$order->user->last_name}}</li>
                            <li class="list-group-item">Email: {{$order->user->email}}</li>
                            <li class="list-group-item">Phone: {{$order->user->phone}}</li>
                            <li class="list-group-item">Order Datetime: {{$order->created_at}}</li>
                        </ul>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($order->orderProducts as $orderProduct)
                                <tr>
                                    <td>{{$orderProduct->product->id}}</td>
                                    <td>{{$orderProduct->product->brand->name}} {{$orderProduct->product->name}}</td>
                                    <td>{{$orderProduct->quantity}}</td>
                                    <td>{{$orderProduct->price}} EUR</td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>   
                        <span class="h4 ">Total:  {{$order->total}} EUR</span>
                        <hr>                    
                        @endforeach
                    @else
                        <h3 class="mt-2">No orders yet</h3>
                    @endif 
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


@endsection