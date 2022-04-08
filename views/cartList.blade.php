@extends('master')

@section('content')
<div  class =" custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2 style ="color:green;">List of Ordered Items</h2>
            <a class ="btn btn-primary" href="order">Let's Order </a> <br> <br>
            @foreach($products as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                    <img class = "trending-image" src="{{$item->gallery}} " >
                    </a>
                    </div>


                    <div class="col-sm-5">
                    <div>
                        <h2>{{$item->name}}</h2>
                        <h5>{{$item->description}}</h5>
                    </div>
                    </div>
                

                    <div class="col-sm-3">
                        <a href = "/removecart/{{$item->cart_id}}"class="btn btn-info">Remove From Cart</a>
                  
                    </div>

                </div>
                @endforeach 
        </div>  

    </div>
</div>
@endsection