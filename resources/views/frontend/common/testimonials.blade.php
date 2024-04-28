<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        @foreach ($testominals as $item )
        <div class="item">
            <div class="avatar"><img src="{{ asset($item->testominal_img) }}" alt="Image"></div>
            <div class="testimonials"><em>"</em> {{$item->testominal_description}}.<em>"</em></div>
            <div class="clients_author">{{$item->testominal_name}}<span>{{$item->testominal_title}}</span> </div>
            <!-- /.container-fluid -->
          </div>
          <!-- /.item -->
        @endforeach



      <!-- /.item -->

    </div>
    <!-- /.owl-carousel -->
  </div>
