<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">


@foreach ($brands as $brand )
<div class="item m-t-15"> <a href="#" class="image"> <img style="border-radius: 50px;width: 80px;" src="{{$brand->brand_image}}" alt=""> </a> </div>
<!--/.item-->
@endforeach



      </div>
      <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

  </div>
