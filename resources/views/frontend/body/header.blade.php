<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown"  style="background-color: green">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">

                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                        @if (session()->get('language') == 'arabic')
                                    المفضلة
                                @else
                                    Wishlist
                                @endif
                            </a></li>

                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>
                                @if (session()->get('language') == 'arabic')
                                    سلة المشتريات
                                @else
                                    My Cart
                                @endif



                            </a></li>
                            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>


                                @if (session()->get('language') == 'arabic')
                                    الدفع
                                @else
                                    Checkout
                                @endif





                            </a></li>

                        @auth
                            <a style="color: white" href="{{ route('login') }}"><i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'arabic')
                                    حسابي
                                @else
                                    User
                                    Profile
                                @endif
                            </a>
                        @else
                            <a style="color: white" href="{{ route('login') }}"><i
                                    class="icon fa fa-lock"></i>Login/Register</a>

                        @endauth



                    </ul>
                </div>
                <!-- /.cnt-account -->
                <div class="cnt-account">
                    <ul>
                        <li class="dropdown dropdown-small"><a style="color: white" href="#"
                                class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span
                                    class="value">
                                    @if (session()->get('language') == 'arabic')
                                        اللغة
                                    @else
                                        Language
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'arabic')
                                    <li><a style="color: black" href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a style="color: black"href="{{ route('arabic.language') }}">ألعربية</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header" style="background-color: green">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">


                    @php
                        $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo" > <a href="{{ url('/') }}"> <img style="width:80%" src="{{ asset($setting->logo) }}" alt="logo">
                        </a> </div>

                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    @php
                        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                    <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">


                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">
                                            @if (session()->get('language') == 'arabic')
                                            الدول
                                        @else
                                        Countries
                                        @endif  <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">
                                            @foreach ($categories as $category)
                                                <li class="menu-header">
                                                    @if (session()->get('language') == 'arabic')
                                                        {{ $category->category_name_ar }}
                                                    @else
                                                        {{ $category->category_name_en }}
                                                    @endif
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>

                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"  id="search" name="search" placeholder="Search here..." />
                                <button class="search-button" style="background-color: green;color:white" type="submit" ></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    @php
                        $carts = App\Models\Cart::orderBy('product_id', 'ASC')->get();
                    @endphp
                    @php
                        $products = App\Models\Product::orderBy('product_name_en', 'ASC')->get();
                    @endphp
                      @php
                      $cartItems = App\Models\Cart::orderBy('name', 'ASC')->get();
                  @endphp

                    <div class="dropdown dropdown-cart" > <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"style="background-color: green"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count" ><span class="count">{{ count($carts) }} </span>
                                </div>
                                <div class="total-price-basket"style="background-color: green"><span class="value">Checkout</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu box">
                            @php   $total=0;  @endphp

                           @foreach ($cartItems as $cart )
                           @php $total +=($cart->price *$cart->quantity);    @endphp

                           <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image"> <a href="detail.html"><img src="{{$cart->image}}"
                                                    alt=""></a> </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <h3 class="name"><a href="index.php?page-detail"><strong>{{$cart->name}} </strong> </a>
                                        </h3>
                                        <div class="price">OMR{{$cart->price}}</div>
                                    </div>
                                    <div class="col-xs-1 action">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $cart->id }}" name="id">
                                            <button class="btn btn-danger"><i class="fa fa-trash-o" ></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- /.cart-item -->
                            @endforeach
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix cart-total">
                                <div class="pull-right"> <span class="text">Sub Total :</span><span
                                        class='price'>OMR {{$total}}</span> </div>
                                <div class="clearfix"></div>
                                <a href="{{ route('checkout') }}"
                                    class="btn btn-success ">Checkout</a>
                            </div>
                            <!-- /.cart-total-->

                        </li>


                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}"
                                        data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if (session()->get('language') == 'arabic')
                                            الرئيسية
                                        @else
                                            Home
                                        @endif
                                    </a> </li>
                                <!--   // Get Category Table Data -->
                                @php
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp


                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="{{ '/' }}"
                                            data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                            @if (session()->get('language') == 'arabic')
                                                {{ $category->category_name_ar }}
                                            @else
                                                {{ $category->category_name_en }}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        <!--   // Get SubCategory Table Data -->
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('subcategory_name_en', 'ASC')
                                                                ->get();
                                                        @endphp

                                                        @foreach ($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                <a
                                                                    href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_en) }}">
                                                                    <h2 class="title">
                                                                        @if (session()->get('language') == 'arabic')
                                                                            {{ $subcategory->subcategory_name_ar }}
                                                                        @else
                                                                            {{ $subcategory->subcategory_name_en }}
                                                                        @endif
                                                                    </h2>
                                                                </a>


                                                            </div>
                                                            <!-- /.col -->
                                                        @endforeach
                                                        <!-- // End SubCategory Foreach -->


                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <a href="{{ url('/') }}"> <img  style="width:80%" src="{{ asset($setting->logo) }}" alt="logo">
                                                            </a>
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach <!-- // End Category Foreach -->
                                @if (session()->get('language') == 'arabic')
                                <li class="dropdown  navbar-right special-menu"> <a
                                    href="{{ route('home.blog') }}">الاخبار</a> </li>
                            @else
                            <li class="dropdown  navbar-right special-menu"> <a
                                href="{{ route('home.blog') }}">Blog</a> </li>
                            @endif




                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<style>

    .search-area{
      position: relative;
    }
      #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
      }
    </style>
    <script>
        function search_result_hide(){
          $("#searchProducts").slideUp();
        }
         function search_result_show(){
            $("#searchProducts").slideDown();
        }
      </script>
