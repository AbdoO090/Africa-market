@extends('frontend.main_master')
@section('content')
@section('title')
    {{ $product->product_name_en }} Product Details
@endsection



<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                @if (session()->get('language') == 'arabic')
                <li><a href="#">الرئيسية</a></li>               @else
                <li><a href="#">Home</a></li>              @endif


            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">




                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.common.hot_deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        @if (session()->get('language') == 'arabic')
                        <h3 class="section-title">عروض خاصة</h3>               @else
                        <h3 class="section-title">Special Deals</h3>            @endif

                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @foreach ($special_deals as $product)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                        <img src="{{ asset($product->product_thambnail) }}"
                                                                            alt=""> </a>
                                                                </div>
                                                                <!-- /.image -->
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                        @if (session()->get('language') == 'arabic')
                                                                            {{ $product->product_name_ar }}
                                                                        @else
                                                                            {{ $product->product_name_en }}
                                                                        @endif
                                                                    </a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price">
                                                                        EGP{{ $product->selling_price }} </span> </div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.product-micro-row -->
                                                    </div>
                                                    <!-- /.product-micro -->

                                                </div>
                                            </div>
                                        @endforeach <!-- // end special deals foreach -->


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- ============================================== Testimonials============================================== -->
          @include('frontend.common.testimonials')
                    <!-- ============================================== Testimonials: END ============================================== -->



                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product">
                                    @foreach ($multiImag as $img)
                                        <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{ asset($img->product_photo) }} ">
                                                <img class="img-responsive" alt=""
                                                    src="{{ asset($img->product_photo) }} "
                                                    data-echo="{{ asset($img->product_photo) }} " />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">

                                        @foreach ($multiImag as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide{{ $img->id }}">
                                                    <img class="img-responsive" alt=""
                                                        src="{{ asset($img->product_photo) }} "
                                                        data-echo="{{ asset($img->product_photo) }} " />
                                                </a>
                                            </div>
                                        @endforeach

                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"><a
                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                    @if (session()->get('language') == 'arabic')
                                        {{ $product->product_name_ar }}
                                    @else
                                        {{ $product->product_name_en }}
                                    @endif
                                </a></h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    @if (session()->get('language') == 'arabic')
                                        {{ $product->short_desc_ar }}
                                    @else
                                        {{ $product->short_desc_en }}
                                    @endif
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->discount_price == null)
                                                    <span class="price">EGP{{ $product->selling_price }}</span>
                                                @else
                                                    <span class="price">EGP{{ $product->discount_price }}</span>
                                                    <span class="price-strike">EGP{{ $product->selling_price }}</span>
                                                @endif


                                            </div>
                                        </div>
                                        <li>
                                            <form action="{{ route('wishlist.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id"  value="{{ $product->id }}"/>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-heart"></i></button>
                                            </form>
                                        </li>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->
                                <!--     /// Add  Product Size ///// -->







                                <!--     /// End Add Product Size ///// -->









                                    <div class="form-group">


                                      </div> <!-- // end form group -->




                                         <form action="{{url('/addcart')}}" method="POST">
                                            @csrf
                                            <input type="hidden"  name="product_id">
                                            <input type="hidden"  name="name">
                                            <input type="hidden"  name="image">
                                <div class="quantity-container info-container">
                                    <div class="row">




                                        <div class="col-sm-7">
                                            <button class="btn btn-primary icon" type="button"
                                            title="Add Cart" data-toggle="modal"
                                            data-target="#exampleModal" id="{{ $product->id }}"
                                            onclick="productView(this.id)"> <i
                                                class="fa fa-shopping-cart"></i><a  class="btn btn-primary mb-2"> Add To Cart</a> </button>

                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </form>



                            <div class="addthis_inline_share_toolbox_8tvu"></div>



                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>

                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            @if (session()->get('language') == 'arabic')
                                                {!! $product->long_desc_ar !!}
                                            @else
                                                {!! $product->long_desc_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            @php
                                            $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                            @endphp

                                                <div class="reviews">

                                                    @foreach($reviews as $item)
                                                    @if($item->status == 0)

                                                    @else

                                                    <div class="review">

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                        <img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>
                                                        </div>

                                                        <div class="col-md-9">

                                                        </div>
                                                    </div> <!-- // end row -->



                                                        <div class="review-title"><span class="summary">{{ $item->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
                                                        <div class="text">"{{ $item->comment }}"</div>
                                                     </div>

                                                     @endif
                                                @endforeach
                                                </div><!-- /.reviews -->

                                        </div><!-- /.product-reviews -->



                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">

                                            </div><!-- /.review-table -->
                                            <div class="review-form">
                                                @guest
                                    <p> <b> For Add Product Review. You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>

                                    @else

                                    <div class="form-container">

                                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                        <input type="text" name="summary"  class="form-control txt" id="exampleInputSummary" placeholder="">
                                    </div><!-- /.form-group -->
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                        <textarea class="form-control txt txt-review" name="comment"   id="exampleInputReview" rows="4" placeholder=""></textarea>
                                    </div><!-- /.form-group -->
                                </div>
                            </div><!-- /.row -->

                            <div class="action text-right">
                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                            </div><!-- /.action -->

                        </form><!-- /.cnt-form -->
                                    </div><!-- /.form-container -->

                           @endguest
                        </div><!-- /.review-form -->

                    </div><!-- /.product-add-review -->

                </div><!-- /.product-tab -->
                </div><!-- /.tab-pane -->


                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== Releted PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Releted products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">




                        @foreach ($relatedProduct as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}"
                                                        alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                @if (session()->get('language') == 'arabic')
                                                    {{ $product->product_name_ar }}
                                                @else
                                                    {{ $product->product_name_en }}
                                                @endif
                                            </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div>
                                                @if ($product->discount_price == null)
                                                    <div class="product-price"> <span class="price">
                                                            EGP{{ $product->selling_price }}</span>
                                                    </div>
                                                @else
                                                    <div class="product-price"> <span class="price">
                                                            EGP{{ $product->discount_price }}</span>
                                                        <span class="price-before-discount">EGP
                                                            {{ $product->selling_price }}</span>
                                                    </div>
                                                @endif
                                                <a class="product-btn MyWishList" data-id="{{ $product->id }}"
                                                    title="{{ __('Add To Wishlist') }}"><i class="icon flaticon-like"></i></a>
                                            </div>

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
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
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @endforeach




                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->

    </div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>

@endsection

