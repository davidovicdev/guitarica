@foreach ($categories as $category)
<li><a href="{{route("products.index")}}">{{$category->name}}</a></li>
@endforeach
