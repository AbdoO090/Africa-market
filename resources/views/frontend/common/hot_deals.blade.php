@php
$hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
     @endphp

     <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
        @if (session()->get('language') == 'arabic')
        <h3 class="section-title"> عروض محدوده</h3>                @else
        <h3 class="section-title">HOT DEALS  </h3>                @endif

          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">



        @foreach($hot_deals as $product)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"><a
                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"> <img  src="{{ asset($product->product_thambnail) }}" alt=""> </div></a>

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp

              @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
              @else
              <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                    off</span></div>
              @endif





                </div>
                <!-- /.hot-deal-wrapper -->

  <div class="product-info text-left m-t-20">
    <h3 class="name"><a href="detail.html">
      @if(session()->get('language') == 'arabic') {{ $product->product_name_ar }} @else {{ $product->product_name_en }} @endif</a></h3>
    <div class="rating rateit-small"></div>

     @if ($product->discount_price == NULL)
 <div class="product-price"> <span class="price"> EGP{{ $product->selling_price }} </span>  </div>
     @else
 <div class="product-price"> <span class="price"> EGP{{ $product->discount_price }} </span> <span class="price-before-discount">EGP{{ $product->selling_price }}</span> </div>
     @endif


    <!-- /.product-price -->

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" type="button"
                        title="Add Cart" data-toggle="modal"
                        data-target="#exampleModal" id="{{ $product->id }}"
                        onclick="productView(this.id)"> <i
                            class="fa fa-shopping-cart"></i> Add to
                            cart</button>

                    </div>
                    <div style="margin: 10px"></div>
                    <form action="{{ route('wishlist.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id"  value="{{ $product->id }}"/>
                        <button type="submit" class="btn btn-success"><i class="fa fa-heart"></i></button>
                    </form>



                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
            </div>
             @endforeach <!-- // end hot deals foreach -->





          </div>
          <!-- /.sidebar-widget -->
        </div>
