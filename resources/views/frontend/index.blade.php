@extends('frontend.main_master')
@section('content')
@section('title')
    Africa Market
@endsection


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->

                @include('frontend.common.vertical_menu')
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.common.hot_deals')
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    @if (session()->get('language') == 'arabic')
                    <h3 class="section-title">عروض حصرية</h3>                    @else
                    <h3 class="section-title">Special Offer</h3>                    @endif

                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



                            <div class="item">
                                <div class="products special-product">

                                    @foreach ($special_offer as $product)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <img src="{{ asset($product->product_thambnail) }}"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
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
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    @endforeach <!-- // end special offer foreach -->





                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                @include('frontend.common.product_tags')
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    @if (session()->get('language') == 'arabic')

                    <h3 class="section-title">صفقة خاصة
                    </h3>
                    @else
                    <h3 class="section-title">Special Deals</h3>
                    @endif
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
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
                @include('frontend.common.testimonials')

                <!-- ============================================== Testimonials: END ============================================== -->

              <!--  <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div> -->
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <!-- /.item -->

                        @foreach ($sliders as $slider)
                            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
                                <div class="container-fluid">
                                    <div class="text-left caption bg-color vertical-center">

                                        <div class="big-text fadeInDown-1" style="color: white">{{ $slider->title }} </div>
                                        <div  class="excerpt fadeInDown-2 hidden-xs">
                                            <span style="color:white">{{ $slider->description }}</span>
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a style="color: white" href="{{url('/')}}"
                                                class="btn-lg btn btn-uppercase btn-success shop-now-button">Shop
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

                <!-- ========================================= SECTION – HERO : END ========================================= -->
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
                <!-- ============================================== INFO BOXES ============================================== -->

                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="clearfix more-info-tab ">
                        @if (session()->get('language') == 'arabic')
                        <h3 class="new-product-title pull-left">منتجات جديده</h3>
                        @else
                        <h3 class="new-product-title pull-left">New Products</h3>
                        @endif




                                    @if (session()->get('language') == 'arabic')
                                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                        <li class="active"><a data-transition-type="backSlide" href="#all"
                                                data-toggle="tab">الكل</a></li>

                                    @foreach ($categories as $category)
                                    <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                            data-toggle="tab">{{ $category->category_name_ar }}</a></li>
                                @endforeach
                            </ul>

                                    @else
                                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                        <li class="active"><a data-transition-type="backSlide" href="#all"
                                                data-toggle="tab">all</a></li>
                                    @foreach ($categories as $category)
                                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                        data-toggle="tab">{{ $category->category_name_en }}</a></li>
                            @endforeach
                        </ul>

                                    @endif


                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach ($products as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                                    src="{{ asset($product->product_thambnail) }}"
                                                                    alt=""></a> </div> <!-- /.image -->
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->discount_price == null)
                                                                <div class="tag new"><span>new</span></div>
                                                            @else
                                                                <div class="tag hot">
                                                                    <span>{{ round($discount) }}%</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>



                                                    <!-- /.product-image -->
                                                    <div class="text-left product-info">
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
                                                            <button type="submit" style="color: white;background-color:black" class="btn"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                                    </div>
                                                    <!-- /.cart -->


                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    @endforeach
                                    <!--  // end all optionproduct foreach  -->
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->






                        </div>
                        <!-- /.home-owl-carousel -->




                        @foreach ($categories as $category)
                            <div class="tab-pane" id="category{{ $category->id }}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">
                                        @php
                                            $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp
                                        @forelse($catwiseProduct as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="detail.html"><img
                                                                        src="{{ asset($product->product_thambnail) }}"
                                                                        alt=""></a> </div>

                                                            <!-- /.image -->

                                                            <div class="tag new"><span>new</span></div>
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="text-left product-info">
                                                            <h3 class="name"><a
                                                                    href="detail.html">{{ $product->product_name_en }}</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">  @if ($product->discount_price == null)
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
                                                        </div>

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
                                                                            <button type="submit" style="color: white;background-color:black" class="btn"><i class="fa fa-heart"></i></button>
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
                                        @empty
                                            <h5 class="text-danger">No Product Found</h5>
                                        @endforelse
                                        <!--  // end all optionproduct foreach  -->




                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        @endforeach <!-- end categor foreach -->



                        <!-- /.item -->


                        <!-- /.item -->

                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    @if (session()->get('language') == 'arabic')
                    <h3 class="section-title">منتجات مميزه</h3>                @else
                    <h3 class="section-title">Featured products</h3>                @endif

                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach ($feature as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}"
                                                        alt=""></a> </div> <!-- /.image -->
                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot">
                                                        <span>{{ round($discount) }}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>



                                        <!-- /.product-image -->
                                        <div class="text-left product-info">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    @if (session()->get('language') == 'arabic')
                                                        {{ $product->product_name_ar }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description">

                                            </div>
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

                                            </div>

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
                        @endforeach
                        <!-- /.item -->


                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'arabic')
                            {{ $skip_category_0->category_name_ar }}
                        @else
                            {{ $skip_category_0->category_name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach ($skip_product_0 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}"
                                                        alt=""></a> </div>
                                            <!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- /.product-image -->

                                        <div class="text-left product-info">
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

                                            @if ($product->discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        EGP{{ $product->selling_price }} </span> </div>
                                            @else
                                                <div class="product-price"> <span class="price">
                                                        EGP{{ $product->discount_price }} </span> <span
                                                        class="price-before-discount">EGP
                                                        {{ $product->selling_price }}</span> </div>
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
                                                            <button type="submit" style="color: white;background-color:black" class="btn"><i class="fa fa-heart"></i></button>
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
                    <!-- /.home-owl-carousel -->
                </section>


                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->


                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    @if (session()->get('language') == 'arabic')
                    <h3 class="section-title"> اخر الاخبار</h3>                @else
                    <h3 class="section-title">Latest From Blog </h3>                @endif
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">


                            @foreach ($blogpost as $blog)
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">

                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset($blog->post_image) }}" alt=""></a>
                                            </div>


                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="text-left blog-post-info">
                                            <h3 class="name"><a href="#">
                                                    @if (session()->get('language') == 'arabic')
                                                        {{ $blog->post_title_ar }}
                                                    @else
                                                        {{ $blog->post_title_en }}
                                                    @endif
                                                </a></h3>


                                            <span
                                                class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>

                                            <p class="text">
                                                @if (session()->get('language') == 'arabic')
                                                    {!! Str::limit($blog->post_details_ar, 100) !!}
                                                @else
                                                    {!! Str::limit($blog->post_details_en, 100) !!}
                                                @endif
                                            </p>
                                            @if (session()->get('language') == 'arabic')
                                            <a href="{{ route('post.details', $blog->id) }}"
                                                class="lnk btn btn-success">اقرأ المزيد..</a>              @else
                                                <a href="{{ route('post.details', $blog->id) }}"
                                                    class="lnk btn btn-success">Read more...</a>              @endif


                                        </div>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->

                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
            </section>
            <!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->


        </div>
        <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div>
<!-- /.container -->
</div>
@endsection
