@extends('frontend.main_master')
@section('content')

@section('title')
 Wish List Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">

	<div class="table-responsive">
        <table>
            <thead>
                <tr ><strong> My Wishlist</strong>

                </tr>


            <tbody>
                <div class="container my-5">
                    <div class="card shadow">
                        <div class="card body">


                            @if ($wishlist->count()>0)
                            @foreach ($wishlist as $item)
                            <tr>



                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <a href="#">
                                        <img src="{{ asset($item->product->product_thambnail) }}" class="w-20 rounded"
                                        style="border-radius:50%;width:20%" alt="Thumbnail">
                                    </a>
                                </td>
                                <td >
                                    <a href="#">
                                        <p class="mb-2 md:ml-4 text-green-600 font-bold" ><strong
                                                style="color: black">{{ $item->product->product_name_en }}</strong></p>

                                    </a>
                                </td>

                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <span class="text-sm font-medium lg:text-base">
                                        EGP {{ $item->product->selling_price }}
                                    </span>
                                </td>
                                <td>
                                    <div class="col-sm-7">
                                        <button class="btn btn-primary icon" type="button"
                                        title="Add Cart" data-toggle="modal"
                                        data-target="#exampleModal" id="{{ $item->product->id }}"
                                        onclick="productView(this.id)"> <i
                                            class="fa fa-shopping-cart"></i><a  class="btn btn-primary mb-2"> Add To Cart</a> </button>

                                    </div>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <form action="{{ route('wishlist.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>


                                </td>



                            </tr>
                        @endforeach


                            @else
                            <h4>There is No Product In Wishlist</h4>

                            @endif
                        </div>
                    </div>
                </div>
            </tbody>
        </table>


	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>







@endsection
