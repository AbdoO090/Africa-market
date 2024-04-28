@extends('frontend.main_master')
@section('content')
@section('title')
    My Cart Page
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
@if ($message = Session::get('success'))
    <div class="p-4 mb-3 bg-green-400 rounded">
        <p class="text-green-800">{{ $message }}</p>
    </div>
@endif
<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr ><strong> My Cart</strong>

                                </tr>
                                <th class="cart-romove item">Image</th>
                                <th class="cart-description item">Name</th>

                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item">Remove</th>
                            </thead>
                            <tbody>
                                @php   $total=0;  @endphp
                                @foreach ($cartItems as $item)
                                    <tr>
                                        @php $total +=($item->price *$item->quantity);    @endphp



                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <a href="#">
                                                <img src="{{ asset($item->image) }}" class="w-20 rounded"
                                                    style="border-radius:50%;width:20%" alt="Thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <p class="mb-2 md:ml-4 text-purple-600 font-bold"><strong
                                                        style="color: black">{{ $item->name }}</strong></p>

                                            </a>
                                        </td>
                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <div class="h-10 w-28">
                                                <div class="relative flex flex-row w-full h-8">
                                                    <span class="text-sm font-medium lg:text-base">
                                                        {{ $item->quantity }}
                                                    </span>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <span class="text-sm font-medium lg:text-base">
                                                EGP{{ $item->price }}
                                            </span>
                                        </td>
                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>





                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 estimate-ship-tax" style="margin-left: 235px">
                    @if (Session::has('coupon'))
                    @else
                        <table class="table" id="couponField" >
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="You Coupon.." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary"
                                                onclick="applyCoupon()">APPLY COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total" style="flex: right" >
                    <table class="table">
                        <thead id="couponCalField">
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">EGP {{$total}}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">EGP {{$total}} </span>
                                </div>
                            </th>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout') }}" type="submit"
                                            class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->

            </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->


@endsection
