@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Cash On Delivery
@endsection

@auth
@php
$user = Auth::user();

$cart = \App\Models\Cart::where('user_id',$user->id)->get();

$total = 0;

foreach ($cart as $key => $item) {
    $total += $item->price * $item->quantity;
}


@endphp
@endauth


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Cash On Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Amount </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> EGP{{ $total }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> EGP{{ session()->get('coupon')['discount_amount'] }}
 <hr>

  <strong>Grand Total : </strong> EGP{{ session()->get('coupon')['total_amount'] }}
 <hr>


		 	@else

<strong>SubTotal: </strong> EGP{{ $total }} <hr>

<strong>Grand Total : </strong> EGP{{ $total }} <hr>


		 	@endif

		 </li>



				</ul>
			</div>
		</div>
	</div>
</div>
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select Payment Method</h4>
		    </div>

<form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">

          <img src="{{ asset('logo/cash.png') }}" style="width:100%">

            <label for="card-element">


            </label>




        </div>
        <br>
        <button class="btn btn-primary">Submit Payment</button>
        </form>



		</div>
	</div>
</div>
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->
</div><!-- /.container -->
</div><!-- /.body-content -->








@endsection
