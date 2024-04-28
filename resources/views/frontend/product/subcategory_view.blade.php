@extends('frontend.main_master')
@section('content')
@section('title')
category Product
@endsection





<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        @foreach($breadsubcat as $item)
        <li class='active'>{{ $item->category->category_name_en }}</li>
        @endforeach


      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>

        <!-- ===== == TOP NAVIGATION ======= ==== -->
        @include('frontend.common.vertical_menu')
        <!-- = ==== TOP NAVIGATION : END === ===== -->




        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
                @if(session()->get('language') == 'arabic')
              <h3 class="section-title">التسوق عن طريق</h3>
              <div class="widget-header">
                <h4 class="widget-title">الفئات</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
@else
<h3 class="section-title">shop by</h3>
<div class="widget-header">
  <h4 class="widget-title">Category</h4>
</div>
<div class="sidebar-widget-body">
  <div class="accordion">
@endif
 @foreach($categories as $category)
	<div class="accordion-group">
	<div class="accordion-heading"> <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
		@if(session()->get('language') == 'arabic') {{ $category->category_name_ar }} @else {{ $category->category_name_en }} @endif </a> </div>
	<!-- /.accordion-heading -->
	<div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
	  <div class="accordion-inner">

 @php
  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
  @endphp

   @foreach($subcategories as $subcategory)
	    <ul>
	      <li><a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">
	      	@if(session()->get('language') == 'arabic') {{ $subcategory->subcategory_name_ar }} @else {{ $subcategory->subcategory_name_en }} @endif</a></li>

	    </ul>
	@endforeach


	  </div>
	  <!-- /.accordion-inner -->
	</div>
	<!-- /.accordion-body -->
	</div>
	<!-- /.accordion-group -->
    @endforeach











                </div>
                <!-- /.accordion -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== PRICE SILDER============================================== -->

            <!-- /.sidebar-widget -->
            <!-- ============================================== PRICE SILDER : END ============================================== -->



            <!-- == ====== PRODUCT TAGS ==== ======= -->
              @include('frontend.common.product_tags')
            <!-- /.sidebar-widget -->
             <!-- == ====== END PRODUCT TAGS ==== ======= -->






          <!----------- Testimonials------------->

            @include('frontend.common.testimonials')
            <!-- == ========== Testimonials: END ======== ========= -->




          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                            <!-- /.item -->

                            @foreach ($sliders as $slider)
                                <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">

                                            <div class="big-text fadeInDown-1" style="color: white">{{ $slider->title }} </div>
                                            <div  class="excerpt fadeInDown-2 hidden-xs">
                                                <span style="color:white">{{ $slider->description }}</span>
                                            </div>
                                            <div class="button-holder fadeInDown-3"> <a style="color: white" href="{{url('/shop')}}"
                                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                    Now</a> </div>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->
                            @endforeach

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    @if (session()->get('language') == 'arabic')
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">الشراء بسهوله</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">اكثر من طريقه للدفع</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">عروض خاصة</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">اغتنم احدث العروض</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">كل ما تريد</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">خصومات علي جميع المنتجات</h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    @else
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Shopping Easier</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Easy Payment</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Hot Deals</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Claim Your Special offer</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">All you want</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Sale OFF in many item</h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    @endif



        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="text-right col col-sm-6 col-md-4">

              <!-- /.pagination-container --> </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>


<!--    //////////////////// START Product Grid View  ////////////// -->

        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">



@foreach($products as $product)
  <div class="col-sm-6 col-md-4 wow fadeInUp">
    <div class="products">
      <div class="product">
        <div class="product-image">
          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
          <!-- /.image -->

           @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>


        </div>
        <!-- /.product-image -->

        <div class="text-left product-info">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
          	@if(session()->get('language') == 'arabic') {{ $product->product_name_ar }} @else {{ $product->product_name_en }} @endif</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>


@if ($product->discount_price == NULL)
<div class="product-price"> <span class="price"> EGP{{ $product->selling_price }} </span>   </div>

@else

<div class="product-price"> <span class="price"> EGP{{ $product->discount_price }} </span> <span class="price-before-discount">EGP {{ $product->selling_price }}</span> </div>
@endif




          <!-- /.product-price -->

        </div>
        <!-- /.product-info -->
        <div class="clearfix cart animate-effect">
          <div class="action">
            <ul class="list-unstyled">
                <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" type="button"
                        title="Add Cart" data-toggle="modal"
                        data-target="#exampleModal" id="{{ $product->id }}"
                        onclick="productView(this.id)"> <i
                            class="fa fa-shopping-cart"></i> </button>
                    <button class="btn btn-primary cart-btn" type="button">Add to
                        cart</button>
                </li>
                <li>
                    <form action="{{ route('wishlist.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id"  value="{{ $product->id }}"/>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-heart"></i></button>
                    </form>
                </li>
            </ul>
          </div>
          <!-- /.action -->
        </div>

        <!-- /.cart -->
      </div>
      <!-- /.product -->

    </div>
    <!-- /.products -->
  </div>
  <!-- /.item -->
  @endforeach











                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->

 <!--            //////////////////// END Product Grid View  ////////////// -->




 <!--            //////////////////// Product List View Start ////////////// -->



            <div class="tab-pane "  id="list-container">
              <div class="category-product">



 @foreach($products as $product)
<div class="category-product-inner wow fadeInUp">
  <div class="products">
    <div class="product-list product">
      <div class="row product-list-row">
        <div class="col col-sm-4 col-lg-4">
          <div class="product-image">
            <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
          </div>
          <!-- /.product-image -->
        </div>
        <!-- /.col -->
        <div class="col col-sm-8 col-lg-8">
          <div class="product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
            	@if(session()->get('language') == 'arabic') {{ $product->product_name_ar }} @else {{ $product->product_name_en }} @endif</a></h3>
            <div class="rating rateit-small"></div>


            @if ($product->discount_price == NULL)
            <div class="product-price"> <span class="price"> EGP{{ $product->selling_price }} </span>  </div>
            @else
<div class="product-price"> <span class="price"> EGP{{ $product->discount_price }} </span> <span class="price-before-discount">EGP {{ $product->selling_price }}</span> </div>
            @endif

            <!-- /.product-price -->
            <div class="description m-t-10">
            	@if(session()->get('language') == 'arabic') {{ $product->short_desc_ar }} @else {{ $product->short_desc_en }} @endif</div>
            <div class="clearfix cart animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" type="button"
                    title="Add Cart" data-toggle="modal"
                    data-target="#exampleModal" id="{{ $product->id }}"
                    onclick="productView(this.id)"> <i
                        class="fa fa-shopping-cart"></i> Add to
                        cart</button>
                  </li>
                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                </ul>
              </div>
              <!-- /.action -->
            </div>


            <!-- /.cart -->

          </div>
          <!-- /.product-info -->
        </div>
        <!-- /.col -->
      </div>



         @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp

                      <!-- /.product-list-row -->
                      <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>



                    </div>
                    <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
                </div>
                <!-- /.category-product-inner -->
    @endforeach



 <!--            //////////////////// Product List View END ////////////// -->








              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  {{ $products->links()  }}
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->

    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container -->

</div>
<!-- /.body-content -->








@endsection
