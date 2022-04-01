@extends('admin.layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
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
                    @if (count($products) > 0)
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <td scope="col">Image</td>
                                <th scope="col">Brand</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity in Stock</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td scope="row"># {{$product->id}}</td>
                                <td><img src="{{asset("img/".$product->images->first()->src)}}" alt="{{$product->name}}"  height="100"></td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price()->where("active",1)->first()->price}}</td>
                             
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->withQueryString()->links("pagination::bootstrap-5")}}
                    @else
                        <h3 class="mt-2">No products </h3>
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